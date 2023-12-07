<?php
    function getall_prd(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham ORDER BY id DESC ");
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

    function getproduct($id) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function modifyproduct($id, $nameprd, $img, $gia, $iddm, $sptieubieu, $mota, $chitiet, $hienthi) {
        $conn=connectdb();
        if($img == "")
            $sql = "UPDATE tbl_sanpham SET tensp='".$nameprd."', gia='".$gia."', iddanhmuc='".$iddm."', sptieubieu='".$sptieubieu."', mota='".$mota."', chitiet='".$chitiet."', hienthi='".$hienthi."' WHERE id=".$id;
        else 
            $sql = "UPDATE tbl_sanpham SET tensp='".$nameprd."', image='".$img."', gia='".$gia."', iddanhmuc='".$iddm."', sptieubieu='".$sptieubieu."', mota='".$mota."', chitiet='".$chitiet."', hienthi='".$hienthi."' WHERE id=".$id;    
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }

    function deleteprd($id) {
        $conn=connectdb();
        $sql = "DELETE FROM tbl_sanpham WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    } 

    function get_sptieubieu(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE sptieubieu=1 ORDER BY watch DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function getallsp(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE hienthi=1 ORDER BY buy DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function getprdbyIddm($iddm) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE iddanhmuc=".$iddm);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function viewproduct($id, $watch) {
        $conn=connectdb();
        $sql = "UPDATE tbl_sanpham SET watch='".$watch."' WHERE id=".$id;    
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }

    function buyproduct($id, $buy) {
        $conn=connectdb();
        $sql = "UPDATE tbl_sanpham SET buy='".$buy."' WHERE id=".$id;    
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }
?>