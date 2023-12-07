<div class="text-center">
        <h2>Bình luận</h2>
    </div>
    
    <!-- Bảng danh mục các sản phẩm -->
    <table id="comments"  class="table table-striped" style="width:100%">
        <tr>
            <th>STT</th>
            <th>User</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
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
                        <td>'.$item['user'].'</td>
                        <td>'.$item['noidung'].'</td>
                        <td>'.$item['date'].'</td>
                        <td>
                        <a href="index.php?act=deletebl&id='.$item['id'].'">
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