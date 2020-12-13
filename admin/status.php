<?php
require_once '../vendor/autoload.php';
$category = new \App\classes\Category();
$blog = new \App\classes\Blog();

//categories status change
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
// blog status change
if (isset($_GET['active']) && isset($_GET['blog']) ){
    $id = $_GET['id'];
    $blog->active($id);
    header('location:manage_blog.php');
}
if (isset($_GET['inactive']) && isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->inActive($id);
    header('location:manage_blog.php');
}