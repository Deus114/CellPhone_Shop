<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="View/style.css">
</head>
<body>
    <header class="header">
        <h1 class="logo">ADMIN</h1>
        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <i class='bx bx-menu' id="menu-icon"></i>
            <i class='bx bx-x' id="close-icon"></i>
        </label>

        <nav class="navbar">
            <a href="index.php" style="--i:0;">Homepage</a> 
            <a href="index.php?act=danhmucsanpham" style="--i:1;">Category</a> 
            <a href="index.php?act=product" style="--i:2;">Products</a> 
            <a href="index.php?act=binhluan" style="--i:3;">Comments</a> 
            <a href="index.php?act=footer" style="--i:4;">Footer</a>
            <a href="index.php?act=quanlitaikhoan" style="--i:5;">Accounts</a> 
            <a href="index.php?act=donhang" style="--i:6;">Orders</a> 
            <a href="index.php?act=thoat" style="--i:7;">Log out</a>
        </nav>
    </header>
    <div class="container">
    