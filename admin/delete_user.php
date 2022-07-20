<?php require_once("includes/init.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php
    if(empty($_GET['id'])){
        redirect("users.php");
    }

    $user = User::findById($_GET['id']);
    if($user) {
        if($user->deleteUser()) {
            redirect("users.php");
        }
    } else {
        redirect("users.php");
    }
