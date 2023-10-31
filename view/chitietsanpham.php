<main class="catalog  mb ">
  <?php
  extract($sp)
  ?>
  <div class="boxleft">
    <div class="  mb">
      <div class="box_title"><?= $name ?></div>
      <div class="box_content">
        <?php
        $linkimg = $img_path . $img;
        echo "<img src='$linkimg' width='300px'> 
            <p>$mota</p>";
        ?>
      </div>
    </div>

    <div class="mb">
  <iframe src="view\binhluan\binhluanform.php?idpro=<?=$id?>" frameborder="0" width="100%" height="300px"></iframe>

    </div>

    <div class=" mb">
      <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
      <div class="box_content">
        <?php
        foreach ($sp_cungloai as $value) {
          echo '<li><a href="index.php?act=sanphamct&idsp=' . $value['id'] . '">' . $value['name'] . '</a></li>';
        }
        ?>

      </div>
    </div>
  </div>
  <?php include "box_right.php" ?>

</main>