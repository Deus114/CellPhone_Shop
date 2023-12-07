<div class="bg-light d-flex align-items-center justify-content-center border rounded-3 p-1 p-sm-3 m-2 m-sm-4">
         <h2>SẢN PHẨM</h2>
    </div>

    <!-- form để thêm mới sản phẩm -->

    <div class="bg-light border rounded-3 p-3 p-sm-3">
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
        <label for="nameprd"> Tên sản phẩm: </label>
        <input type="text" name="nameprd" id="">
        <label for="img"> Chọn hình ảnh: </label>
        <input type="file" name="img" id="">
        <?php
            if(isset($uploadOk)&&($uploadOk == 0)){
                echo "<br>";
                echo "<font color='red'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</font>";
            }
        ?>
        <br></br>
        <label for="gia"> Giá: </label>
        <input type="text" name="gia" id="">
        <input type="submit" name="addnewprd" value="Thêm mới">
    </form>
    </div>
    <!-- Sort -->
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Sắp xếp theo giá
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sort&id=1">Giảm dần</a></li>
                    <li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sort&id=2">Tăng dần</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                     Sắp xếp theo lượt xem
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sortview&id=1">Giảm dần</a></li>
                    <li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sortview&id=2">Tăng dần</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                     Sắp xếp theo lượt mua
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sortbuy&id=1">Giảm dần</a></li>
                    <li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sortbuy&id=2">Tăng dần</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bảng danh mục các sản phẩm -->
    <table id="products" class="table table-striped" style="width:100%">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Tiêu biểu</th>
            <th>Mô tả</th>
            <th>Chi tiết</th>
            <th>Hiển thị</th>
            <th>Lượt xem</th>
            <th>Lượt mua</th>
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
                        <td>'.$item['watch'].'</td>
                        <td>'.$item['buy'].'</td>
                        <td>
                            <a href="index.php?act=updateprd&id='.$item['id'].'"><button class="btn btn-success">Update</button> </a> 
                            <a href="index.php?act=deleteprd&id='.$item['id'].'"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    ';
                    $stt++;
                }
            }
        ?>
    </table>