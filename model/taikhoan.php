<?php
function insert_taikhoan($email,$user,$pass){
    $sql = "INSERT INTO taikhoan (email,user,pass) VALUES ('$email', '$user', '$pass')";

    pdo_execute($sql);
}
function checkuser($user,$pass){
    $sql="select *from taikhoan where user='".$user."' AND  pass='".$pass."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function checkemail($email){
    $sql="select *from taikhoan where email='".$email."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id, $user, $pass, $email, $address, $tel) {
    $sql = "UPDATE taikhoan 
            SET user = '$user', pass = '$pass', email = '$email', address = '$address', tel = '$tel' 
            WHERE id = '$id'";
    pdo_execute($sql);
}
function loadall_taikhoan(){
    $sql="select*from taikhoan order by id desc ";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}
function insert_taikhoan_kh_admin($user,$pass,$email,$address,$tel,$role=2){
    $sql = "INSERT INTO `taikhoan` (`user`,`pass`,`email`,`address`,`tel`,`role`) VALUES ('$user','$pass','$email','$address','$tel','$role')";
    pdo_execute($sql);
}
function delete_taikhoan_admin($id){
    $sql = "DELETE FROM taikhoan WHERE `taikhoan`.`id` = $id";
    pdo_execute($sql);
}
function check_tk_admin($id){
    $sql = "SELECT * FROM taikhoan WHERE id=$id";
    return pdo_query_one($sql);

}
function update_taikhoan_admin($id, $user, $pass, $email, $address, $tel,$role) {
    $sql = "UPDATE taikhoan 
            SET user = '$user', pass = '$pass', email = '$email', address = '$address', tel = '$tel' , role = '$role'
            WHERE id = '$id'";
    pdo_execute($sql);
}
?>