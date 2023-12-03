<div>
    <?php
    if (isset($_SESSION['success'])) {
        // Hiển thị thông báo
        echo "<div id='successMessage'>".$_SESSION['success'].".</div>";
        unset($_SESSION['success']);
    }
    ?>
    <!-- Mã JavaScript để ẩn thông báo sau 4 giây -->
    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 4000);
    </script>

    <!-- Thông tin cá nhân bắt đầu từ đây -->
    <h3>Thông tin cá nhân</h3>
    <img src="<?=$kq[0]['avatar']?>">
    <h4>Họ và tên</h4>
    <p><?=$kq[0]['name']?></p>
    <h4>Email</h4>
    <p><?=$kq[0]['email']?></p>
    <h4>Tên tài khoản</h4>
    <p><?=$kq[0]['user']?></p>
    <h4>Mật khẩu</h4>
    <p><?=$kq[0]['password']?></p>
    <h4>Điện thoại</h4>
    <p><?=$kq[0]['sdt']?></p>
    <h4>Địa chỉ</h4>
    <p><?=$kq[0]['address']?></p>
    <button type="button" class="btn btn-primary"><a class="add" href="index.php?act=modifyinfo">Chỉnh sửa</a></button>
</div>

