<h2>Chỉnh sửa tài khoản</h2>
<h4>Tên tài khoản: <?php echo $kq[0]['user'] ?></h4>
<form action="index.php?act=updateuser" method="post">
    <label for="role"> Vai trò </label>
    <select name="role">
        <option value="0" <?php if($kq[0]['role']==0) echo 'Selected'; ?>>Người dùng</option>
        <option value="1" <?php if($kq[0]['role']==1) echo 'Selected'; ?>>Quản trị viên</option>
    </select>
    <label for="banchat"> Cấm bình luận </label>
    <select name="banchat">
        <option value="0" <?php if($kq[0]['banchat']==0) echo 'Selected'; ?>> Cho phép bình luận</option>
        <option value="1" <?php if($kq[0]['banchat']==1) echo 'Selected'; ?>>Chặn bình luận</option>
    </select>
    <label for="banbuy"> Cấm mua hàng </label>
    <select name="banbuy">
        <option value="0" <?php if($kq[0]['banbuy']==0) echo 'Selected'; ?>>Cho phép mua hàng</option>
        <option value="1" <?php if($kq[0]['banbuy']==1) echo 'Selected'; ?>>Chặn mua hàng</option>
    </select>
    <input type="hidden" name="id" value="<?php echo $kq[0]['id'] ?>">
    <input type="submit" value="Cập nhật">
</form>