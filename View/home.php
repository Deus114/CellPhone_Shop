    <!-- Begin Content -->
    <div class="content row">
            <aside class="col-sm-3">
                <h3>Danh mục sản phẩm</h3>
                <ul class="list-group">
                  <?php
                    foreach($listdm as $dm){
                      echo '<li class="list-group-item"><a href="#" class="text-decoration-none">'.$dm['tendanhmuc'].'</a></li>';
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
                              <a href="index.php?act=spchitiet&id='.$sp['id'].'"> <img class="rounded mx-auto d-block" src="'.substr($sp['image'],3).'" alt="Card image" style="width:100%"> </a>
                              <div class="card-body">
                                <p class="card-text">'.$sp['tensp'].'</p>
                                <p class="card-text">Giá: '. number_format($sp['gia']).'đ</p>
                                <button type="button" class="btn btn-primary"><a class="add" href="#">Thêm vào giỏ hàng</a></button>
                              </div>
                          </div>';
                    $count++;
                  }
                  if($count != 1) echo '</div>';
                ?>
            </div>
        </div>
    <!-- End Content -->