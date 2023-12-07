<?php
    function getall_lhgt(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_lienhegioithieu");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function getfooter() {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_lienhegioithieu WHERE id=1");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();

        return $kq;
    }

    function modifylhgt($lienhe, $gioithieu) {
        $conn=connectdb();
        $sql = "UPDATE tbl_lienhegioithieu SET lienhe='".$lienhe."', gioithieu='".$gioithieu."' WHERE id=1";
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
    }
?>
