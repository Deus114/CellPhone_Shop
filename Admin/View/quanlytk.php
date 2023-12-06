<!-- Giỏ hàng bắt đầu từ đây -->
<h2>Quản lí tài khoản</h2>
<table>
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
                        <td><a href="index.php?act=modifyuser&id='.$item['id'].'">Sửa</a> | <a href="index.php?act=deleteuser&id='.$item['id'].'">Xóa</a></td>
                    </tr>
                    ';
                    $stt++;
                }
            }
    ?>
</table>