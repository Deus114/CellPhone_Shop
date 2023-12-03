<form action="index.php?act=modifyinfo" method="post">
    <h3>Thông tin cá nhân</h3>
    <img src="<?=$kq[0]['avatar']?>">
    <input type="file" name="img">
        <?php
            if(isset($uploadOk)&&($uploadOk == 0)){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        ?>
    <h4>Họ và tên</h4>
    <input type="text" name="name" value="<?=$kq[0]['name']?>">
    <h4>Email</h4>
    <input type="text" name="email" value="<?=$kq[0]['email']?>" require>
    <h4>Mật khẩu</h4>
    <input type="text" name="password" value="<?=$kq[0]['password']?>" require>
    <h4>Điện thoại</h4>
    <input type="text" name="sdt" value="<?=$kq[0]['sdt']?>">
    <h4>Địa chỉ</h4>
    <input type="text" name="address" value="<?=$kq[0]['address']?>">
    <br></br>
    <input type="submit" name="thaydoi" value="Thay đổi">
    <?php
        if(isset($texterr)){
            echo "<br></br>";
            echo "<font color='red'>".$texterr."</font>";
        }
    ?>
</form>