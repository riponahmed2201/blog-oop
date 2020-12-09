<?php
require_once '../vendor/autoload.php';
$category = new \App\classes\Category();

    if (isset($_GET['cat'])){
        $id = $_GET['id'];
        $category->delete($id);
        header('location:manage_category.php');
    }