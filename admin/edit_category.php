
<?php require_once 'header.php'?>
<?php
require_once '../vendor/autoload.php';
$category = new App\classes\Category();

$id = $_GET['id'];

$result = $category->selectRaw($id);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update_category'])){
    $insertMsg = $category->updateCategory($_POST);
}
?>

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <header class="card-header">
                Update category
            </header>
            <div class="card-body">

                <?php
                if (isset($insertMsg)) { ?>
                    <h5 class="text-center"> <?= $insertMsg ?> </h5>
                <?php }?>

                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="category_name" class="col-sm-4 col-form-label">Category Name</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="id" value="<?= $row['id']?>">
                            <input type="text" name="category_name" class="form-control"  placeholder="Category Name" value="<?= $row['category_name']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">Status</legend>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="status" id="active" value="1" <?= $row['status'] == '1' ? 'checked' : '' ?> >
                                    <label for="active" class="form-check-label">
                                        Active
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="status" id="inactive" value="0" <?= $row['status'] == '0' ? 'checked' : '' ?>>
                                    <label for="inactive" class="form-check-label">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button class="btn btn-success" name="update_category">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'?>
