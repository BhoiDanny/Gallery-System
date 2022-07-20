<?php include("includes/header.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php

    $user = new User();
    if(isset($_POST['addUser'])) {
        if(!empty($user)) {
            $user->username   = $_POST['username'];
            $user->first_name = $_POST['first_name'];
            $user->last_name  = $_POST['last_name'];
            $user->password   = $_POST['password'];
            $user->setImage($_FILES['userImage']);
            if ($user->saveUser()) {
                $user->create();
                $message = "User Created Successfully";
            } else {
                $message = join("<br>",$user->errors);
            }
        } else {
            $message = join("<br>", $user->errors);
        }
}

?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse nav-color navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <?php include("includes/top_nav.php");?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php");?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            PHOTOS
                            <small>Subheading</small>
                        </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-7 col-md-offset-2">
                        <?php echo !empty($message) ? "<p>" . $message . "</p>" : "";?>
                            <div class="form-group">
                                <input type="file" name="userImage" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" name="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" name="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addUser" class="btn btn-primary pull-right" value="Create New User">
                            </div>
                        </div>
                    </form>

                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>