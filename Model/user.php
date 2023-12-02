<?php
    function getuserinfo($user, $password) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND password='".$password."' ");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function addnewuser($user, $pass, $email){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_user (user, password, email) VALUES ('".$user."','".$pass."','".$email."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function checkuser($user) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function getuser($user) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }
?>