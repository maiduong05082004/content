<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "view/header.php";
include "global.php";
$spnew=loadall_sanpham_home();
$dsdm=loadall_danhmuc();
$dstop10=loadall_sanpham_top10();
if (isset($_GET['act'])&&($_GET['act'] !="")){
  $act=$_GET['act'];
  switch($act){
    case "sanphamct":
      include "view/chitietsanpham.php";
    break;
    case "sanpham":
        if (isset($_GET['iddm'])&&($_GET['iddm']>0)){
          $iddm=$_GET['iddm'];
          $dssp=loadall_sanpham("",$iddm);
          $tendm=load_ten_dm($iddm);
          include "view/sanpham.php";
        }else{
          include "view/home.php";
        }
    break;
  }
}else{
  include "view/home.php";
}

include "view/footer.php";
?>