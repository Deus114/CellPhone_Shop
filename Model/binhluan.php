<?php
    function addnewbl($noidung, $iduser, $idprd, $date, $user){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_binhluan (noidung, iduser, idprd, date, user) VALUES ('".$noidung."', '".$iduser."', '".$idprd."', '".$date."' , '".$user."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function getallbl($idprd) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_binhluan WHERE idprd=".$idprd." ORDER BY date DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function getall_bl(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_binhluan");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function deletebl($id) {
        $conn=connectdb();
        $sql = "DELETE FROM tbl_binhluan WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>