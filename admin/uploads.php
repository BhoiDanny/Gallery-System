<?php include("includes/header.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php
    if(isset($_POST['submit'])):
        $photo = new Photos();
        $photo->title = trim($_POST['title']);
        $photo->setFile($_FILES['file_upload']);
        if($photo->save()) {
            $message = "Photo upload successful!";
        } else {
            $message = join("<br>", $photo->errors);
        }
    endif;
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
                            UPLOADS
                            <small></small>
                        </h1>
                        <?php echo (!empty($message)) ? "<p>$message</p>" : "";?>
                        <div class="col-md-6">
                            <form action="uploads.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file_upload" class="form-control">
                                </div>
                                <input type="submit" name="submit"></form>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>