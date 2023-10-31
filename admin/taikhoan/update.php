<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tk = check_tk_admin($id);
    extract($tk); 
}
?>
<h3 class="alert alert-success">SỬA THÔNG TIN KHÁCH HÀNG</h3>
<form action="index.php?act=editkh" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label fw-bold">TÊN ĐĂNG NHẬP</label>
            <input type="text" name="username" class="form-control" value="<?= $user ?>">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">MẬT KHẨU</label>
            <input type="password" name="password" class="form-control" value="<?= $pass ?>">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">EMAIL</label>
            <input type="email" name="email" class="form-control" value="<?= $email ?>">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label fw-bold">ĐỊA CHỈ</label>
            <input type="text" name="address" class="form-control" value="<?= $address ?>">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">SỐ ĐIỆN THOẠI</label>
            <input class="form-control" name="tel" type="text" value="<?= $tel ?>">
        </div>
        <div class="mb-3 col" style="padding-bottom: 42px;">
            <label class="form-label fw-bold">ROLE</label>
            <select class="form-select" name="role" style="width: 174px;">
                <option value="1" <?php if ($role == 1) echo 'selected'; ?>>1</option>
                <option value="2" <?php if ($role == 2) echo 'selected'; ?>>2</option>
            </select>

        </div>
    </div>
    <div class="form-group mt-3">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button name="btn_updatekh" class="btn btn btn-outline-dark">Sửa thông tin</button>
        <button type="reset" class="btn btn btn-outline-dark">Nhập lại</button>
        <a href="index.php?act=dskh"><input class="mr20" type="button" value="DANH SÁCH"></a>
    </div>
</form>