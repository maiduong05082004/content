<?php
    include "header.php";
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "adddm":
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="thêm thành công";
                }
                include "danhmuc/add.php";
                break;
                case "listdm":
                    $listdanhmuc=loadall_danhmuc();
                    include "danhmuc/list.php";
                break;  
                case "xoadm":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_danhmuc($id);
                    }
                    $sql="select*from danhmuc order by id desc";
                    $listdanhmuc=pdo_query($sql);
                    include "danhmuc/list.php";
                break;
                case "suadm":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $dm=loadone_danhmuc($_GET['id']);
                    }
                    include "danhmuc/update.php";
                break;
                case 'updatedm':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $tenloai=$_POST['tenloai'];
                        $id=$_POST['id'];
                        update_danhmuc($id,$tenloai);
                        $thongbao="Cập nhật thành công";
                    }
                    $sql="select*from danhmuc order by id desc";
                    $listdanhmuc=pdo_query($sql);
                    include "danhmuc/list.php";
                    
                break;

                    // end danh mục

                    // start sản phẩm
                        case 'addsp':
                            //kiểm tra xem người dùng có nhấn nút add hay không
                            if(isset($_POST["themmoi"]) && ($_POST["themmoi"])){
                                $iddm = $_POST['iddm'];
                                $tensp = $_POST['tensp'];
                                    $giasp = $_POST['giasp'];
                                    $mota = $_POST['mota'];
                                    $hinh = $_FILES['hinh']['name'];
                                    $target_dir = "../upload/";
                                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        
                                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                      } else {
                                        // echo "Sorry, there was an error uploading your file.";
                                      }
                        
                                    insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                                    $thongbao="thêm sản phẩm thành công";
                                }
                                $listdanhmuc = loadall_danhmuc();

                            include "sanpham/add.php";
                            break;
                            case 'listsp':
                                if(isset($_POST["listok"]) && ($_POST["listok"])){
                                    $kyw=$_POST['kyw'];
                                    $iddm=$_POST['iddm'];
                                }else{
                                    $kyw='';
                                    $iddm=0;
                                }
                                $listdanhmuc = loadall_danhmuc();
                               $listsanpham = loadall_sanpham($kyw,$iddm);
                            
                            include "sanpham/list.php";
                            break;
                            
                             
                        case "xoasp":
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_sanpham($id);
                            }
                            $listsanpham=pdo_query($sql);
                            include "sanpham/list.php";
                        break;
                        case "suasp":
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $sanpham=loadone_sanpham($_GET['id']);
                            }
                            include "sanpham/update.php";
                        break;
                        case 'updatesp':
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $tenloai=$_POST['tenloai'];
                                $id=$_POST['id'];
                                update_sanpham($id,$tenloai);
                                $thongbao="Cập nhật thành công";
                            }
                            $sql="select*from sanpham order by id desc";
                            $listsanpham=pdo_query($sql);
                            include "sanpham/list.php";
                            
                        break;
            case "bieudo":
                include "bieudo.php";
            break;     
        }
    }else{
        include "home.php";
    }
    include "footer.php";
?>
