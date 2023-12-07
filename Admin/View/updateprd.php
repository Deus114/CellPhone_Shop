    <div class="text-center">
        <h2>CHỈNH SỬA THÔNG TIN SẢN PHẨM</h2>   
    <!-- form để thêm mới sản phẩm -->
    <form action="index.php?act=updateproduct" method="post" enctype="multipart/form-data">
        <!-- Chọn danh mục để thêm vào -->
        <label for="iddm"> Danh mục </label>
        <select name="iddm">
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
        <label for="nameprd"> Tên sản phẩm: </label>
        <input type="text" name="nameprd" id="" value="<?=$iddmcur=$prd[0]['tensp']?>">
        <label for="img"> Hình ảnh: </label>
        <img src="<?=$iddmcur=$prd[0]['image']?>" width=80 alt="">
        <input type="file" name="img" id="">
        <?php
            if(isset($uploadOk)&&($uploadOk == 0)){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        ?>
        <br></br>
        <label for="gia" style="margin-left:-8%"> Giá: </label>
        <input type="text" name="gia" id="" value="<?=$iddmcur=$prd[0]['gia']?>">
        <label for="sptieubieu"> Tiêu biểu: </label>
        <select name="sptieubieu">
            <?php
                $sptieubieucurr=$prd[0]['sptieubieu'];
                // Nếu danh muc sản phẩm không rỗng thì hiển thị toàn bộ
                if($sptieubieucurr==0){
                    echo '<option value="0" selected>0</option>';
                    echo '<option value="1">1</option>';
                } else {
                    echo '<option value="0">0</option>';
                    echo '<option value="1" selected>1</option>';
                }
            ?>
        </select>
        <label for="hienthi"> Hiển thị: </label>
        <select name="hienthi">
            <?php
                $hienthicurr=$prd[0]['hienthi'];
                if($hienthicurr==0){
                    echo '<option value="0" selected>0</option>';
                    echo '<option value="1">1</option>';
                } else {
                    echo '<option value="0">0</option>';
                    echo '<option value="1" selected>1</option>';
                }
            ?>
        </select> <br></br>
        <label for="mota"> Mô tả: </label>
        <textarea name="mota" cols="60" rows="5"><?=$iddmcur=$prd[0]['mota']?></textarea>
        <label for="chitiet"> Chi tiết: </label>
        <textarea name="chitiet" cols="60" rows="5"><?=$iddmcur=$prd[0]['chitiet']?></textarea>
        <input type="hidden" name="id" value="<?=$iddmcur=$prd[0]['id']?>">
        <input type="submit" name="update" value="Cập nhật">
    </form>
    </div>
    <!-- Bảng danh mục các sản phẩm -->
    <table id="products"  class="table table-striped" style="width:100%">
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
                        <td>
                            <a href="index.php?act=updateprd&id='.$item['id'].'"> <button class="btn btn-success">Update</button> </a> 
                            <a href="index.php?act=deleteprd&id='.$item['id'].'"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    ';
                    $stt++;
                }
            }
        ?>
    </table>