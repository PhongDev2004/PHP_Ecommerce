<?php
if (isset($_POST['editAccount']) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $kh_id = $_POST['kh_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Update user
    update_user($kh_id, $username, $password, $email, $phone, $address);
    $_SESSION['acount'] = loadone_taikhoan($kh_id);
    header("Location: index.php?act=myAccount");
    exit();
}
