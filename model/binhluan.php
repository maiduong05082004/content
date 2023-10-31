<?php
function load_binhluan($idsp)
{
    $sql = "SELECT binhluan.noidung,binhluan.ngaybinhluan,taikhoan.user FROM `binhluan`
    LEFT JOIN taikhoan ON binhluan.iduser=taikhoan.id
    LEFT JOIN sanpham ON binhluan.idpro=sanpham.id
    WHERE sanpham.id=$idsp";
    $result = pdo_query($sql);
    return $result;
}
function loadall_binhluan($idpro)
{
    $sql = "SELECT binhluan.*, taikhoan.user AS user FROM binhluan
            INNER JOIN taikhoan ON binhluan.iduser = taikhoan.id
            WHERE 1";

    if ($idpro > 0) $sql .= " AND binhluan.idpro = '$idpro'";
    $sql .= " ORDER BY binhluan.id desc"; // Sắp xếp thứ tự từ thấp đến cao

    $listbl = pdo_query($sql);
    return $listbl;
}

function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "INSERT INTO binhluan (noidung, iduser, idpro, ngaybinhluan) VALUES ('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
    pdo_execute($sql);
}
function delete_binhluan($id)
{

    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}
?>

