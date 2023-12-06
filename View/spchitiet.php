    <div class="display">
        <div class="row">
            <div class="col">
                <div class="box-large">
                    <div class="box-top">
                    <img id="img-large" class="img-fluid" src="<?php echo substr($kq[0]['image'],3); ?>" alt="Product">
                    </div>
                </div>
            </div>
            <div class="col">
                <h2><?php echo $kq[0]['tensp']; ?></h2>
                <br>
                <h3>Giá bán: <?php echo  number_format($kq[0]['gia']); ?>đ</h3>
                <br>
                <h4>Mô tả:</h4>
                <p><?php echo $kq[0]['mota']; ?></p>
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="idsp" value="<?php echo $kq[0]['id']; ?>">
                    <input class=" buy btn btn-primary" type="submit" name="addcart" value="Thêm vào giỏ hàng">
                </form>
            </div>
        </div>
        <div class="col-12" style="margin-top: 25px;">
            <h3>Thông tin chi tiết:</h3>
            <div class="des">
                <p><?php echo $kq[0]['chitiet']; ?></p>
            </div>
        </div>
        <br>
        <div class="binhluan">
            <div class="mgl inbl">
                <h3>Bình luận</h3>
                <br>
                <div class="mgl">
                    <div id="comment">
                        <?php 
                            if(isset($listbl) && count($listbl)>0){
                                foreach($listbl as $bl){
                                    echo '<h5>'.$bl['user'].'</h5>';
                                    echo '<span style="opacity: 0.5;">'.$bl['date'].'</span>';
                                    echo '<br>';
                                    echo '<p>'.$bl['noidung'].'</p>';
                                }
                            }
                        ?>
                    </div>
                    <?php
                        if(isset($_SESSION['user'])){
                    ?>
                        <!-- Form để nhập bình luận, khi đăng nhập mới hiện ra -->
                        <form id="commentForm">
                            <label for="comment" class="form-label">Nhập bình luận:</label>
                            <textarea class="form-control input noidung" id="input" require></textarea> <br>
                            <input type="submit" name="guibl" value="Gửi">
                        </form>
                    <?php } ?> 
                </div>
            </div>
        </div>
        <!-- Jquery và ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            // Gửi bình luận bằng Ajax
            $('#commentForm').submit(function(e) {
                e.preventDefault(); // Ngăn chặn sự kiện mặc định của form
                var $noidung = $('.noidung').val(); // Lấy dữ liệu từ form

                $.ajax({
                    url: 'View/formbinhluan.php', // Đường dẫn đến tệp xử lý bình luận
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        noidung: $noidung
                    }
                }).done(function(ketqua){
                    document.getElementById("input").value = "";
                    document.getElementById("comment").value = "";
                    $('#comment').html(ketqua);
                });
            });
        });
        </script>
    </div> 
            