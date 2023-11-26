<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="View/style.css">
</head>
<body>
    <header>
        <h2>Trang chủ</h2>
        <nav>
            <a href="index.php">Trang chủ</a> |
            <?php if(isset($_SESSION['role'])&&($_SESSION['role']==0)){ ?>
                    <!-- Chuyển tới trang user info -->
                    <a href="index.php?act=userinfo"><?php echo $_SESSION['name'] ?></a> |
                    <a href="index.php?act=thoat">Thoát</a>
            <?php
                } else {
            ?>
                <a href="index.php?act=login">Đăng nhập</a> |
                <a href="index.php?act=signup">Đăng Kí</a>
            <?php } ?>
        </nav>
    </header>