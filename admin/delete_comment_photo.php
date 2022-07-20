<?php require_once("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php
    if(empty($_GET['id'])){
        redirect("comments.php");
    }

    $comment = Comments::findById($_GET['id']);
    if($comment) {
        if($comment->delete()) {
            $session->message("The Comment with {$comment->id} has been deleted");
            redirect("comment_photo.php?id={$comment->photo_id}");
        }
    } else {
        redirect("comment_photo.php?id={$comment->photo_id}");
    }
