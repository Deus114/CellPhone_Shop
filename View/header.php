<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="View/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
</head>
<body>
    <div class="container">
        <!-- Begin Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-red"> 
            <h1 class="tile white">Mobile Store</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link white" href="index.php">Trang chủ</a> </li>
                <li class="nav-item"> <a class="nav-link white" href="#">Liên hệ</a> </li>
                <li class="nav-item"> <a class="nav-link white" href="#">Giới thiệu</a> </li>
                <li class="nav-item"> <a class="nav-link white" href="#">Sản phẩm</a> </li>
                <?php if(isset($_SESSION['role'])&&($_SESSION['role']==0)){ ?>
                    <!-- Chuyển tới trang user info -->
                    <li class="nav-item"> 
                      <a class="nav-link white" href="index.php?act=userinfo">
                      <img src="<?php echo $_SESSION['avatar'] ?>" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
                      <?php echo $_SESSION['name'] ?>
                      </a> 
                    </li>
                    <li class="nav-item"> 
                    <a class="nav-link white" href="index.php?act=thoat">Thoát</a>
                    </li>
                <?php
                    } else {
                ?>
                    <li class="nav-item"> 
                    <a class="nav-link white" href="index.php?act=login">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link white" href="index.php?act=signup">Đăng Kí</a>
                    </li>
                <?php } ?>
                <li class="nav-item"> <a class="nav-link white" href="index.php?act=cart">Giỏ hàng</a> </li>
              </ul>
            </div>
              <form class="form-inline my-2 my-lg-0 sear">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </form>
        </nav>
        <!-- End Nav -->
    