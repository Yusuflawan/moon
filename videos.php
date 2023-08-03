
<?php

include 'database.php';
include 'getComments.php';
// include 'submitComment.php';

session_start();

$admin = $_SESSION['adminUsername'];

$getVideos = "";
$getDescription = "";

$vSql = "SELECT * FROM video";
$videos = mysqli_query($conn, $vSql);
if (mysqli_num_rows($videos) > 0) {
    while ($row = mysqli_fetch_assoc($videos)) {
        $vId = $row['id'];
        $videoUrl = $row['name'];
        $videoDescription = $row['description'];
      
        $getVideos .='
        <div class="video">
            <video controls>
                <source src="'.$videoUrl.'">
            </video>
            <p>'.$videoDescription.'</p>

            <div class="commentSection">
                <div class="comments" id="comments'.$vId.'">
               
                    <!-- Comments will be dynamically populated here using PHP -->
                </div>
                <form id="commentForm" method="get" action="submitComment.php">
                    <input type="hidden" name="videoId" value="'.$vId.'">
                    <input type="hidden" name="userName" value="'.$admin.'">
                    <textarea name="commentText" placeholder="Write your comment here" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>';

    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>videos</title>
    <link rel="stylesheet" href="css/videos.css">
</head>
<body>
    <div class="videos">
        <?php echo $getVideos;?>
    </div>

    <div class="footer"></div>


    <!-- /////////////////////////////// -->

<script>



        //   Function to load and display comments for a specific video
    function loadComments(videoId) {
        fetch('getComments.php?videoId=' + videoId)
            .then(response => response.json())
            .then(comments => {
                const commentsContainer = document.querySelector('#comments' + videoId);
                commentsContainer.innerHTML = '';

                // Loop through the comments and create HTML elements to display them
                comments.forEach(comment => {
                    const commentDiv = document.createElement('div');
                    commentDiv.className = 'comment';

                    const userDiv = document.createElement('div');
                    userDiv.textContent = `User: ${comment.user_name}`;

                    const commentTextDiv = document.createElement('div');
                    commentTextDiv.textContent = comment.comment_text;

                    commentDiv.appendChild(userDiv);
                    commentDiv.appendChild(commentTextDiv);

                    commentsContainer.appendChild(commentDiv);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } 
    
    Array.from(document.querySelectorAll('.commentForm')).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(form);

            fetch('submitComment.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);

                const videoId = formData.get('videoId');
                loadComments(videoId);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });


</script>

</body>
</html>