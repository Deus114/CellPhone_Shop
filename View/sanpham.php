 <div class="showsanpham">
    <h2>Sản phẩm bán chạy</h2>
    <?php
        //Đếm đủ 4 sản phẩm thì xuống hàng
        $count=0;
        echo '<div class="row justify-content-start">';
        foreach($kq as $sp){
            if($count==4){
                echo '</div>';
                echo '<div class="row justify-content-start">';
                $count=0;
            }
            echo '<div class="card product col col-3">
                    <a href="index.php?act=spchitiet&id='.$sp['id'].'"> <img class="rounded mx-auto d-block" src="'.substr($sp['image'],3).'" alt="Card image" style="width:100%"> </a>
                    <div class="card-body">
                    <p class="card-text">'.$sp['tensp'].'</p>
                    <p class="card-text">Giá: '. number_format($sp['gia']).'đ</p>
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="idsp" value="'.$sp['id'].'">
                        <input type="submit" name="addcart" value="Thêm vào giỏ hàng">
                    </form>
                    </div>
                </div>';
            $count++;
        }
        echo '</div>';
    ?>
 </div>   
    