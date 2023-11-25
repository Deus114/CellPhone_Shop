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

    function getproduct($id) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function modifyproduct($id, $tensp, $img, $gia, $iddm) {
        $conn=connectdb();
        if($img == "")
            $sql = "UPDATE tbl_sanpham SET tensp='".$tensp."', gia='".$gia."', iddanhmuc='".$iddm."' WHERE id=".$id;
        else 
            $sql = "UPDATE tbl_sanpham SET tensp='".$tensp."', image='".$img."', gia='".$gia."', iddanhmuc='".$iddm."' WHERE id=".$id;    
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
?>