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

    function modifyinfo($user,$name,$address,$email,$password,$img,$sdt) {
        $conn=connectdb();
        if($img == "")
            $sql = "UPDATE tbl_user SET name='".$name."', address='".$address."', email='".$email."', password='".$password."', sdt='".$sdt."' WHERE user='".$user."'";
        else 
            $sql = "UPDATE tbl_user SET name='".$name."', address='".$address."', email='".$email."', password='".$password."', sdt='".$sdt."', avatar='".$img."' WHERE user='".$user."'";    
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }

    function getall_user(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_user");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function deleteuser($id) {
        $conn=connectdb();
        $sql = "DELETE FROM tbl_user WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    } 

    function getkuser($id) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE id='".$id."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function modifyuser($id,$role,$banbuy,$banchat) {
        $conn=connectdb(); 
        $sql = "UPDATE tbl_user SET role='".$role."', banchat='".$banchat."', banbuy='".$banbuy."' WHERE id='".$id."'";    
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }
?>

