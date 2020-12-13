
<?php 
ob_start();
session_start();

    if(!isset($_SESSION['username'])) {
        header('location:login.php');
    }


  $pages = explode('/', $_SERVER['PHP_SELF']);
  $page = end($pages); // array last element find
//   echo $page;
//   exit;

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="img/favicon.html">

<title>Admin</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!--right slidebar-->
<link href="css/slidebars.css" rel="stylesheet">
    <!--  summernote -->
    <link href="assets/summernote/dist/summernote.css" rel="stylesheet">
<!-- Custom styles for this template -->

<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

<section id="container">
<!--header start-->
<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo">Blog<span>Panel</span></a>

    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder="Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="img/avatar1_small.jpg">
                    <span class="username"> <?= $_SESSION['name']?> </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout dropdown-menu-right">
                    <div class="log-arrow-up"></div>
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                    <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <li class="sb-toggle-right">
                <i class="fa  fa-align-right"></i>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->

<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a <?= $page == 'index.php' ? 'class="active"' : '' ?>  href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" <?= $page == 'add_category.php' ? 'class="active"' : '' ?> <?= $page == 'manage_category.php' ? 'class="active"' : '' ?> >
                    <i class="fa fa-laptop"></i>
                    <span>Categories</span>
                </a>
                <ul class="sub">
                    <li <?= $page == 'add_category.php' ? 'class="active"' : '' ?>><a  href="add_category.php">Add Category</a></li>
                    <li <?= $page == 'manage_category.php' ? 'class="active"' : '' ?>><a  href="manage_category.php">Manage Categories</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" <?= $page == 'add_blog.php' ? 'class="active"' : '' ?> <?= $page == 'manage_blog.php' ? 'class="active"' : '' ?> >
                    <i class="fa fa-laptop"></i>
                    <span>Blog</span>
                </a>
                <ul class="sub">
                    <li <?= $page == 'add_blog.php' ? 'class="active"' : '' ?>><a  href="add_blog.php">Add Blog</a></li>
                    <li <?= $page == 'manage_blog.php' ? 'class="active"' : '' ?>><a  href="manage_blog.php">Manage Blog</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
    <section class="wrapper">