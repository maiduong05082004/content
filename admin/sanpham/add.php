<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI Sản phẩm</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label> Danh Mục </label> <br>
                <select name="iddm" id="">


                    <?php
              foreach ($listdanhmuc as $danhmuc){
              extract($danhmuc);
              echo' <option value="'.$id.'">'.$name.'</option>';
            }
           
           ?>


                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" placeholder="nhập vào tên">
            </div>

            <div class="row2 mb10">
                <label>giá </label> <br>
                <input type="text" name="giasp" placeholder="nhập vào tên">
            </div>
            <div class="row2 mb10">
                <label>hình </label> <br>
                <input type="file" name="hinh" placeholder="nhập vào tên">
            </div>
            <div class="row2 mb10">
                <label>mô tả </label> <br>
                <textarea name="mota" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
if(isset($thongbao)&&($thongbao!=""))echo $thongbao;

?>


        </form>
    </div>
</div>