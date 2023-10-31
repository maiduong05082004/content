<main class="catalog  mb ">
    <div class="boxleft">
        <div class="banner">
            <img id="banner" src="./upload/anh0.jpg" alt="">
            <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button>
        </div>
        <div class="box_title">SẢN PHẨM&nbsp;<strong><span style="text-transform: uppercase;"><?= $tendm ?></span></strong></div>
        <div class="items">
        <?php 
        $i=0;
        foreach($dssp as $sp){
            extract($sp);
            $hinh=$img_path.$img;
            $link="index.php?act=sanphamct&idsp=$id";
            if(($i==2)||($i==5)||($i==8)){
                $mr="";
            }else{
                $mr="mr";
            }
            echo '<div class="box_items"'.$mr.'>
                <div class="box_items_img">
                    <img src="'.$hinh.'" alt="">
                    <div class="add" href="">ADD TO CART</div>
                </div>
                <a class="item_name" href="'.$link.'">'.$name.'</a>
                <p class="price">'.$price.'</p>

            </div>';
            $i+=1;
        } ?>
        </div>
    </div>
    <?php include "box_right.php"?>

</main>
