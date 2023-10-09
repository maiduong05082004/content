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
      <div class="box_title">BÌNH LUẬN</div>
      <div class="box_content2  product_portfolio binhluan ">
        <table>
          <?php
          foreach ($binhluan as $value) {
            extract($value);
            echo '<tr>';
            echo '<td>' . $noidung . '</td>';
            echo '<td>' . $user . '</td>';
            echo '<td>' . date('d/m/Y', strtotime($ngaybinhluan))  . '</td>';
            echo '</tr>';
          }
          ?>

        </table>
      </div>
      <div class="box_search">
        <form action="index.php?act=sanphamct" method="POST">
          <input type="hidden" name="idpro" value="<?php echo $id;?>">
          <input type="text" name="noidung">
          <input type="submit" name="guibinhluan" value="Gửi bình luận">
        </form>
      </div>

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