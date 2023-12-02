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
                <button type="button" class="btn btn-primary buy"><a class="add" href="#">Thêm vào giỏ hàng</a></button>
            </div>
        </div>
        <div class="col-12" style="margin-top: 25px;">
            <h3>Thông tin chi tiết:</h3>
            <div class="des">
                <p><?php echo $kq[0]['chitiet']; ?></p>
            </div>
        </div>
        <!-- Jquery và ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#binhluan").load("View/formbinhluan.php", {idprd: <?=$kq[0]['id']?>});
            });
        </script>
        <div id="binhluan"></div>
    </div> 
            