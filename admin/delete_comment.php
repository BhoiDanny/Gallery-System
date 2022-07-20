<?php require_once("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php
    if(empty($_GET['id'])){
        redirect("comments.php");
    }

    $comment = Comments::findById($_GET['id']);
    if($comment) {
        if($comment->delete()) {
            redirect("comments.php");
        }
    } else {
        redirect("comments.php");
    }
