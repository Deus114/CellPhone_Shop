<div class="login">
    <h2>Đăng nhập</h2>
    <br>
    <form action="index.php?act=dangnhap" method="post">
        <input type="text" name="user" id="">
        <br></br>
        <input type="text" name="password" id="">
        <br></br>
        <input type="submit" name="dangnhap" value="Đăng nhập">
        <?php
            if(isset($err_text)&&($err_text != "")){
                echo "<br></br>";
                echo "<font color='red'>".$err_text."</font>";
            }
        ?>
    </form>
</div> 

