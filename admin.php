<?php

include 'database.php';

if (isset($_POST['uploadBtn'])) {
    if ($_FILES['fileName']['error'] === UPLOAD_ERR_OK) {
        $uploadFile = $_FILES['fileName']['tmp_name'];
        $destination = "videos/".$_FILES['fileName']['name'];

        // copying file to the video folder
        if (move_uploaded_file($uploadFile, $destination)) {
            // echo "file uploaded successfully";
            // echo $destination;
            $fileName = $destination;
            $fileDescription = $_POST['fileDescription'];

            $sql = "INSERT INTO `video`(`name`, `description`) VALUES('$fileName', '$fileDescription')";
            
            // sending file path and description to the db
            if (mysqli_query($conn, $sql) === true) {
                echo "new file inserted";
            }
            else{
                echo "error!!! ".$sql;
            }
        }
    }
    else {
        echo "error!".$_FILES['fileName']['error'];
    }

}


?>


<?php
// include 'database.php';

$sql1 = "SELECT * FROM video";
$videos = mysqli_query($conn, $sql1);

$option = "";
$vDescription = "";

if (mysqli_num_rows($videos) > 0) {
    while ($row = mysqli_fetch_assoc($videos)) {
        $vId = $row['id'];
        $vName = $row['name'];
        $vDescription = $row['description'];

        $option .= '<option value="' . $vId . '">' . $vName . '</option>';
    }
}

?>


<?php

// include 'database.php';

// Handle video deletion
if (isset($_POST['deleteBtn'])) {
    $selectedVideoId = $_POST['selected_video'];
    $selectedVideoDescription = $_POST['video_description'];

    // Remove the video file from the folder
    $filePath = 'videos/' . $selectedVideoDescription;
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Delete the video record from the database
    $sql = "DELETE FROM `video` WHERE id = '$selectedVideoId'";

    if (mysqli_query($conn, $sql) === true) {
        echo "Video deleted successfully";
    } else {
        echo "Error deleting video: " . mysqli_error($conn);
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="nav">
        <ul>
            <li><a href="#">home</a></li>
            <li><a href="customerList.php">customers</a></li>
            <li><a href="videos.php">videos</a></li>

            <div class="dropdown">
                <button>upload material</button>
                <div class="dropdown-content">
                    <a href="#" onclick="openUploadVideoModal()">video</a>
                    <a href="#" onclick="openDocumentModal()">document</a>
                </div>
            </div>
            <li><a href="#" onclick="openDeleteModal()">delete video</a></li>
        </ul>
    </div>

    <!-- The upload modal -->
    <div class="modal" id="uploadModal">
        <p id="uploadModalContent"></p>
        <div class="uploadVideos">
            <form action="" method="post" enctype="multipart/form-data">
                <p>upload video</p>
                <input type="text" name="fileDescription" id="" placeholder="video description" required>
                <input type="file" name="fileName" id="" accept="video/*">
                <input type="submit" value="upload" name="uploadBtn">
            </form>
        </div>
        <button class="closeBtn" onclick="closeUploadVideoModal()">Close</button>
    </div>

        <!-- The delete modal -->
    <div class="modal" id="deleteModal">
        <p id="deleteModalContent"></p>
        <div class="deleteVideo">
            <form action="" method="post">
                <p>delete video</p>
                <select name="selected_video" id="videoSelect">
                    <option value="">none</option>
                    <?php echo $option; ?>
                </select>
                <input type="text" name="video_description" id="descriptionInput" placeholder="video description"
                    value="<?php echo $vDescription; ?>">
                <input type="submit" value="delete" name="deleteBtn">
            </form>
        </div>
        <button class="closeBtn" onclick="closeDeleteModal()">Close</button>
    </div>

            <!-- The upload documents modal -->
    <div class="modal" id="uploadDocumentModal">
        <p id="uploadDocumentModal"></p>
        <div class="uploadVideos">
            <form action="" method="post" enctype="multipart/form-data">
                <p>upload document</p>
                <input type="text" name="documentDescription" id="" placeholder="document description" required>
                <input type="file" name="documentName" id="" accept=".pdf, .docx">
                <input type="submit" value="uploadDocument" name="uploadBtn">
            </form>
        </div>
        <button class="closeBtn" onclick="closeDocumentModal()">Close</button>
    </div>

<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

    <script>
        function openUploadVideoModal(content) {
            var modal = document.getElementById("uploadModal");
            var modalContent = document.getElementById("uploadModalContent");

            // Set the content for the modal
            modalContent.textContent = content;

            // Show the modal
            modal.style.display = "block";
        }

        function closeUploadVideoModal() {
            var modal = document.getElementById("uploadModal");

            // Hide the modal
            modal.style.display = "none";
        }

        function openDeleteModal(content) {
            var modal = document.getElementById("deleteModal");
            var modalContent = document.getElementById("deleteModalContent");

            // Set the content for the modal
            modalContent.textContent = content;

            // Show the modal
            modal.style.display = "block";
        }

        function closeDeleteModal() {
            var modal = document.getElementById("deleteModal");

            // Hide the modal
            modal.style.display = "none";
        }

        function openDocumentModal(content) {
            var modal = document.getElementById("uploadDocumentModal");
            var modalContent = document.getElementById("deleteModalContent");

            // Set the content for the modal
            modalContent.textContent = content;

            // Show the modal
            modal.style.display = "block";
        }

        function closeDocumentModal() {
            var modal = document.getElementById("uploadDocumentModal");

            // Hide the modal
            modal.style.display = "none";
        }

       
        // JavaScript code to update the description input value on select change
        document.getElementById('videoSelect').addEventListener('change', function () {
            var selectElement = this;
            var descriptionInput = document.getElementById('descriptionInput');

            // Get the selected option's value (video description)
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var selectedDescription = selectedOption.value;

            // Update the description input value
            descriptionInput.value = selectedDescription;
        });

    </script>
</body>
</html>
