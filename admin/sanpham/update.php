<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpart = "../upload/" . $img;
if (is_file($hinhpart)) {
    $hinh = "<img src='" . $hinhpart . "' height='80'>";
} else {
    $hinh = "no poto";
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>cập nhật HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <select name="iddm">
                    <option value="0">tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if($iddm==$id)
                        echo ' <option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" value="<?= $name ?>">
            </div>

            <div class="row2 mb10">
                <label>giá </label> <br>
                <input type="text" name="giasp" value="<?= $price ?>">
            </div>
            <div class="row2 mb10">
                <label>hình </label> <br>
                <input type="file" name="hinh">
                <?= $hinh ?>
            </div>
            <div class="row2 mb10">
                <label>Mô tả </label> <br>
                <textarea name="mota" cols="30" rows="10"> <?= $mota ?></textarea>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="mr20" type="submit" value="Cập nhật" name="capnhat">
                <input class="mr20" type="reset" value="Nhập lại">

                <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>

            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

            ?>


        </form>
    </div>
</div>