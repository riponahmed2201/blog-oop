<?php 
session_start();

    if(isset($_SESSION['username'])) {
        header('location:index.php');
    }

    require_once '../vendor/autoload.php';

    $login = new App\classes\Login();

    if (isset($_POST['login'])) {

      $login_error =   $login->loginCheck($_POST);

    }
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

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


</head>

<body class="login-body">

<div class="container">
    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">login now</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <p style="color: red"> <?= isset($login_error) ? $login_error : ''?> </p>
            <button class="btn btn-lg btn-login btn-block" name="login" type="submit">Login</button>
        </div>
    </form>

</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>
