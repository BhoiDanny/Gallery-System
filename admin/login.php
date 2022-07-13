<?php require_once("includes/header.php"); ?>
<?php

    if($session->isSignedIn()) {
        redirect("index.php");
    }

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        //Check in Database for user
        $userFound = User::verifyUser($username, $password);

        if($userFound) {
            $session->login($userFound);
            redirect("index.php");
        } else {
            $theMessage = "The Username or Password not found";
        }


    } else {
        $theMessage = "";
        $username = "";
        $password = "";
    }
?>


<div class="col-md-4 col-md-offset-3">

    <h4 class="bg-danger"><?php if (!empty($theMessage)) {echo $theMessage;} ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>
