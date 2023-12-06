<?php

     function addkh($pass,$name,$mail,$phone,$diachi){
        $sql = "insert into khachhang(kh_name,kh_pass,kh_mail,kh_tel,kh_address,vaitro_id) values('$name','$pass','$mail','$phone','$diachi',2)";
        pdo_execute($sql);
    }
    function check_user($mail,$pass){
        $sql= "select * from khachhang where kh_mail = '$mail' and kh_pass = '$pass'";
        $result_user = pdo_query_one($sql);
        return $result_user;
    }

function check_email($mail){
    $sql= "select * from khachhang where kh_mail = '$mail'";
    $result_user = pdo_query_one($sql);
    return $result_user;
}

function vaitro(){
    $sql = "select * from vaitro";
    $result = pdo_queryall($sql);
    return $result;
}
// câu truy vấn xoá mềm


function delete_taikhoan($kh_id){
    $sql = "delete from khachhang where kh_id = '$kh_id'";
    pdo_execute($sql);
}

// câu truy vấn xoá mềm
function soft_deletekh($kh_id){
    $sql = "UPDATE `khachhang` set trangthai = 1 WHERE `khachhang`.`kh_id` = $kh_id";
    pdo_execute($sql);
}
function loadall_taikhoans(){
    $sql = "select * from khachhang where trangthai = 1";
    $result = pdo_queryall($sql);
    return $result;
}
function khoiphuc_kh($kh_id){
    $sql = "UPDATE `khachhang` set trangthai = 0 WHERE `khachhang`.`kh_id` = $kh_id";
    pdo_execute($sql);
}
function countkh() {
    $sql = "SELECT COUNT(*) as countkh FROM khachhang";
    $result = pdo_query_one($sql);
     return $result;
}
function loadall_taikhoan(){
    $sql = "select * from khachhang where trangthai = 0";
    $result = pdo_queryall($sql);
    return $result;
}
function loadone_taikhoan($kh_id)
{
    $sql = "select * from khachhang where kh_id = '$kh_id'";
    $result = pdo_query_one($sql);
    return $result;
}
function update_taikhoan($kh_id, $kh_name, $kh_pass, $kh_mail, $kh_tel, $kh_address, $vaitro_id)
{
    $sql = "update khachhang set kh_name = '$kh_name', kh_pass = '$kh_pass', kh_mail = '$kh_mail', kh_tel = '$kh_tel', kh_address = '$kh_address', vaitro_id = '$vaitro_id' where kh_id = '$kh_id'";
    pdo_execute($sql);
}
function update_user($kh_id, $kh_name, $kh_pass, $kh_mail, $kh_tel, $kh_address)
{
    $sql = "update khachhang set kh_name = '$kh_name', kh_pass = '$kh_pass', kh_mail = '$kh_mail', kh_tel = '$kh_tel', kh_address = '$kh_address' where kh_id = '$kh_id'";
    pdo_execute($sql);
}
function check_email_forgetPass($email, $kh_id)
{
    $sql = "SELECT * FROM khachhang WHERE kh_mail = '$email' AND kh_id = $kh_id";
    $checkEmail = pdo_query_one($sql);

    // Check if the email matches the kh_mail for the given kh_id
    if ($checkEmail !== false && $checkEmail['kh_mail'] === $email) {
        return $checkEmail;
    } else {
        return false;
    }
}

function check_email_exists($email)
{
    $sql = "SELECT COUNT(*) FROM khachhang WHERE kh_mail = '$email'";
    $count = pdo_query_one($sql);

    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

?>