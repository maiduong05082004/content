<main class="catalog  mb ">

    <div class="boxleft">
        <div class="box_title">Quên mật khẩu</div>
        <div class="box_content form_account">
            <form action="index.php?act=quenmk" method="post">
                <div>
                    <p>Email</p>
                    <input type="email" name="email" id="email">
                </div>
                
                <input type="submit" value="quên mật khẩu" name="guiemail">
                <input type="reset" value="Nhập lại">
            </form>
            <h2 class="thongbao">
                <?php 
                        if (isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }

                ?>
        </div>
    </div>

    <?php include "view/box_right.php" ?>

</main>