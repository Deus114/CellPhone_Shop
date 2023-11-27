<div class="danhmucsanpham">
    <h2>SẢN PHẨM</h2>

    <!-- form để thêm mới sản phẩm -->
    <form action="index.php?act=addprd" method="post" enctype="multipart/form-data">
        <!-- Chọn danh mục để thêm vào -->
        <select name="iddm" id="">
            <option value="0">--Chọn danh mục--</option>
            <?php
                // Nếu danh muc sản phẩm không rỗng thì hiển thị toàn bộ
                if(isset($listdm) && (count($listdm))>0){
                    foreach($listdm as $danhmuc){
                        echo '<option value="'.$danhmuc['id'].'">'.$danhmuc['tendanhmuc'].'</option>';
                    }
                }
            ?>
        </select>
        <input type="text" name="nameprd" id="">
        <input type="file" name="img" id="">
        <?php
            if(isset($uploadOk)&&($uploadOk == 0)){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        ?>
        <input type="text" name="gia" id="">
        <input type="submit" name="addnewprd" value="Thêm mới">
    </form>

    <!-- Bảng danh mục các sản phẩm -->
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Tiêu biểu</th>
            <th>Mô tả</th>
            <th>Chi tiết</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
        </tr>
        <?php
            // Nếu danh muc sản phẩm không rỗng thì hiển thị toàn bộ
            if(isset($kq) && (count($kq))>0){
                // Đếm số thứ tự
                $stt=1;
                foreach($kq as $item){
                    echo '
                    <tr>
                        <td>'.$stt.'</td>
                        <td>'.$item['tensp'].'</td>
                        <td><img src="'.$item['image'].'" width="80px"></td>
                        <td>'.$item['gia'].'</td>
                        <td>'.$item['sptieubieu'].'</td>
                        <td>'.$item['mota'].'</td>
                        <td>'.$item['chitiet'].'</td>
                        <td>'.$item['hienthi'].'</td>
                        <td><a href="index.php?act=updateprd&id='.$item['id'].'">Sửa</a> | <a href="index.php?act=deleteprd&id='.$item['id'].'">Xóa</a></td>
                    </tr>
                    ';
                    $stt++;
                }
            }
        ?>
    </table>
</div>