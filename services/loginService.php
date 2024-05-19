<?php
require '../models/AuthModel.php';

// Khởi tạo UserModel
$authModel = new AuthModel();
// loginService.php
session_start();
$phone = $_POST['phone'];
$password = $_POST['password'];

$errors = [];

if ($authModel->login($phone, $password)) {
    $_SESSION['user_phone'] = $phone;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Số điện thoại hoặc mật khẩu không chính xác']);
}

?>