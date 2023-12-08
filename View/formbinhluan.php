<?php
    session_start();
    include "../Model/connectdb.php";
    include "../Model/binhluan.php";
    if(isset($_SESSION['id']))
        $iduser=$_SESSION['id'];
    if(isset($_SESSION['user']))
        $user=$_SESSION['user'];
    if(isset($_SESSION['idprd']))
        $idprd=$_SESSION['idprd'];
    $noidung=$_POST['noidung'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date=date('d/m/Y h:i:sa');
    // Thêm bình luận mới vào db
    addnewbl($noidung, $iduser, $idprd, $date, $user);
    // Lấy danh sách bình luận của sản phẩm để hiển thị
    $listbl=getallbl($idprd);
    foreach($listbl as $bl){
        echo '<h5>'.$bl['user'].'</h5>';
        echo '<span style="opacity: 0.5;">'.$bl['date'].'</span>';
        echo '<br>';
        echo '<p>'.$bl['noidung'].'</p>';
    }
?>