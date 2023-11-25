<?php
    function getall_dm(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function deletedanhmuc($id) {
        $conn=connectdb();
        $sql = "DELETE FROM tbl_danhmuc WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function getproduct($id) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc WHERE id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function modifyproduct($id, $tensp) {
        $conn=connectdb();
        $sql = "UPDATE tbl_danhmuc SET tendanhmuc='".$tensp."' WHERE id=".$id;
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }

    function addnewdm($tendanhmuc){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_danhmuc (tendanhmuc) VALUES ('".$tendanhmuc."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>