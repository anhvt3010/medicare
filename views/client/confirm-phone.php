<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt mật khẩu mới</title>
    <link href="assets/img/logo.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Medicare/views/admin/assets/css/app.css" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .error {
            border: 2px solid red;
        }

        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<?php include "components/topbar.php" ?>
<?php include "components/header.php" ?>
<div id="loading-spinner"
     style="text-align: center;line-height:700px;position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1050; display: flex; align-items: center; justify-content: center;">
    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<main class="container p-0" style="margin-top: 150px!important; margin-bottom: 150px;width: 40%">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác minh số điện thoại</h1>
        </div>
        <div class="modal-body">
            <form id="verifyPhoneForm">
                <div class="mb-3">
                    <label for="phone" class="col-form-label">Vui lòng nhập số điện thoại liên kết với tài khoản của
                        bạn:</label>
                    <input type="tel" class="form-control" id="phoneNumber">
                </div>
                <div class="mb-3">
                    <label for="op" class="col-form-label">Nhập mã xác minh gồm 6 số:</label>
                    <input type="number" class="form-control" id="otp">
                </div>

            </form>
        </div>
        <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button id="sendCode" type="button" class="btn btn-primary">
                Gửi mã xác minh
            </button>
        </div>
    </div>
</main>
<?php include "components/footer.html" ?>

<script src="http://localhost/Medicare/views/admin/assets/lib\jquery\jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="http://localhost/Medicare/assets/js/toast/use-bootstrap-toaster.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#loading-spinner').hide();
        var sendCode = document.getElementById('sendCode');
        sendCode.disabled = true
        var phoneNumber = document.getElementById('phoneNumber');

        phoneNumber.addEventListener('change', function (){
            // Xóa các lỗi trước đó
            $('.error').removeClass('error');
            $('.error-message').remove();
            if (!phoneNumber.value) {
                phoneNumber.classList.add('error');
                $(phoneNumber).after('<div class="error-message">Trường này không được để trống.</div>');
                sendCode.disabled = true
            } else if (!/^\d{10}$/.test(phoneNumber.value)) {
                phoneNumber.classList.add('error');
                $(phoneNumber).after('<div class="error-message">Số điện thoại không hợp lệ.</div>');
                sendCode.disabled = true
            } else {
                sendCode.disabled = false
            }
        });

        sendCode.addEventListener('click', function () {
            $('#loading-spinner').show();
            var OTP = 123456;
            var otpInput = document.getElementById('otp');
            var otpreq = parseInt(otpInput?.value, 10);

            if (otpreq === OTP) {
                // document.getElementById('loadingConfirm').style.display = 'none';
                success_toast(
                    "Xác minh OTP thành công",
                    `http://localhost/Medicare/index.php?controller=auth&action=forgot_password&phone=${encodeURIComponent(phoneNumber.value)}`
                )
                otpInput.style.borderColor = '#24fa24';

            } else {
                // document.getElementById('loadingConfirm').style.display = 'none';
                otpInput.value = ''; // Xóa nội dung của ô nhập
                otpInput.style.borderColor = 'red'; // Thêm border màu đỏ
                otpInput.focus(); // Đặt focus lại vào ô nhập để người dùng có thể nhập lại
                failed_toast('Mã OTP không đúng')
                $('#loading-spinner').hide();
            }
        });
    });

</script>
<script>
    function success_toast(message, redirectUrl) {
        toast({
            classes: `text-bg-success border-0`,
            body: `
          <div class="d-flex w-100" data-bs-theme="dark">
            <div class="flex-grow-1">
              ${message}
            </div>
            <button type="button" class="btn-close flex-shrink-0" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>`,
            autohide: true,
            delay: 1000
        });

        // Đợi DOM cập nhật
        setTimeout(() => {
            // Lấy phần tử toast mới nhất
            var toastElement = document.querySelector('.toast.show');
            if (toastElement) {
                var bsToast = new bootstrap.Toast(toastElement); // Khởi tạo lại đối tượng Toast nếu cần
                toastElement.addEventListener('hidden.bs.toast', function () {
                    window.location.href = redirectUrl; // Sử dụng URL được truyền vào
                });
            }
        }, 100); // Đợi 100ms để đảm bảo toast đã được thêm vào DOM
    }

    function failed_toast() {
        toast({
            classes: `text-bg-danger border-0`,
            body: `
              <div class="d-flex w-100" data-bs-theme="dark">
                <div class="flex-grow-1">
                  Đã có lỗi xảy ra !
                </div>
                <button type="button" class="btn-close flex-shrink-0" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>`,
        })
    }
</script>
</body>
</html>