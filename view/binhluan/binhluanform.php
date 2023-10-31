<?php
session_start();
require "../../model/pdo.php";
require "../../model/binhluan.php";
//note
$idpro = $_REQUEST['idpro'];

if (isset($_POST['guibinhluan'])) {
    $iduser = $_SESSION['user']['id'];
    $noidung = $_POST['noidung'];
    $idpro = $_POST['idpro'];
    $ngaybinhluan = date('Y-m-d H:i:s');
    insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
    //note
    $serverRef = $_SERVER['HTTP_REFERER'];
    header("Location: $serverRef");
}

$binhluan = loadall_binhluan($idpro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="box_title">BÌNH LUẬN</div>
    <div class="box_content2  product_portfolio binhluan ">
        <table>
            <?php
            $ngaybinhluan = date('Y-m-d'); // Định dạng ngày và giờ
            foreach ($binhluan as $value) {
                echo '<tr>';
                echo '<td>' . $value['noidung'] . '</td>';
                echo '<td>' . $value['user'] . '</td>';
                echo '<td>' . date('d/m/Y', strtotime($value['ngaybinhluan'])) . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <div class="box_search">
        <?php
        //1.nếu dùng cookier thì có được không 
        if (isset($_SESSION['user'])) {
        ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input type="text" name="noidung" style="width: 800px;">
                <input type="submit" name="guibinhluan" value="Gửi bình luận" style="margin: 25px 0 0 26px;width: 118px;">
            </form>
        <?php
        } else {
        ?>
            <h3 style="color: #ff0000;padding: 10px; text-align: center; margin-bottom: 10px; ">
                Đăng nhập để bình luận về sản phẩm này
            </h3>
        <?php
        }
        ?>
    </div>
</body>

</html>