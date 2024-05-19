<?php
session_start();  // Khởi động session
echo '<pre>';
print_r($_SESSION);  // Hiển thị tất cả dữ liệu trong session
echo '</pre>';