<br>
<div class="donhang">
<?php
    if(isset($_SESSION['texterr'])){
        echo "<font color='red'>".$_SESSION['texterr']."</font>";
        echo "<br></br>";
    }
?>
    <h3>Đơn hàng</h3>
    <br>
    <div class="row">
        <div class="col">
            <h4>Thông tin đơn hàng</h4>
            <p><?=$noidung?></p>
        </div>
        <div class="col">
            <h4>Thành tiền</h4>
            <p><?=number_format($tt)?>đ</p>
        </div>
    </div>
    
    
    <form action="index.php?act=xacnhan" method="post">
        <?php
            if(isset($_SESSION['user'])) 
                echo '<input type="hidden" name="iduser" value="'.$user[0]['id'].'">';
        ?>
        <div class="row">
            <div class="col">
                <div class="row lbl"><label for="hovaten">Họ và tên: </label></div>
                <div class="row lbl"><label for="sdt">Số điện thoại</label></div>
                <div class="row lbl"><label for="email">Email</label></div>
                <div class="row lbl"><label for="address">Địa chỉ</label></div>
                <div class="row lbl"><label for="pttt">Phương thức thanh toán</label></div>
            </div>
            <div class="col">
                <div class="row"><input type="text" name="hovaten" value="<?php if(isset($user) && $user[0]['name'] != "") echo $user[0]['name'];?>" require></div>
                <div class="row"><input type="text" name="sdt" value="<?php if(isset($user) && $user[0]['sdt'] != "") echo $user[0]['sdt'];?>" require></div>
                <div class="row"><input type="text" name="email" value="<?php if(isset($user) && $user[0]['email'] != "") echo $user[0]['email'];?>" require></div>
                <div class="row"><input type="text" name="address" value="<?php if(isset($user) && $user[0]['address'] != "") echo $user[0]['address'];?>" require></div>
                <div class="row"><select name="pttt" require>
                <option value="1" selected>Thanh toán khi nhận hàng</option>
                <option value="2">Thanh toán qua ví MOMO</option>
                <option value="3">Thanh toán qua VNPAY</option>
                <option value="4">Thanh toán bằng chuyển khoản ngân hàng</option>
            </select></div>
            </div>
        </div>
        
        <input type="hidden" name="thanhtien" value="<?php echo $tt; ?>">
        <input type="hidden" name="noidung" value="<?php echo $noidung; ?>">
        <br>
        <input type="submit" name="xacnhan" value="Xác nhận">
    </form>

</div>
