 <div class="showsanpham">
    <div class="row">
    <?php
        if(isset($tendm)) echo '<div class="col"><h2>'.$tendm.'</h2></div>';
        else {
    ?>
        <div class="col"><h2>Sản phẩm bán chạy</h2></div>
    <?php } ?>
        <div class="col">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Tìm theo hãng
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php
                        foreach($listdm as $dm){
                            echo '<li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sanpham&id='.$dm['id'].'">'.$dm['tendanhmuc'].'</a></li>';
                        }
                    ?>
                    <li class="dropdown-item"><a class="text-decoration-none" href="index.php?act=sanpham">Tất cả</a></li>
                </ul>
        </div>
        </div>
    </div>
    
    <?php
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
                        <input class="btn btn-primary" type="submit" name="addcart" value="Thêm vào giỏ hàng">
                    </form>
                    </div>
                </div>';
            $count++;
        }
        echo '</div>';
    ?>
 </div>   
    