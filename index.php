<?php
    session_start();
    ob_start();
    // Model
    include 'Model/connectdb.php';
    include 'Model/user.php';
    include 'Model/product.php';
    include 'Model/danhmuc.php';
    include "Model/binhluan.php";
    include "Model/cart.php";
    include "Model/donhang.php";
    include "Model/lienhegioithieu.php";
    // Controller
    include "Controller/controller.php"
?>