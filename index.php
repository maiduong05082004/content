<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "view/header.php";
include "global.php";
include "model/binhluan.php";
include "model/taikhoan.php";
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
  $act = $_GET['act'];
  switch ($act) {
    case "sanphamct":
      if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
        $sp = loadone_sanpham($_GET['idsp']);
        $sp_cungloai = loadsp_cungLoai($_GET['idsp'], $sp['iddm']);
        $binhluan = load_binhluan($_GET['idsp']);
      }
      include "view/chitietsanpham.php";
      break;
    case "sanpham":
      if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
        $kyw = $_POST['kyw'];
      } else {
        $kyw = "";
      }
      if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
        $iddm = $_GET['iddm'];
      } else {
        $iddm = 0;
      }
      $dssp = loadall_sanpham($kyw, $iddm);
      $tendm = load_ten_dm($iddm);
      include "view/sanpham.php";
      break;
    case "dangky":
      if (isset($_POST['dangky']) && ($_POST['dangky'])) {
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        insert_taikhoan($email, $user, $pass);
        $thongbao = "Đã đăng ký thành công .Vui lòng đăng nhập để thực hiện chức năng bình luận hoặc đặt hàng !";
      }
      include "view/taikhoan/dangky.php";
      break;
      case "dangnhap":
        if (isset($_POST['dangnhap'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            
            // Kiểm tra thông tin đăng nhập
            $checkuser = checkuser($user, $pass);
            if (is_array($checkuser)) {
                // Nếu đăng nhập thành công, lưu thông tin người dùng vào phiên làm việc
                $_SESSION['user'] = $checkuser;
                header('Location: index.php');
            } else {
                $thongbao = "Tài khoản hoặc mật khẩu không đúng!";
            }
        }
        include "view/home.php";
        break;
    case "edit_taikhoan":
      if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $id = $_POST['id'];
        update_taikhoan($id, $user, $pass, $email, $address, $tel);
        $_SESSION['user'] = checkuser($user, $pass);
        header('Location:index.php?act=edit_taikhoan');
      }
      include "view/taikhoan/edit_taikhoan.php";
      break;
    case "quenmk":
      if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
        $email = $_POST['email'];
        $checkemail = checkemail($email);
        if ($checkemail && is_array($checkemail)) {
            $thongbao = "Mật khẩu của bạn là " . $checkemail['pass'];
        } else {
            $thongbao = "Email này không tồn tại";
        }
    }
      include "view/taikhoan/quenmk.php";
      break;
    case "thoat":
      session_unset();
      header('location:index.php');
      break;
  }
} else {
  include "view/home.php";
}

include "view/footer.php";
