<div class="boxright">

    <div class="mb">
        <div class="box_title">TÀI KHOẢN</div>
        <div class="box_content form_account">
            <form action="#" method="POST"></form>
            <h4>Tên đăng nhập</h4><br>
            <input type="text" name="user" id="">
            <h4>Mật khẩu</h4><br>
            <input type="password" name="pass" id=""><br>
            <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
            <br><input type="submit" value="Đăng nhập">
            <li class="form_li"><a href="#">Quên mật khẩu</a></li>
            <li class="form_li"><a href="#">Đăng kí thành viên</a></li>

        </div>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                    foreach ($dsdm as $dm){
                      extract($dm);
                      $linkdm = "index.php?act=sanpham&iddm=".$id;
                      echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                    
                    }
                  ?>
            </ul>
        </div>
        <div class="box_search">
            <form action="#" method="POST">
                <input type="text" name="" id="" placeholder="Từ khóa tìm kiếm">
            </form>
        </div>
    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
        <div class="box_content">
          <?php
          foreach ($dstop10 as $sp) {
            extract($sp);
            $linksp="index.php?act=sanphamct&idsp=".$id;
            $img=$img_path.$img;
            echo '          
            <div class="selling_products" style="width:100%;">
            <img src="'.$img.'" alt="anh">
            <a href="'.$linksp.'">'.$name.'</a>
        </div>';
          }
          
          ?>

    </div>
</div>