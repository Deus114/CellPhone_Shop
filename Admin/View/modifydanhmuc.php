<div class="text-center">
        <h2>CẬP NHẬT DANH MỤC SẢN PHẨM</h2>
    </div>
    <!-- form để thêm mới sản phẩm -->
    <form action="index.php?act=modifydanhmuc" method="post">
        
        <div class="input-group">
            <input class="input-group-text" type="text" name="tendanhmuc" value="<?=$dm[0]['tendanhmuc']?>">

            <select name="hienthi" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option value="selected">Hiển thị</option>
                <?php
                    $hienthicurr=$dm[0]['hienthi'];
                    if($hienthicurr==0){
                        echo '<option value="0" selected>0</option>';
                        echo '<option value="1">1</option>';
                    } else {
                        echo '<option value="0">0</option>';
                        echo '<option value="1" selected>1</option>';
                    }
                ?>
            </select>

            <input type="hidden" name="id" value="<?=$dm[0]['id']?>">

            <input type="submit" name="modify" value="Cập nhật" class="btn btn-warning">
        </div>

    </form>

    <!-- Bảng danh mục các sản phẩm -->
    <table id="update-category" class="table table-striped" style="width:100%">
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
                        <td>
                            <a href="index.php?act=modifydanhmuc&id='.$danhmuc['id'].'"> <button class="btn btn-success">Update</button> </a> 
                            <a href="index.php?act=deletedanhmuc&id='.$danhmuc['id'].'"> <button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    ';
                    $stt++;
                }
            }
        ?>
    </table>