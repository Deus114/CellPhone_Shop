<div class="login">
    <br>
        <h2>ĐĂNG KÍ</h2>
        <br>
        <form action="index.php?act=dangki" method="post">
            <div class="input-box">
                <h4>Tài khoản</h4>
                <input type="text" name="user" required>
            </div>
            <br>
            <div class="input-box">
                <h4>Mật khẩu</h4>
                <input type="password" name="password" required>
            </div>
            <br>
            <div class="input-box">
                <h4>Email</h4>
                <input type="email" name="email" required>
            </div>
            <br>
            <div class="input-box button">
                <input type="submit" name="dangki" value="Đăng ký">
                <input type="reset" name="nhaplai" value="Nhập lại">
            </div>
            <br>
            <?php
            if(isset($success_text)&&($success_text != "")){
                echo "<font color='green'>".$success_text."</font>";
            }
            if(isset($err_text)&&($err_text != "")){
                echo "<font color='red'>".$err_text."</font>";
            }
            ?>
        </form>
</div>