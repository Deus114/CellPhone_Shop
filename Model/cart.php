<?php
    // Hàm lấy tất cả các sản phẩm trong giỏ hàng của 1 user
    function getcart($iduser) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE iduser=".$iduser);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    // Hàm để lấy 1 sản phẩm cụ thể trong giỏ hàng của user
    function getcartbyID($id) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function addcart($iduser, $idsp, $sl){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_cart (iduser, idsp, soluong) VALUES ('".$iduser."','".$idsp."','".$sl."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function modifysl($id, $sl) {
        $conn=connectdb();
        $sql = "UPDATE tbl_cart SET soluong='".$sl."' WHERE id=".$id."";
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }

    function deletecart($id) {
        $conn=connectdb();
        $sql = "DELETE FROM tbl_cart WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function deleteallcart($iduser) {
        $conn=connectdb();
        $sql = "DELETE FROM tbl_cart WHERE iduser=".$iduser;
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>