<div class="danhmucsanpham">
    <h2>CHỈNH SỬA THÔNG TIN SẢN PHẨM</h2>

    <!-- form để thêm mới sản phẩm -->
    <form action="index.php?act=updateproduct" method="post" enctype="multipart/form-data">
        <!-- Chọn danh mục để thêm vào -->
        <select name="iddm" id="">
            <option value="0">--Chọn danh mục--</option>
            <?php
                $iddmcur=$prd[0]['iddanhmuc'];
                // Nếu danh muc sản phẩm không rỗng thì hiển thị toàn bộ
                if(isset($listdm) && (count($listdm))>0){
                    foreach($listdm as $danhmuc){
                        if($danhmuc['id']==$iddmcur)
                            echo '<option value="'.$danhmuc['id'].'" selected>'.$danhmuc['tendanhmuc'].'</option>';
                        else    
                            echo '<option value="'.$danhmuc['id'].'">'.$danhmuc['tendanhmuc'].'</option>';
                    }
                }
            ?>
        </select>
        <input type="text" name="nameprd" id="" value="<?=$iddmcur=$prd[0]['tensp']?>">
        <input type="file" name="img" id="">
        <img src="<?=$iddmcur=$prd[0]['image']?>" width=80 alt="">
        <?php
            if(isset($uploadOk)&&($uploadOk == 0)){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        ?>
        <input type="text" name="gia" id="" value="<?=$iddmcur=$prd[0]['gia']?>">
        <input type="hidden" name="id" value="<?=$iddmcur=$prd[0]['id']?>">
        <input type="submit" name="update" value="Cập nhật">
    </form>

    <!-- Bảng danh mục các sản phẩm -->
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
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
                        <td><a href="index.php?act=updateprd&id='.$item['id'].'">Sửa</a> | <a href="index.php?act=deleteprd&id='.$item['id'].'">Xóa</a></td>
                    </tr>
                    ';
                    $stt++;
                }
            }
        ?>
    </table>
</div>