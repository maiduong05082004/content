<?php
include "header.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "adddm":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case "listdm":
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case "xoadm":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case "suadm":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";

            break;

            // end danh mục

            // start sản phẩm
        case 'addsp':
            //kiểm tra xem người dùng có nhấn nút add hay không
            if (isset($_POST["themmoi"]) && ($_POST["themmoi"])) {
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

                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = "thêm sản phẩm thành công";
            }
            $listdanhmuc = loadall_danhmuc();

            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST["listok"]) && ($_POST["listok"])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);

            include "sanpham/list.php";
            break;


        case "xoasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $kyw = ''; // Truyền giá trị mặc định cho $kyw
            $iddm = 0; // Truyền giá trị mặc định cho $iddm
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case "suasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
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

                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "Cập nhật thành công";
            }
            $kyw = ''; // Truyền giá trị mặc định cho $kyw
            $iddm = 0; // Truyền giá trị mặc định cho $iddm
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);

            include "sanpham/list.php";

            break;
            //tai khoan start
        case "dskh":
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'addkh':
            if (isset($_POST['btn_addkh'])) {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                insert_taikhoan_kh_admin($user, $pass, $email, $address, $tel, $role);
                $thongbao = "Thêm thành công";
            }
            include "taikhoan/add.php";
            break;
        case 'xoatk':
            $id = $_GET['id'];
            delete_taikhoan_admin($id);
            $listtaikhoan = loadall_taikhoan();
            $thongbao = "Xóa thành công";
            include "taikhoan/list.php";
            break;
        case 'suatk':
            if (isset($_POST['id'])) {
                $id = $_GET['id'];
                $tk = check_tk_admin($id);
            }
            include "taikhoan/update.php";
            break;
        case 'editkh':
            if (isset($_POST['btn_updatekh'])) {
                $id = $_POST['id'];
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                update_taikhoan_admin($id, $user, $pass, $email, $address, $tel, $role);
                $thongbao = "Sửa thành công";
            }
            $listtaikhoan = loadall_taikhoan();
            require 'taikhoan/list.php';
            break;
            //end tài khoản
            //star bình luậnu
        case "dsbl":
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_binhluan($_GET['id']);
            }

            $idpro = '';

            $listbinhluan = loadall_binhluan($idpro);
            include "binhluan/list.php";
            break;

        case 'thongke':

            $dsthongke = load_thongke();
            include "thongke/list.php";

            break;



        case 'bieudo':
            $dsthongke = load_thongke();
            include "thongke/bieudo.php";

            break;

        case 'bieudosp':
            $kyw = ''; // Truyền giá trị mặc định cho $kyw
            $iddm = 0; // Truyền giá trị mặc định cho $iddm
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/bieudo.php";

            break;
    }
} else {
    include "home.php";
}
include "footer.php";
