<?php
// getComments.php

include 'database.php'; // Make sure to include the database connection

if (isset($_GET['videoId'])) {
    $videoId = $_GET['videoId'];

    // Retrieve comments for the specified video from the database
    $commentSql = "SELECT * FROM comments WHERE vId = '$videoId'";
    $commentsResult = mysqli_query($conn, $commentSql);

    $comments = array();
    while ($row = mysqli_fetch_assoc($commentsResult)) {
        $comments[] = array(
            'user_name' => $row['username'],
            'comment_text' => $row['commentText']
        );
    }

    // Send the comments as JSON response
    header('Content-Type: application/json');
    echo json_encode($comments);
}
?>
