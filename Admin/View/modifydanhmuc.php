<div class="danhmucsanpham">
    <h2>CẬP NHẬT DANH MỤC SẢN PHẨM</h2>
    
    <!-- form để thêm mới sản phẩm -->
    <form action="index.php?act=modifydanhmuc" method="post">
        <input type="text" name="tendanhmuc" value="<?=$product[0]['tendanhmuc']?>">
        <input type="text" name="hienthi" value="<?=$product[0]['hienthi']?>">
        <input type="hidden" name="id" value="<?=$product[0]['id']?>">
        <input type="submit" name="modify" value="Cập nhật">
    </form>

    <!-- Bảng danh mục các sản phẩm -->
    <table>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
        </tr>
        <?php
            // Nếu danh muc sản phẩm không rỗng thì hiển thị toàn bộ
            if(isset($kq) && (count($kq))>0){
                // Đếm số thứ tự
                $stt=1;
                foreach($kq as $danhmuc){
                    echo '
                    <tr>
                        <td>'.$stt.'</td>
                        <td>'.$danhmuc['tendanhmuc'].'</td>
                        <td>'.$danhmuc['hienthi'].'</td>
                        <td><a href="index.php?act=modifydanhmuc&id='.$danhmuc['id'].'">Sửa</a> | <a href="index.php?act=deletedanhmuc&id='.$danhmuc['id'].'">Xóa</a></td>
                    </tr>
                    ';
                    $stt++;
                }
            }
        ?>
    </table>
</div>