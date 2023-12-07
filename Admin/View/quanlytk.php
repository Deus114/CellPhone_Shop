<div class="bg-light d-flex align-items-center justify-content-center border rounded-3 p-1 p-sm-3 m-2 m-sm-4">
    <h2>Quản lí tài khoản</h2>
</div>

<table id="accounts"  class="table table-striped" style="width:100%">
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Username</th>
            <th>Email</th>
            <th>ID Người dùng</th>
            <th>Vai trò</th>
            <th>Cấm bình luận</th>
            <th>Cấm mua hàng</th>
            <th>Xóa</th>
        </tr>
        <?php
            if(isset($kq) && count($kq)>0){
                $stt=1;
                foreach($kq as $item){
                    echo '
                    <tr>
                        <td>'.$stt.'</td>
                        <td>'.$item['name'].'</td>
                        <td>'.$item['address'].'</td>
                        <td>'.$item['sdt'].'</td>
                        <td>'.$item['user'].'</td>
                        <td>'.$item['email'].'</td>
                        <td>'.$item['id'].'</td>
                        <td>'.$item['role'].'</td>
                        <td>'.$item['banchat'].'</td>
                        <td>'.$item['banbuy'].'</td>
                        <td>
                            <a href="index.php?act=modifyuser&id='.$item['id'].'"> <button class="btn btn-success">Update</button> </a>
                            <a href="index.php?act=deleteuser&id='.$item['id'].'"> <button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    ';
                    $stt++;
                }
            }
    ?>
</table>