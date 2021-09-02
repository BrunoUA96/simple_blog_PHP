<?php 
    require_once '../config/connect.php';

    $comment = $_POST['comment'];
    $userName = $_POST['name'];
    $postId = $_GET['id'];

    $newComment = mysqli_query($connect, "INSERT INTO `comments`(`comment`, `post_id`, `name`) VALUES ('$comment','$postId','$userName')");

    header("Location: ../post.php?id=" . $postId)
?>