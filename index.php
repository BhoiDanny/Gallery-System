<?php include("includes/header.php"); ?>
<?php
    $page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $itemsPerPage = 4;
    $itemsTotal = Photos::countAll();

    $paginate = new Paginate($page,$itemsPerPage,$itemsTotal);

    $sql = "SELECT * FROM `photos` LIMIT {$paginate->itemsPerPage} OFFSET {$paginate->offSet()}";
    $photos = Photos::findByQuery($sql);
?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <div class="row">
                <?php foreach($photos as $photo): ?>
                    <div class="col-xs-6 col-md-3">
                        <a href="photo.php?id=<?php echo $photo->id ;?>" class="thumbnail">
                            <img src="admin<?php echo DS . $photo->picturePath(); ?>" alt="" class="home_image img-responsive ">
                        </a>
                    </div>
                <?php endforeach; ?>
                </div>

                <div class="row">
                    <ul class="pagination">
                    <?php
                        if($paginate->pageTotal() > 1) {
                            if($paginate->hasPrevious()) {
                                print("<li class=\"previous\"><a href=\"?page={$paginate->previous()}\">Previous</a></li>");
                            }
                            for($i = 1; $i <= $paginate->pageTotal(); $i++){
                                if($i == $paginate->currentPage) {
                                    print("<li><a class=\"active\" href=\"?page={$i}\">$i</a></li>");
                                } else {
                                    print("<li><a href=\"?page={$i}\">$i</a></li>");
                                }
                            }
                            if($paginate->hasNext()) {
                                print("<li class=\"next\"><a href=\"?page={$paginate->next()}\">Next</a></li>");
                            }
                        }
                    ?>
                    </ul>
                </div>

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!--<div class="col-md-4">

            
                 --><?php /*include("includes/sidebar.php"); */?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
