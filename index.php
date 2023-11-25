<?php
    session_start();
    ob_start();

    //Header
    include "View/header.php";

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
            case 'login':
                header('location: View/login.php');
                break;
            default:
                include "View/home.php";
        }
    } else {
        include "View/home.php";
    }

    //Footer
    include "View/footer.php";
?>