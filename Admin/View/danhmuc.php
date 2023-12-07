<div class="bg-light d-flex align-items-center justify-content-center border rounded-3 p-1 p-sm-3 m-2 m-sm-4">
        <h2>DANH MỤC SẢN PHẨM</h2>
    </div>
    

    <!-- form để thêm mới sản phẩm -->
    <form action="index.php?act=addnew" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Brand</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            <input type="submit" name="addnewprd" value="Thêm mới" class="btn btn-success">
        </div>
    </form>

    <!-- Bảng danh mục các sản phẩm -->
    <table id="category" class="table table-striped" style="width:100%">
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
                            <a href="index.php?act=modifydanhmuc&id='.$danhmuc['id'].'">
                                <button class="btn btn-success">Update</button> 
                            </a>
                            <a href="index.php?act=deletedanhmuc&id='.$danhmuc['id'].'">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                    ';
                    $stt++;
                }
            }
        ?>
    </table>