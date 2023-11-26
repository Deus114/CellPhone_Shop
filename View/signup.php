<div class="login">
    <h2>Đăng kí</h2>
    <form action="index.php?act=dangki" method="post">
            <h4>Tài khoản</h4>
            <input type="text" name="user" require>
            <br></br>
            <h4>Mật khẩu</h4>
            <input type="password" name="password" require>
            <br></br>
            <h4>Email</h4>
            <input type="email" name="email" require>
            <br></br>
            <input type="submit" name="dangki" value="Đăng kí">
            <input type="reset" name="nhaplai" value="Nhập lại">
            <?php
                if(isset($success_text)&&($success_text != "")){
                    echo "<br></br>";
                    echo "<font color='green'>".$success_text."</font>";
                }
                if(isset($err_text)&&($err_text != "")){
                    echo "<br></br>";
                    echo "<font color='red'>".$err_text."</font>";
                }
            ?>
    </form>
</div>