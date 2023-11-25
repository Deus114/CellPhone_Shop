<?php
    function getall_prd(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function addnewprd($tensp, $img, $gia, $iddm){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_sanpham (tensp, image, gia, iddanhmuc) VALUES ('".$tensp."','".$img."','".$gia."','".$iddm."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>