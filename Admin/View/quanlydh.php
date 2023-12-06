<!-- Giỏ hàng bắt đầu từ đây -->
<h2>Quản lý đơn hàng</h2>
<table>
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Nội dung đơn hàng</th>
            <th>Thành tiền</th>
            <th>Người đặt hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>ID Người dùng</th>
            <th>Ngày mua</th>
            <th>Xóa</th>
        </tr>
        <?php
            if(isset($kq) && count($kq)>0){
                $stt=1;
                foreach($kq as $item){
                    echo '
                    <tr>
                        <td>'.$stt.'</td>
                        <td>'.$item['madonhang'].''.$item['id'].'</td>
                        <td>'.$item['noidung'].'</td>
                        <td>'.number_format($item['thanhtien']).'đ</td>
                        <td>'.$item['hovaten'].'</td>
                        <td>'.$item['sdt'].'</td>
                        <td>'.$item['email'].'</td>
                        <td>'.$item['address'].'</td>
                        <td>'.$item['iduser'].'</td>
                        <td>'.$item['date'].'</td>
                        <td><a href="index.php?act=deletedh&id='.$item['id'].'">Xóa</a></td>
                    </tr>
                    ';
                    $stt++;
                }
            }
    ?>
</table>