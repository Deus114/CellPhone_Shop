<div class="bg-light d-flex align-items-center justify-content-center border rounded-3 p-1 p-sm-3 m-2 m-sm-4">
        <h2>CHỈNH SỬA THÔNG TIN SẢN PHẨM</h2>   
    </div>
    <!-- form để thêm mới sản phẩm -->
    <div class="bg-light border rounded-3 p-1 p-sm-3 ">
        <form action="index.php?act=updateproduct" method="post" enctype="multipart/form-data">
            <!-- Chọn danh mục để thêm vào -->
            <div class="input-group mb-2">
                <label for="iddm" class="input-group-text bg-light"> Danh mục </label>
                <select name="iddm" class="form-select">
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
            </div>
            
            <div class="mb-2">
                <div class="input-group mb-1">
                    <label for="nameprd" class="input-group-text bg-light"> Tên sản phẩm </label>
                    <input type="text" class="form-control" name="nameprd" value="<?=$iddmcur=$prd[0]['tensp']?>">
                </div>
                <div class="input-group mb-1">
                    <label for="img" class="input-group-text bg-light" width=80> Hình ảnh </label>
                    <img src="<?=$iddmcur=$prd[0]['image']?>" width=80>
                </div>
                <input type="file" name="img" class="form-control" width=80>
                    <?php
                        if(isset($uploadOk)&&($uploadOk == 0)){
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        }
                    ?>
            </div>

            <div class="input-group mb-2">
                <label for="gia" class="input-group-text bg-light"> Giá </label>
                <input type="text" class="form-control" name="gia" value="<?=$iddmcur=$prd[0]['gia']?>">
            </div>
            
            <div class="input-group mb-2">
                <label for="sptieubieu" class="input-group-text bg-light"> Sản phẩm tiêu biểu </label>
                <select name="sptieubieu" class="form-select">
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
            </div>
            
            <div class="input-group mb-2">
                <label for="mota" class="input-group-text" > Mô tả </label>
                <input type="text" class="form-control" name="mota" value="<?=$iddmcur=$prd[0]['mota']?>">
            </div>

            <div class="input-group mb-2">
                <label for="chitiet" class="input-group-text" > Chi tiết </label>
                <input type="text" class="form-control" name="chitiet" value="<?=$iddmcur=$prd[0]['chitiet']?>">
            </div>

            <div class="input-group mb-2">
                <input type="hidden" name="id" value="<?=$iddmcur=$prd[0]['id']?>">
                <label for="hienthi" class="input-group-text" > Hiển thị </label>
                <select name="hienthi" class="form-select">
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
                </select>
            </div>
            <input type="submit" name="update" value="Cập nhật" class="btn btn-warning">
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