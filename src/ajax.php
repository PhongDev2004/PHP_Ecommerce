<?php
include './app/model/connectdb.php';
include './app/model/khachhang.php';

if (isset($_POST['forget-password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $kh_id = filter_var($_POST['kh_id'], FILTER_SANITIZE_NUMBER_INT);
    error_log("Received data - Email: $email, kh_id: $kh_id");

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = array("status" => "error", "message" => "Invalid email format");
        echo json_encode($response);
        exit();
    }

    // Ensure kh_id is a positive integer
    if (!ctype_digit($kh_id) || $kh_id <= 0) {
        $response = array("status" => "error", "message" => "Invalid kh_id");
        echo json_encode($response);
        exit();
    }

    $checkEmail = check_email_forgetPass($email, $kh_id);
    if ($checkEmail !== false) {
        $response = array("status" => "success", "password" => $checkEmail['kh_pass']);
    } else {
        $response = array("status" => "error", "message" => "Email not found");
    }

    echo json_encode($response);
    exit();
}
