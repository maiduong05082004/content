<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH tài khoản</h1>
    </div>
    <div class="row2 form_content ">

        <div class="row2 mb10 formds_loai">
            <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Nội Dung</th>
                    <th>id User </th>
                    <th>idPro</th>
                    <th>ngày bình Luận </th>

                    <th></th>
                </tr>

                <?php

                foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
                    $suabl = "index.php?act=suabl&id=" . $id;
                    $xoabl = "index.php?act=xoabl&id=" . $id;
                    echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $id . '</td>
                            <td>' . $noidung . '</td>
                            <td>' . $iduser . '</td>
                            <td>' . $idpro . '</td>
                            <td>' . $ngaybinhluan . '</td>
                            <td><a href="' . $xoabl . '"><input type="button" value="Xóa"></a></td>
                        </tr>';
                }
                ?>
            </table>
        </div>
        <div class="row mb10 ">
            <input type="hidden" name="idpro" value="<?= $idpro ?>">
            <input class="mr20" type="button" value="CHỌN TẤT CẢ">
            <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">


        </div>
    </div>