<?php
    session_start();
    ob_start();
    include '../Model/connectdb.php';
    include '../Model/user.php';

    if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
        $user=$_POST['user'];
        $pass=$_POST['password'];
        $role=checkuser($user, $pass);
        $_SESSION['role']=$role;
        if($role == 1) header('location: ../Admin/index.php');
        else {
            $err_text="Username hoặc passwrd không tông tại";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h2>Đăng nhập</h2>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="user" id="">
            <br></br>
            <input type="text" name="password" id="">
            <br></br>
            <input type="submit" name="dangnhap" value="Đăng nhập">
            <?php
                if(isset($err_text)&&($err_text != "")){
                    echo "<font color='red'>".$err_text."</font>";
                }
            ?>
        </form>
    </div>
</body>
</html>


