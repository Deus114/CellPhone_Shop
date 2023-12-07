<div class="login">
        <br>
        <h2>Đăng nhập</h2>
        <br>
        <form action="index.php?act=dangnhap" method="post">
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
            <div class="input-box button">
                <input type="submit" name="dangnhap" value="Đăng nhập">
            </div>
            <br>
            <?php
            if (isset($err_text) && ($err_text != "")) {
                echo "<div class='error-message'>$err_text</div>";
            }
            ?>
        </form>
</div>

