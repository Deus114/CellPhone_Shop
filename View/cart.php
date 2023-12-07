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

<!-- Giỏ hàng bắt đầu từ đây -->
<h2>Giỏ hàng</h2>
<?php
    if(isset($_SESSION['user'])){
        echo '<a href="index.php?act=donhang">Lịch sử mua hàng</a>';
    }
?>
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
            // Trường hợp user
            if(isset($_SESSION['user'])){
                if(isset($kq) && count($kq) != 0){
                    $stt=1;
                    $tt=0;
                    foreach($kq as $sp){
                        $item=getproduct($sp['idsp']);
                        $tong=$sp['soluong']*$item[0]['gia'];
                        $tt+=$tong;
                        echo '
                        <tr>
                            <td>'.$stt.'</td>
                            <td>'.$item[0]['tensp'].'</td>
                            <td><img src="'.substr($item[0]['image'],3).'" width="80px"></td>
                            <td>'.number_format($item[0]['gia']).'đ</td>
                            <td><a href="index.php?act=giamsl&id='.$sp['id'].'">-</a>
                            '.$sp['soluong'].'
                            <a href="index.php?act=tangsl&id='.$sp['id'].'">+</a>
                            </td>
                            <td>'.number_format($tong).'đ</td>
                            <td><a href="index.php?act=delcart&id='.$sp['id'].'">Xóa</a></td>
                        </tr>
                        ';
                        $stt++;
                    }
                }
            }
            // Trường hợp khách
            else {
                // Nếu danh muc sản phẩm không rỗng thì hiển thị toàn bộ
                if(isset($_SESSION['cart']) && (count($_SESSION['cart']))>0){
                    // Đếm số thứ tự
                    $stt=1;
                    $count=0;
                    $tt=0;
                    foreach($_SESSION['cart'] as $item){
                        $tong=$item[2]*$item[3];
                        $tt+=$tong;
                        echo '
                        <tr>
                            <td>'.$stt.'</td>
                            <td>'.$item[0].'</td>
                            <td><img src="'.substr($item[1],3).'" width="80px"></td>
                            <td>'.number_format($item[2]).'đ</td>
                            <td><a href="index.php?act=giamsl&id='.$count.'">-</a>
                            '.$item[3].'
                            <a href="index.php?act=tangsl&id='.$count.'">+</a>
                            </td>
                            <td>'.number_format($tong).'đ</td>
                            <td><a href="index.php?act=delcart&id='.$count.'">Xóa</a></td>
                        </tr>
                        ';
                        $stt++;
                        $count++;
                    }
                }
            }
            
        ?>
</table>
<?php
    if(isset($tt)){
        echo '<p>Thành tiền: '.number_format($tt).'đ</p>';
        // Xóa tất cả
        echo '<a href="index.php?act=delcart">Xóa tất cả</a> | ';
        echo '<a href="index.php?act=dathang">Đặt hàng</a>';   
    }
?>
<?php
    if(isset($texterr)){
        echo "<br></br>";
        echo "<font color='red'>".$texterr."</font>";
    }
?>