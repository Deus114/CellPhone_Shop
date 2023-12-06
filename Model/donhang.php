<?php
    function addnewdh($madonhang, $noidung, $thanhtien, $iduser, $name, $sdt, $email, $address, $pttt, $date){
        $conn=connectdb();
        $sql = "INSERT INTO 
        tbl_donhang (madonhang, noidung, thanhtien, iduser, hovaten, sdt, email, address, pttt, date) VALUES 
        ('".$madonhang."','".$noidung."','".$thanhtien."','".$iduser."','".$name."','".$sdt."','".$email."','".$address."','".$pttt."','".$date."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>
