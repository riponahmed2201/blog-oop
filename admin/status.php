<?php
require_once '../vendor/autoload.php';
$category = new \App\classes\Category();

if (isset($_GET['active']) && isset($_GET['cat']) ){
    $id = $_GET['id'];
    $categories = $_GET['categories'];
    $category->active($id);
    header('location:manage_category.php');
}
if (isset($_GET['inactive']) && isset($_GET['cat'])){
    $id = $_GET['id'];
    $categories = $_GET['categories'];
    $category->inActive($id);
    header('location:manage_category.php');
}