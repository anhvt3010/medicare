<?php
session_start(); // Khởi động session
if (!isset($_SESSION['admin_name'])) {
    header('Location: http://localhost/Medicare/index.php?controller=auth&action=loginAdmin');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/img/logo.png" rel="icon">
    <title>Chi tiết chuyên khoa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php include 'import-link-tag.php'?>
</head>
<body>
<div class="be-wrapper">
    <!--    Navbar-->
    <?php include 'navbar.php' ?>
    <!--    left sidebar-->
    <?php include 'sidebar.php' ?>
    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title" style="font-size: 25px">Chi tiết chuyên khoa</h2>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quán lý chuyên khoa</li>
                    <li class="breadcrumb-item active">Danh sách chuyên khoa</li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div>
        <div class="main-content container-fluid" style="margin-top: -50px !important;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="main-content container-fluid" style="margin-top: 30px ">
                            <div class="mb-3">
                                <label for="specialtyName" class="form-label">Tên chuyên khoa</label>
                                <input type="text" class="form-control" id="specialtyName"
                                       placeholder="Nhập tên chuyên khoa" value="<?php echo $specialty['name']?>" disabled>
                                <span style="margin-left: 10px; color: red" id="errorSpecialtyNameUpdate"></span>

                            </div>
                            <div class="mb-3">
                                <label for="specialtyDescription" class="form-label">Mô tả chuyên khoa</label>
                                <textarea class="form-control" id="specialtyDescription" rows="5"
                                          placeholder="Mô tả chuyên khoa"  disabled><?php echo $specialty['description'] ?></textarea>
                                <span style="margin-left: 10px; color: red" id="errorSpecialtyDescriptionUpdate"></span>
                            </div>
                            <div class="mb-3">
                                <label for="specialtyStatus" class="form-label">Trạng thái</label>
                                <select id="specialtyStatus" class="form-select mb-3" aria-label="Large select example" disabled>
                                    <option value="0" <?php echo $specialty['status'] == '0' ? 'selected' : ''; ?>>Đóng</option>
                                    <option value="1" <?php echo $specialty['status'] == '1' ? 'selected' : ''; ?>>Mở</option>
                                </select>
                            </div>
                            <hr>
                            <div class="mt-3 d-flex justify-content-between">
                                <a id="backButton" class="btn btn-danger" href="http://localhost/Medicare/index.php?controller=specialty&action=index">Quay lại danh sách</a>
                                <button id="editButton" class="btn btn-primary">Chỉnh sửa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    pop-up sidebar-->
    <?php include 'pop-up-sidebar.php' ?>
</div>

<?php include 'import-script.php'?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        App.init();
        const editButton = document.getElementById('editButton');
        const backButton = document.getElementById('backButton');
        const specialtyName = document.getElementById('specialtyName');
        const specialtyDescription = document.getElementById('specialtyDescription');
        const specialtyStatus = document.getElementById('specialtyStatus');
        const errorSpecialtyName = document.getElementById('errorSpecialtyNameUpdate');
        const errorSpecialtyDescription = document.getElementById('errorSpecialtyDescriptionUpdate');

        editButton.addEventListener('click', function() {
            if (editButton.textContent === "Chỉnh sửa") {
                backButton.textContent = "Hủy và quay lại danh sách";
                // Bỏ disable
                specialtyName.disabled = false;
                specialtyDescription.disabled = false;
                specialtyStatus.disabled = false;

                // Thay đổi tên nút
                editButton.textContent = "Lưu lại";
            } else {
                // Validate trước khi gửi dữ liệu
                let valid = true;
                errorSpecialtyName.textContent = '';
                errorSpecialtyDescription.textContent = '';

                if (!specialtyName.value || specialtyName.value.length > 150) {
                    errorSpecialtyName.textContent = 'Tên chuyên khoa không được để trống và không quá 150 kí tự.';
                    valid = false;
                }

                if (!specialtyDescription.value || specialtyDescription.value.length > 500) {
                    errorSpecialtyDescription.textContent = 'Mô tả không được để trống và không quá 500 kí tự.';
                    valid = false;
                }

                if (valid) {
                    // Log ra các giá trị
                    console.log("Tên chuyên khoa:", specialtyName.value);
                    console.log("Mô tả chuyên khoa:", specialtyDescription.value);
                    console.log("Trạng thái:", specialtyStatus.value);

                    $.ajax({
                        url: 'http://localhost/Medicare/index.php?controller=specialty&action=update',
                        type: 'POST', // Sử dụng phương thức POST cho việc cập nhật
                        data: {
                            specialtyId: <?php echo $specialty['specialty_id'] ?>,
                            specialtyName: specialtyName.value,
                            specialtyDescription: specialtyDescription.value,
                            specialtyStatus: specialtyStatus.value
                        },
                        success: function (response) {
                            alert('Cập nhật thành công');
                            window.location.href = 'http://localhost/Medicare/index.php?controller=specialty&action=index';
                        },
                        error: function () {
                            alert('Có lỗi xảy ra khi lấy dữ liệu');
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>