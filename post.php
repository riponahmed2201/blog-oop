<?php
require_once 'vendor/autoload.php';
$cat = New \App\classes\Category();
$category = $cat->allActiveCategory();
$getId = $_GET['id'];
$singlePost = $cat->singlePost($getId);

$post = mysqli_fetch_assoc($singlePost);

?>

<?php require_once 'header.php'?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4"></h1>
                <!-- Blog Post -->
                <div class="card mb-4">
                    <img class="card-img-top" src="uploads/<?= $post['photo']?>" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title"><?= $post['title']?></h3>
                        <p class="card-text"><?= $post['content']?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?= date('d M Y', strtotime($post['created_at'])) ?> by
                        <a href="#"><?= $post['name']?></a>
                    </div>
                </div>
        </div>

        <?php require_once 'widget.php'?>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php require_once 'footer.php'?>