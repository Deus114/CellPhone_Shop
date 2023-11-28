    <div class="mmain">
        <?php
            foreach($kq as $sp)
            echo '<div class="image-responsive">
            <div class="gallery"><a target="_blank" href="#"><img src="'.substr($sp['image'],3).'" alt="sample" width="600" height="400"></a>
              <div class="image-description">'.$sp['tensp'].'</div>
            </div>
          </div>'
        ?>
    </div>