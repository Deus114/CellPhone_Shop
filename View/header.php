<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="View/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
</head>
<body>
<div class="container-fluid page-format">
    <div class="mheader">
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
    </div>
    