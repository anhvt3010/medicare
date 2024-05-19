<?php
require '../models/UserModel.php';

// Khởi tạo UserModel
$userModel = new UserModel();

// Lấy dữ liệu từ POST
$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';
$rePassword = $_POST['re-password'] ?? '';

// Mảng lưu trữ lỗi
$errors = [];

// Validate dữ liệu
if (empty($name)) {
    $errors['name'] = 'Họ và tên không được để trống.';
}
if (empty($phone)) {
    $errors['phone'] = 'Số điện thoại không được để trống.';
}
if (empty($password)) {
    $errors['password'] = 'Mật khẩu không được để trống.';
}
if ($password !== $rePassword) {
    $errors['re-password'] = 'Mật khẩu và xác nhận mật khẩu không khớp.';
}

// Kiểm tra trùng số điện thoại
if (!$errors && $userModel->checkPhoneExists($phone)) {
    $errors['phone'] = 'Số điện thoại đã được sử dụng.';
}

// Hiển thị lỗi hoặc tiến hành đăng ký
if (!empty($errors)) {
    // Hiển thị lỗi
    foreach ($errors as $key => $error) {
        echo "<div class='error' style='color: red;'>$error</div>";
    }
} else {
    // Đăng ký người dùng
    $userModel->register($name, $phone, $password);
    echo "<div hidden='hidden'>Đăng ký thành công!</div>";
}