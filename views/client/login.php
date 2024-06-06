<?php
//session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['user_phone'])) {
    header("Location: http://localhost/Medicio/index.php?controller=home&action=home");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Đăng nhập</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">
    <!-- Favicons -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        .toast {
            visibility: hidden; /* Ẩn toast */
            min-width: 250px; /* Đặt chiều rộng tối thiểu */
            margin-left: -125px; /* Đẩy toast sang trái một nửa chiều rộng của nó */
            background-color: #ff0000; /* Màu nền */
            color: white; /* Màu chữ */
            text-align: center; /* Căn giữa chữ */
            border-radius: 10px; /* Bo góc */
            padding: 16px; /* Đệm */
            position: fixed; /* Đặt vị trí cố định */
            z-index: 1; /* Đảm bảo toast nằm trên các thành phần khác */
            left: 50%; /* Đặt ở giữa màn hình theo chiều ngang */
            bottom: 30px; /* Khoảng cách từ dưới cùng */
            font-size: 17px; /* Cỡ chữ */
        }

        .toast.show {
            visibility: visible; /* Hiển thị toast */
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }


        .error-message {
            color: red;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .invalid-input {
            border-color: red;
        }
    </style>
</head>
<body style="background-color: #3fbbc0; overflow-y: hidden ">
<!-- Login 9 - Bootstrap Brain Component -->
<section class=" py-3 py-md-5 py-xl-8" style="margin-top: 50px">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 col-xl-7">
                <div class="d-flex justify-content-center" style="background-color: #3fbbc0; color: white">
                    <div class="col-12 col-xl-9">
                        <a href="http://localhost/Medicio/index.php?controller=home&action=home#hero"
                           class="logo me-auto">
                            <img class="img-fluid rounded mb-4" loading="lazy" src="assets/img/Medicare.png" width="345"
                                 alt="BootstrapBrain Logo">
                        </a>
                        <hr class="border-primary-subtle mb-4">
                        <h2 class="h1 mb-4">Chào mừng đến với Medicare.</h2>
                        <p class="lead mb-5">Chúng tôi rất vui được chăm sóc sức khỏe của quý vị. Tại đây, chúng tôi cam
                            kết cung cấp dịch vụ y tế chất lượng, chu đáo và chuyên nghiệp nhất để mang lại sự an tâm và
                            hài lòng cho quý khách.</p>
                        <div class="text-endx">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                 class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                                <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-5">
                <div class="card border-0 rounded-4">
                    <div class="card-body p-3 p-md-4 p-xl-4">
                        <div class="row mb-1">
                            <div class="col-12">
                                <div>
                                    <h3>Đăng Nhập</h3>
                                    <p>Bạn không có tài khoản? <a
                                                href="http://localhost/Medicio/index.php?controller=register&action=register">Đăng
                                            kí</a></p>
                                </div>
                            </div>
                        </div>
                        <form method="post" onsubmit="return false;">
                            <div class="row gy-3 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-2">
                                        <input type="tel" class="form-control" name="phone" id="phone"
                                               placeholder="name@example.com" required>
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="password" id="password"
                                               value="" placeholder="Password" required>
                                        <label for="password" class="form-label">Mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span id="login-false"></span>
                                </div>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" name="remember_me"
                                               id="remember_me">
                                        <label class="form-check-label text-secondary" for="remember_me">
                                            Giữ tôi luôn đăng nhập
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="d-grid">
                                        <button id="loginButton"
                                                class="btn btn-lg" style="background-color: #3fbbc0; color: white"
                                                type="submit">Đăng nhập ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-3">
                                    <a href="#!">Quên mật khẩu</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="http://localhost/Medicio/index.php?controller=auth&action=loginAdmin"
                                   style="color: #4182ff">Đăng nhập quản trị
                                </a>
                                <i style="color: red" class="fa-solid fa-right-to-bracket"></i>
                            </div>
                        </div>
                        <div id="toast" class="toast">Thông báo ở đây!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var inputs = document.querySelectorAll('.form-control');

        inputs.forEach(function (input) {
            input.addEventListener('input', function () {
                // Xóa thông báo lỗi nếu có
                var errorMessage = input.parentElement.querySelector('.error-message');
                if (errorMessage) {
                    errorMessage.remove();
                }
                // Xóa viền đỏ
                input.classList.remove('invalid-input');
            });
        });

        document.getElementById('loginButton').addEventListener('click', validateAndSubmit);
    });

    function validateAndSubmit() {
        var isValid = true;
        var formData = new FormData();
        var inputs = document.querySelectorAll('.form-control');

        // Xóa các thông báo lỗi trước đó
        document.querySelectorAll('.error-message').forEach(function (message) {
            message.remove();
        });

        inputs.forEach(function (input) {
            var error = null;
            if (!input.value) {
                error = 'Trường này không được để trống';
            } else if (input.name === 'phone' && !/^\d{10}$/.test(input.value)) {
                error = 'Số điện thoại phải là 10 chữ số';
            }

            if (error) {
                var errorMessage = document.createElement('div');
                errorMessage.classList.add('error-message');
                errorMessage.textContent = error;
                input.classList.add('invalid-input');
                input.parentElement.appendChild(errorMessage);
                isValid = false;
            } else {
                formData.append(input.name, input.value);
                input.classList.remove('invalid-input');
            }
        });

        if (isValid) {
            $.ajax({
                url: 'http://localhost/Medicio/index.php?controller=auth&action=processLoginClient',
                type: 'POST',
                data: formData,
                contentType: false, // Không set contentType
                processData: false, // Không xử lý dữ liệu
                success: function(response) {
                    console.log(response);
                    if(response['success'] === true) {
                        showToast('Đăng nhập thành công', '#28a745', 8000);
                        console.log('Thông tin session:', response['sessionData']);
                        window.location.href = 'http://localhost/Medicio/index.php?controller=home&action=home';
                    } else {
                        showToast(response['message'], '#a7284e', 3000);
                    }
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                }
            });
        }
    }

    function showToast(message, color, time, callback) {
        var toast = document.getElementById("toast");
        toast.textContent = message; // Cập nhật thông điệp
        toast.style.backgroundColor = color; // Cập nhật màu nền
        toast.className = "toast show";
        setTimeout(function () {
            toast.className = toast.className.replace("show", "");
            if (callback) callback(); // Gọi callback sau khi Toast ẩn
        }, time);
    }

    function redirectToHome() {
        window.location.href = 'http://localhost/Medicio/index.php?controller=home&action=home'; // Điều hướng đến trang chủ sau khi đăng nhập thành công
    }
</script>
</body>
</html>