<?php include("includes/header.php"); ?>
<?php
    if(empty($_GET['id'])) {
        redirect(".");
    }
    $photo = Photos::findById($_GET['id']);
    if(!$photo) {
        redirect(".");
    }
    if(isset($_POST['submit'])) {
        $author = trim($_POST['author']);
        $body   = trim($_POST['body']);

        $comment = Comments::createComment($photo->id, $author, $body);

        if($comment && $comment->save()) {
            redirect("photo.php?id={$photo->id}");
        } else {
            $message = "Could not save comment";
        }
    }

    $comments = Comments::findComments($photo->id);

?>
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Gallery System</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive photo_image" src="admin<?php echo DS . $photo->picturePath();?>" alt="<?php echo $photo->alt_text ?><">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption ?></p>
                <p><?php echo $photo->description ?></p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php foreach($comments as $comment):?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="https://via.placeholder.com/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo($comment->author) ?>
                            <small><?php echo($comment->time) ?></small>
                        </h4>
                        <?php echo($comment->body) ?>
                    </div>
                </div>
                <?php endforeach;?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <!--<div class="col-md-4">

                --><?php /*include("includes/sidebar.php"); */?>

        </div>
        <!-- /.row -->

     <?php include("includes/footer.php"); ?>