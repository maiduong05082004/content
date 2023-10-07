<?php
function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql = "INSERT INTO sanpham (name,price,img,mota,iddm) VALUES ('$tensp', '$giasp', '$hinh', '$mota', '$iddm')";

    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}
function loadall_sanpham($kyw,$iddm){

    $sql = "SELECT * FROM sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.= " order by id desc";
    
    $listsanpham = pdo_query($sql);
    return $listsanpham;
    
    }
function loadone_sanpham($id){
    $sql="select *from sanpham where id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_sanpham($id,$tenloai){
    $sql="update sanpham set name ='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}
?>
