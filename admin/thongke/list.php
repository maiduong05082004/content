<div class="row2">
    <div class="row2 font_title">
        <h1>Thống kê sản phẩm trong danh mục</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
            
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>Số Lượng</th>
                        <th>Gía nhỏ nhất</th>
                        <th>giá lớn nhất</th>
                        <th>giá trung bình</th>
                      
                    </tr>


                    <?php
                    foreach ($dsthongke as $thongke) {
                        extract($thongke);

                    ?>
                        <tr>
                            <td><?php echo $id  ?></td>
                            <td><?php echo $name  ?></td>
                            <td><?php echo $soluong   ?></td>
                            <td><?php echo $gia_max   ?></td>
                            <td><?php echo $gia_min   ?></td>
                            <td><?php echo number_format($gia_avg,3)  ?>₫</td>

                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
             
                <a href="index.php?act=bieudo"> <input class="mr20" type="button" value="Xem Biểu đồ"></a>
            </div>
        </form>
    </div>
</div>