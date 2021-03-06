<?php
require_once 'vendor/autoload.php';
$cat = New \App\classes\Category();
$category = $cat->allActiveCategory();
$post = $cat->allActivePost();


?>


<?php require_once 'header.php'?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4"> </h1>

            <?php
            if(isset($_GET['search'])) {
                    $search =  $_GET['search'];
                    $search = $cat->searchPost($search);
                    if ( mysqli_num_rows($search) > 0 ){
                    while ($row3 = mysqli_fetch_assoc($search)){ ?>
                        <div class="card mb-4">
                            <img class="card-img-top" src="uploads/<?= $row3['photo']?>" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title"><?= $row3['title']?></h3>
                                <p class="card-text"><?= substr($row3['content'], 0,250)?>...</p>
                                <a href="post.php?id=<?= $row3['id']?>" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on <?= date('d M Y', strtotime($row3['created_at'])) ?> by
                                <a href="#"><?= $row3['name']?></a>
                            </div>
                        </div>
                        <?php
                    }
                    }else{
                        echo '<h1 class="my-4 text-center mt-5"> Not Found! </h1>';
                    }
            }else{ ?>
            <?php while ($row1 = mysqli_fetch_assoc($post)) {?>
            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="uploads/<?= $row1['photo']?>" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title"><?= $row1['title']?></h3>
                    <p class="card-text"><?= substr($row1['content'], 0,250)?>...</p>
                    <a href="post.php?id=<?= $row1['id']?>" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?= date('d M Y', strtotime($row1['created_at'])) ?> by
                    <a href="#"><?= $row1['name']?></a>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <!-- Pagination -->
<!--            <ul class="pagination justify-content-center mb-4">-->
<!--                <li class="page-item">-->
<!--                    <a class="page-link" href="#">&larr; Older</a>-->
<!--                </li>-->
<!--                <li class="page-item disabled">-->
<!--                    <a class="page-link" href="#">Newer &rarr;</a>-->
<!--                </li>-->
<!--            </ul>-->

        </div>

        <?php require_once 'widget.php'?>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php require_once 'footer.php'?>