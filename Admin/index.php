<?php
    session_start();
    ob_start();
    include "../Model/connectdb.php";
    include "../Model/danhmuc.php";
    include "../Model/product.php";
    include "../Model/binhluan.php";

    include "Controller/controller.php"
?>