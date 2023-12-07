<div>
     <!-- Thông tin cá nhân bắt đầu từ đây -->
     <div class="mmain-user-info">
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
        <h3>Thông tin cá nhân</h3>
        <img src="<?=$kq[0]['avatar']?>" width="30%">
        <br></br>
        <div class="row">
            <div class="col usf">
                <div class="row" ><p>Họ và tên:</p></div>
                <div class="row" ><p>Email:</p></div>
                <div class="row" ><p>Tên tài khoản:</p></div>
                <div class="row" ><p>Mật khẩu:</p></div>
                <div class="row" ><p>Điện thoại:</p></div>
                <div class="row" ><p>Địa chỉ:</p></div>
            </div>
            <div class="col">
                <div class="row"><p><?=$kq[0]['name']?></p></div>
                <div class="row"><p><?=$kq[0]['email']?></p></div>
                <div class="row"><p><?=$kq[0]['user']?></p></div>
                <div class="row"><p><?=$kq[0]['password']?></p></div>
                <div class="row"><p><?=$kq[0]['sdt']?></p></div>
                <div class="row"><p><?=$kq[0]['address']?></p></div>
            </div>
        </div>
        <button type="button" class="btn btn-primary"><a class="add" href="index.php?act=modifyinfo">Chỉnh sửa</a></button>
    </div>
</div>

