<?php include("includes/header.php"); ?>
<?php include("includes/photo_modal.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php

    if(empty($_GET['id'])) {
        redirect("users.php");
    } else {
        $user = User::findById($_GET['id']);
        if(!$user) {
            redirect("photos.php");
        }
        if(isset($_POST['updateUser'])) {

            if (!empty($user)) {
                $user->username = $_POST['username'];
                $user->first_name = $_POST['first_name'];
                $user->last_name = $_POST['last_name'];
                $user->password = empty($_POST['password']) ? $user->password : $_POST['password'];
                if(empty($_FILES['userImage'])){
                    $user->save();
                } else {
                    $user->setImage($_FILES['userImage']);
                    if ($user->saveUser()) {
                        $user->save();
                        redirect("edit_user.php?id={$user->id}");
                    } else {
                        $message = join("<br>", $user->errors);
                    }
                }
            } else {
                $message = join("<br>", $user->errors);
            }
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
                            USERS
                        </h1>

                    <div class="col-md-6 user-image-box">
                        <a href="" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="<?php echo $user->imagePlaceholder(); ?>" alt=""></a>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                        <?php echo !empty($message) ? "<p>" . $message . "</p>" : "";?>
                            <div class="form-group">
                                <input type="file" name="userImage" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" class="form-control" value="<?php echo($user->username);?>">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" name="first_name" class="form-control" value="<?php echo($user->first_name);?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" name="last_name" class="form-control" value="<?php echo($user->last_name);?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <a id="user-id" class="btn btn-danger pull-left" href="delete_user.php?id=<?php echo($user->id); ?>">Delete User</a>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="updateUser" class="btn btn-primary pull-right" value="Update User">
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