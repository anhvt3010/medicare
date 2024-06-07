<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link href="assets/img/logo.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php include "components/topbar.php" ?>
<?php include "components/header.php" ?>
<main class="container" style="margin-top: 150px!important; margin-bottom: 30px">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                             width="150">
                        <div class="mt-3">
                            <h4><?php echo $patient['name'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label for="" class="form-label">Họ và tên</label>
                                <input id="paName" type="text" class="form-control"
                                       value="<?php echo $patient['name'] ?>"
                                       disabled>
                                <span id="error-paName" style="color: red; margin-left: 10px"></span>
                            </div>
                            <div class="col-4">
                                <label for="paGender" class="form-label">Giới tính</label>
                                <select id="paGender" class="form-select mb-3" aria-label="Large select example"
                                        disabled>
                                    <option value="1" <?php echo $patient['gender'] == 0 ? '' : 'selected' ?> >Nam
                                    </option>
                                    <option value="0" <?php echo $patient['gender'] == 1 ? '' : 'selected' ?> >Nữ
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" id="paDob"
                                       placeholder="Nhập tên chuyên khoa" value="<?php echo $patient['dob'] ?>"
                                       disabled>
                                <span id="error-paDob" style="color: red; margin-left: 10px"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="paEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="paEmail"
                                   value="<?php echo $patient['email'] ?? '' ?>" disabled>
                            <span id="error-paEmail" style="color: red; margin-left: 10px"></span>
                        </div>
                        <div class="col-6">
                            <label for="paPhone" class="form-label">Số điện thoại</label>
                            <div type="text" class="form-control" style="background-color: var(--bs-secondary-bg)"
                            ><?php echo $patient['phone'] ?? '' ?></div>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <div class="col-12">
                            <label for="" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="paAddress"
                                   value="<?php echo $patient['address'] ?? '' ?>" disabled>
                            <span id="error-paAddress" style="color: red; margin-left: 10px"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-between">
                            <button id="enableUpdate" style="background-color:#3fbbc0 !important; color: white"
                                    class="btn">Chỉnh sửa
                            </button>
                            <button id="updatePatient"
                                    style="background-color:#3fbbc0 !important; color: white; display: none"
                                    class="btn">Cập nhật
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "components/footer.html" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editButton = document.getElementById('enableUpdate');
        var updateButton = document.getElementById('updatePatient');
        var genderSelect = document.getElementById('paGender');
        var inputs = document.querySelectorAll('.card-body input');

        var nameInput = document.getElementById('paName');
        var dobInput = document.getElementById('paDob');
        var emailInput = document.getElementById('paEmail');
        var addressInput = document.getElementById('paAddress');
        var genderInput = document.getElementById('paGender')

        updateButton.addEventListener('click', function () {
            var valid = true;

            // Kiểm tra tên
            if (nameInput.value.trim() === '' || nameInput.value.length > 50) {
                $('#error-paName').text('Tên không được để trống và không vượt quá 50 kí tự');
                nameInput.style.borderColor = 'red';
                valid = false;
            } else {
                $('#error-paName').text('');
                nameInput.style.borderColor = '';
            }

            // Kiểm tra ngày sinh
            var dob = new Date(dobInput.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            if (dobInput.value.trim() === '' || age < 16 || age > 90) {
                $('#error-paDob').text('Ngày sinh không hợp lệ');
                dobInput.style.borderColor = 'red';
                valid = false;
            } else {
                $('#error-paDob').text('');
                dobInput.style.borderColor = '';
            }

            // Kiểm tra email
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailInput.value.trim() === '' || !emailRegex.test(emailInput.value)) {
                $('#error-paEmail').text('Email không hợp lệ');
                emailInput.style.borderColor = 'red';
                valid = false;
            } else {
                $('#error-paEmail').text('');
                emailInput.style.borderColor = '';
            }

            // Kiểm tra địa chỉ
            if (addressInput.value.trim() === '' || addressInput.value.length > 255) {
                $('#error-paAddress').text('Địa chỉ không được để trống và không vượt quá 255 kí tự');
                addressInput.style.borderColor = 'red';
                valid = false;
            } else {
                $('#error-paAddress').text('');
                addressInput.style.borderColor = '';
            }

            // Nếu tất cả thông tin hợp lệ, có thể gửi dữ liệu
            if (valid) {
                $.ajax({
                    url: 'http://localhost/Medicare/index.php?controller=patient&action=update_information',
                    type: 'POST',
                    data: {
                        name: nameInput.value,
                        gender: parseInt(genderInput.value, 10),
                        dob: dobInput.value,
                        email: emailInput.value,
                        address: addressInput.value,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response === true) {
                            window.location.reload()
                        } else {
                            showToast('Cập nhật thất bại', '#a7284e', 3000);
                        }
                    },
                    error: function () {
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            }
        });

        editButton.addEventListener('click', function () {
            updateButton.style.display = 'block';

            inputs.forEach(function (input) {
                input.disabled = false;
            });

            genderSelect.disabled = false;
        });
    });
</script>

</body>
</html>