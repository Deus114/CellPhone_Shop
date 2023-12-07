<div class="bg-secondary d-flex align-items-center justify-content-center border rounded-3 p-1 p-sm-3 m-2 m-sm-4">
    <h2>Chỉnh sửa tài khoản</h2>
</div>
<div class="bg-light h-75 p-3 p-sm-4 m-2 m-sm-4 border rounded-2">
    <div class="text-center bg-info w-50 border rounded-3 p-2 p-sm-2 m-1 m-sm-3">
        <h4>Tên tài khoản: <?php echo $kq[0]['user'] ?></h4>
    </div>
    <div class="border rounded-3 p-2 p-sm-2 m-1 m-sm-3">
        <form action="index.php?act=updateuser" method="post">

            <div class="input-group mb-3 mb-sm-4">
                <label for="role" class="input-group-text bg-light"> Vai trò </label>
                <select name="role" class="form-select" aria-label="Role adjustment">
                    <option value="0" <?php if($kq[0]['role']==0) echo 'Selected'; ?>>Người dùng</option>
                    <option value="1" <?php if($kq[0]['role']==1) echo 'Selected'; ?>>Quản trị viên</option>
                </select>
            </div>

            <div class="input-group mb-3 mb-sm-4">
                <label for="banchat" class="input-group-text bg-warning" > Cấm bình luận </label>
                <select name="banchat" class="form-select" aria-label="Comment adjustment">
                    <option value="0" <?php if($kq[0]['banchat']==0) echo 'Selected'; ?>> Cho phép bình luận</option>
                    <option value="1" <?php if($kq[0]['banchat']==1) echo 'Selected'; ?>>Chặn bình luận</option>
                </select>
            </div>
            
            <div class="input-group mb-3 mb-sm-4">
                <label for="banbuy" class="input-group-text bg-primary" > Cấm mua hàng </label>
                <select name="banbuy" class="form-select" aria-label="Order adjustment">
                    <option value="0" <?php if($kq[0]['banbuy']==0) echo 'Selected'; ?>>Cho phép mua hàng</option>
                    <option value="1" <?php if($kq[0]['banbuy']==1) echo 'Selected'; ?>>Chặn mua hàng</option>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $kq[0]['id'] ?>">
            <input type="submit" value="Cập nhật" class="btn btn-success">
        </form>
    </div>
    
</div>