<div class="mmain-user-info">
    <h3>Thông tin cá nhân</h3>
    <?php
            if(isset($texterr)){
                echo "<font color='red'>".$texterr."</font>";
                echo "<br></br>";
            }
        ?>
    <img src="<?=$kq[0]['avatar']?>" width="30%">
    <form action="index.php?act=modifyinfo" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <br></br>
        <h4>Họ và tên</h4>
        <input type="text" name="name" value="<?=$kq[0]['name']?>"> <br></br>
        <h4>Email</h4>
        <input type="email" name="email" value="<?=$kq[0]['email']?>" require> <br></br>
        <h4>Mật khẩu</h4>
        <input type="text" name="password" value="<?=$kq[0]['password']?>" require> <br></br>
        <h4>Điện thoại</h4>
        <input type="text" name="sdt" value="<?=$kq[0]['sdt']?>"> <br></br>
        <h4>Địa chỉ</h4>
        <input type="text" name="address" value="<?=$kq[0]['address']?>">
        <br></br>
        <input class="btn btn-primary" type="submit" name="thaydoi" value="Thay đổi">
        <br>
    </form>
</div>