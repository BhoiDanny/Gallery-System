<?php require_once("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php
    if(empty($_GET['id'])){
        redirect("photos.php");
    }

    $photo = Photos::findById($_GET['id']);
    if($photo) {
        if($photo->deletePhoto()) {
            redirect("photos.php");
        }
    } else {
        redirect("photos.php");
    }
