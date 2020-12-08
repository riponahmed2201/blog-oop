<?php require_once 'header.php'?>
<?php
    require_once '../vendor/autoload.php';
    $category = new App\classes\Category();
    $categories = $category->allCategory();

    if (isset($_GET['active'])){
        $id = $_GET['active'];
        $category->active($id);
    }
    if (isset($_GET['inactive'])){
        $id = $_GET['inactive'];
        $category->inActive($id);
    }
?>

    <div class="row">
        <div class="col-sm-12">
            <section class="card">
                <header class="card-header">
                    Manage Category
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="card-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>SL No </th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                $i = 1;
                                while ( $row = mysqli_fetch_assoc($categories)) { ?>
                                <tr>
                                    <td> <?= $i++?> </td>
                                    <td> <?= $row['category_name']?> </td>
                                    <td> <?= $row['status'] == 1 ? 'Active' : 'Inactive'?> </td>
                                    <td>
                                        <?php if ($row['status'] == 1) {?>
                                            <a href="?inactive=<?=$row['id']?>" class="btn btn-warning btn-sm"> <i class="fa fa-arrow-down"></i> Inactive </a>
                                            <?php
                                            }else{ ?>
                                            <a href="?active=<?=$row['id']?>" class="btn btn-info btn-sm"> <i class="fa fa-arrow-up"></i> Active</a>
                                        <?php
                                            }?>
                                        <a href="" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o"></i> Edit</a>
                                        <a href="" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php require_once 'footer.php'?>