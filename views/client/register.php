<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Đăng Kí</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">
    <!-- Favicons -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">

    <style>
        .toast {
            visibility: hidden; /* Ẩn toast */
            min-width: 250px; /* Đặt chiều rộng tối thiểu */
            margin-left: -125px; /* Đẩy toast sang trái một nửa chiều rộng của nó */
            background-color: #173777; /* Màu nền */
            color: white; /* Màu chữ */
            text-align: center; /* Căn giữa chữ */
            border-radius: 2px; /* Bo góc */
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
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
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
<body style="background-color: #3fbbc0; color: white">
<!-- Login 9 - Bootstrap Brain Component -->
<section class=" py-3 py-md-5 py-xl-8" style=" margin-top: 40px">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 col-xl-7">
                <div class="d-flex justify-content-center">
                    <div class="col-12 col-xl-9">
                        <img class="img-fluid rounded mb-4" loading="lazy" src="assets/img/Medicare.png" width="345" alt="BootstrapBrain Logo">
                        <hr class="border-primary-subtle mb-4">
                        <h2 class="h1 mb-4">Chào mừng đến với Medicare.</h2>
                        <p class="lead mb-5">Chúng tôi rất vui được chăm sóc sức khỏe của quý vị. Tại đây, chúng tôi cam kết cung cấp dịch vụ y tế chất lượng, chu đáo và chuyên nghiệp nhất để mang lại sự an tâm và hài lòng cho quý khách.</p>
                        <div class="text-endx">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                                <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-5">
                <div class="card border-0 rounded-4">
                    <div class="card-body p-3 p-md-4 p-xl-4 mb-2">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div>
                                    <h3>Đăng Kí</h3>
                                    <p>Bạn đã có tài khoản? <a href="http://localhost/Medicio/index.php?controller=auth&action=login">Đăng nhập</a></p>
                                </div>
                            </div>
                        </div>
                        <form method="post"  onsubmit="return false;">
                            <div class="row gy-3 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input size="" type="text" class="form-control" name="name" id="name" placeholder="name@example.com" required>
                                        <label for="name" class="form-label">Họ và tên</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="xxxx xxx xxx" required>
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Mật khẩu" required>
                                        <label for="password" class="form-label">Mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="re-password" id="re-password" value="" placeholder="Xác nhận mật khẩu" required>
                                        <label for="password" class="form-label">Xác nhận mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="d-grid">
                                        <button class="btn btn-lg" style="background-color: #3fbbc0; color: white" type="submit" id="registerButton">Đăng kí</button>
                                        <div id="response"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="toast" class="toast">Thông báo ở đây!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function validateAndSubmit() {
        var isValid = true;
        var formData = new FormData();
        var inputs = document.querySelectorAll('.form-control');

        // Xóa các thông báo lỗi trước đó
        document.querySelectorAll('.error-message').forEach(function(message) {
            message.remove();
        });

        inputs.forEach(function(input) {
            var error = null;
            if (!input.value) {
                error = 'Trường này không được để trống';
            } else if (input.name === 'phone' && !/^\d{10}$/.test(input.value)) {
                error = 'Số điện thoại phải là 10 chữ số';
            } else if (input.name === 're-password' && input.value !== document.getElementById('password').value) {
                error = 'Mật khẩu xác nhận không khớp';
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
            fetch('services/registerService.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('response').innerHTML = data;
                    if (data.includes('Đăng ký thành công!')) {
                        showToast('Đăng ký thành công!', redirectToLogin);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    }

    document.getElementById('registerButton').addEventListener('click', validateAndSubmit);
</script>
<script>
    function showToast(message, callback) {
        var toast = document.getElementById("toast");
        toast.textContent = message; // Cập nhật thông điệp
        toast.className = "toast show";
        setTimeout(function() {
            toast.className = toast.className.replace("show", "");
            callback(); // Gọi callback sau khi Toast ẩn
        }, 2000); // Toast hiển thị trong 3 giây
    }
    function redirectToLogin() {
        window.location.href = "http://localhost/Medicio/index.php?controller=login&action=login";
    }
</script>
</body>
</html>