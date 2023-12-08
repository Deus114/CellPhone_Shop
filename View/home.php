    <!-- Begin Content -->
    <div class="content row">
            <aside class="col-sm-3">
                <h3>Danh mục sản phẩm</h3>
                <ul class="list-group">
                  <?php
                    foreach($listdm as $dm){
                      if($dm['hienthi']==1)
                      echo '<li class="list-group-item"><a href="index.php?act=sanpham&id='.$dm['id'].'" class="text-decoration-none">'.$dm['tendanhmuc'].'</a></li>';
                    }
                  ?>
                </ul>
            </aside>
            <div class="col-sm-7 homeprd">
                <h2>Sản phẩm nổi bật</h2>
                <?php
                  //Đếm đủ 3 sản phẩm thì xuống hàng
                  $count=0;
                  echo '<div class="row justify-content-start">';
                  foreach($kq as $sp){
                    if($count==3){
                      echo '</div>';
                      echo '<div class="row justify-content-start">';
                      $count=0;
                    }
                    echo '<div class="card product col-4">
                              <a href="index.php?act=spchitiet&id='.$sp['id'].'"> <img class="rounded mx-auto d-block" src="'.substr($sp['image'],3).'" alt="'.substr($sp['image'],10).'" style="width:100%"> </a>
                              <div class="card-body">
                                <p class="card-text">'.$sp['tensp'].'</p>
                                <p class="card-text">Giá: '. number_format($sp['gia']).'đ</p>
                                <form action="index.php?act=addtocart" method="post">
                                  <input type="hidden" name="idsp" value="'.$sp['id'].'">
                                  <input class="btn btn-primary res" type="submit" name="addcart" value="Thêm vào giỏ hàng">
                                </form>
                              </div>
                          </div>';
                    $count++;
                  }
                  echo '</div>';
                ?>
            </div>
        </div>
    <!-- End Content -->