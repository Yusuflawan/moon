<?php
include 'database.php';

// submitComment

// $dat = json_decode(file_get_contents("php://input"));
$data = "";
if (isset($_GET['commentText']) && isset($_GET['videoId'])) {
    $commentText = $_GET['commentText'];
    $videoId = $_GET['videoId'];
    $admin = $_GET['userName'];

    // Insert the comment into the database
    $commentInsertSql = "INSERT INTO comments (vId, username, commentText) 
                         VALUES ('$videoId', '$admin', '$commentText')";

    if (mysqli_query($conn, $commentInsertSql)) {
        echo json_encode(['status' => 'success', 'message' => 'Comment inserted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error inserting comment']);
    }
}
?>
