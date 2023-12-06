<div>
    <?php
    if (isset($_SESSION['success'])) {
        // Hiển thị thông báo
        echo "<div id='successMessage' style='color: green;'>".$_SESSION['success'].".</div>";
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
     <div class="mmain-user-info">
        <h3>Thông tin cá nhân</h3>
        <img src="<?=$kq[0]['avatar']?>" width="30%">
        <h5>Họ và tên</h5>
        <p><?=$kq[0]['name']?></p>
        <h5>Email</h5>
        <p><?=$kq[0]['email']?></p>
        <h5>Tên tài khoản</h5>
        <p><?=$kq[0]['user']?></p>
        <h5>Mật khẩu</h5>
        <p><?=$kq[0]['password']?></p>
        <h5>Điện thoại</h5>
        <p><?=$kq[0]['sdt']?></p>
        <h5>Địa chỉ</h5>
        <p><?=$kq[0]['address']?></p>
        <button type="button" class="btn btn-primary"><a class="add" href="index.php?act=modifyinfo">Chỉnh sửa</a></button>
    </div>
</div>

