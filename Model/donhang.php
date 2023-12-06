<?php
    function addnewdh($madonhang, $noidung, $thanhtien, $iduser, $name, $sdt, $email, $address, $pttt, $date){
        $conn=connectdb();
        $sql = "INSERT INTO 
        tbl_donhang (madonhang, noidung, thanhtien, iduser, hovaten, sdt, email, address, pttt, date) VALUES 
        ('".$madonhang."','".$noidung."','".$thanhtien."','".$iduser."','".$name."','".$sdt."','".$email."','".$address."','".$pttt."','".$date."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function getdhbyIDuser($id) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_donhang WHERE iduser=".$id." ORDER BY date DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        
        return $kq;
    }

    function getall_dh(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_donhang ORDER BY date DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function deletedh($id) {
        $conn=connectdb();
        $sql = "DELETE FROM tbl_donhang WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>
