<h2>Giỏ hàng</h2>
<table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Xóa</th>
        </tr>
        <?php
            // Nếu danh muc sản phẩm không rỗng thì hiển thị toàn bộ
            if(isset($_SESSION['cart']) && (count($_SESSION['cart']))>0){
                // Đếm số thứ tự
                $stt=1;
                $count=0;
                foreach($_SESSION['cart'] as $item){
                    $tong=$item[2]*$item[3];
                    echo '
                    <tr>
                        <td>'.$stt.'</td>
                        <td>'.$item[0].'</td>
                        <td><img src="'.substr($item[1],3).'" width="80px"></td>
                        <td>'.number_format($item[2]).'đ</td>
                        <td>'.$item[3].'</td>
                        <td>'.$tong.'</td>
                        <td><a href="index.php?act=delcart&id='.$count.'">Xóa</a></td>
                    </tr>
                    ';
                    $stt++;
                    $count++;
                }
                // Nút xóa tất cả
                echo '<a href="index.php?act=delcart">Xóa tất cả</a>';
            }
        ?>
    </table>