
<?php require_once 'header.php'?>
<?php
require_once '../vendor/autoload.php';
$category = new App\classes\Category();
$blog = new App\classes\Blog();

$allActiveCategory = $category->allActiveCategory();

if (isset($_POST['add_blog'])){
    $insertMsg = $blog->addBlog($_POST);
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <header class="card-header">
                Add Blog
            </header>
            <div class="card-body">

                <?php
                if (isset($insertMsg)) { ?>
                    <h5 class="text-center"> <?= $insertMsg ?> </h5>
                <?php }?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <select name="category_id" id="" class="form-control">
                                <option value="">--select category--</option>
                                <?php while($row = mysqli_fetch_assoc($allActiveCategory))  { ?>
                                <option value="<?= $row['id']?>"><?= $row['category_name']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label"> Blog Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control"  placeholder="Category Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label"> Blog Content</label>
                        <div class="col-sm-9">
                            <textarea name="content" class="summernote"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input type=file name="photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="status" id="active" value="1">
                                    <label for="active" class="form-check-label">
                                        Active
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="status" id="inactive" value="0">
                                    <label for="inactive" class="form-check-label">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button class="btn btn-success" name="add_blog">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'?>
