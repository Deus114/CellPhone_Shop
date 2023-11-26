<?php
    function getuserinfo($user, $password) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND password='".$password."' ");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }
?>