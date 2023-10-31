<?php
//home_sanpham
function loadall_sanpham_home(){

    $sql = 'SELECT * FROM sanpham where 1 order by id desc limit 0,9';
    
    $listsanpham = pdo_query($sql);
    return $listsanpham;
    
    
    }
    
    //hiển thị top 10 sản phẩm có lượt xem cao nhất
    function loadall_sanpham_top10(){
    //thừa
    $sql = "SELECT * FROM sanpham where 1 order by luotxem desc limit 0,10";
    
    $listsanpham = pdo_query($sql);
    return $listsanpham;
    
    
    }
//admin_sanpham
function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql = "INSERT INTO sanpham (name,price,img,mota,iddm) VALUES ('$tensp', '$giasp', '$hinh', '$mota', '$iddm')";

    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT sanpham.*, COUNT(binhluan.id) as soBinhLuan 
            FROM sanpham
            LEFT JOIN binhluan ON binhluan.idpro = sanpham.id
            WHERE 1";

    if ($kyw != "") {
        $sql .= " AND sanpham.name LIKE '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND sanpham.iddm = '" . $iddm . "'";
    }

    $sql .= " GROUP BY sanpham.id ORDER BY sanpham.id DESC";
    $listsanpham = pdo_query($sql);

    return $listsanpham;
}
function loadone_sanpham($id){
    $sql="select *from sanpham where id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
    if($hinh!="")
        $sql="update sanpham set iddm='".$iddm."',name ='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
    else
        $sql="update sanpham set iddm='".$iddm."',name ='".$tensp."',price='".$giasp."',mota ='".$mota."' where id=".$id;
    pdo_execute($sql);
}
function loadsp_cungLoai($id,$iddm){
    $sql="select*from sanpham where iddm =$iddm and id <> $id";
    $result=pdo_query($sql);
    return $result;
}


?>
