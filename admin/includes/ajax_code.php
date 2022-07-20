<?php require("init.php"); ?>
<?php
    $user = new User();

    if(isset($_POST['imageName'])) {
        $user->ajaxSaveUserImage($_POST['imageName'], $_POST['userId']);
    }


?>