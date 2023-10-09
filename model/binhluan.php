<?php
function load_binhluan($idsp){
    $sql="SELECT binhluan.noidung,binhluan.ngaybinhluan,taikhoan.user FROM `binhluan`
    LEFT JOIN taikhoan ON binhluan.iduser=taikhoan.id
    LEFT JOIN sanpham ON binhluan.idpro=sanpham.id
    WHERE sanpham.id=$idsp";
    $result=pdo_query($sql);
    return $result;

}

?>