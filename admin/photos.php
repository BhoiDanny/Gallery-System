<?php include("includes/header.php"); ?>
<?php if(!$session->isSignedIn()){redirect("login.php");} ?>
<?php
    $photos = Photos::findAll();

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
                            <small></small>
                        </h1>

                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($photos as $photo):?>
                                <tr>
                                    <td><img class="admin-photo-thumbnail" src="<?php echo $photo->picturePath();?>" alt="<?php echo($photo->alt_text);?>">
                                        <div class="picture-links">
                                            <a href="delete_photo.php?id=<?php echo($photo->id) ;?>">Delete</a>
                                            <a href="edit_photo.php?id=<?php echo($photo->id); ?>">Edit</a>
                                            <a href="../photo.php?id=<?php echo($photo->id) ;?>">View</a>
                                        </div>
                                    </td>
                                    <td><?php echo $photo->id;?></td>
                                    <td><?php echo $photo->filename;?></td>
                                    <td><?php echo $photo->title;?></td>
                                    <td><?php echo $photo->size;?></td>
                                    <td>
                                        <a href="comment_photo.php?id=<?php echo($photo->id); ?>">
                                        <?php $comments = Comments::findComments($photo->id);
                                            echo(count($comments));
                                        ?>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>