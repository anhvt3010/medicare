<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/img/logo.png" rel="icon">
    <title>Chi tiết bác sĩ</title>
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
            <h2 class="page-head-title" style="font-size: 25px">Chi tiết bác sĩ</h2>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quán lý bác sĩ</li>
                    <li class="breadcrumb-item active">Danh sách bác sĩ</li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div>
        <div class="main-content container-fluid" style="margin-top: -50px !important;">
            <div class=" rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" width="150px"
                                 src="<?php echo $doctor['avt'] ?>">
                            <span class="font-weight-bold mt-2"><?php echo $doctor['name'] ?></span>
                            <span class="text-black-50"><?php echo $doctor['email'] ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Thông tin cá nhân</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-7">
                                    <label class="labels">Họ và tên</label>
                                    <input type="text" class="form-control" placeholder="Nhập họ và tên"
                                           value="<?php echo $doctor['name'] ?>" disabled>
                                </div>
                                <div class="col-md-5">
                                    <label class="labels">Tên tài khoản</label>
                                    <input type="text" class="form-control" placeholder="surname"
                                           value="<?php echo $doctor['username'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="emGender" class="form-label">Giới tính</label>
                                    <select id="emGender" class="form-select mb-3" aria-label="Large select example" style="height: 50px" disabled>
                                        <option value="1" <?php echo ($doctor['gender'] == 1) ? 'selected' : ''; ?>>Nam</option>
                                        <option value="0" <?php echo ($doctor['gender'] == 0) ? 'selected' : ''; ?>>Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Ngày sinh</label>
                                    <input type="date" class="form-control" value="<?php echo $doctor['dob'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Email</label>
                                    <input type="text" class="form-control" placeholder="Nhập email" value="<?php echo $doctor['email'] ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Số điện thoại</label>
                                    <input type="text" class="form-control" value="<?php echo $doctor['phone'] ?>" disabled placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo $doctor['address'] ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Trạng thái</label>
                                    <select id="emStatus" class="form-select mb-3" aria-label="Large select example" style="height: 50px" disabled>
                                        <option value="0" <?php echo ($doctor['status'] == 0) ? 'selected' : ''; ?>>Đóng</option>
                                        <option value="1" <?php echo ($doctor['status'] == 1) ? 'selected' : ''; ?>>Mở</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thông tin làm việc</h4>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Chức vụ</label>
                            <select id="emPosition" class="form-select" style="height: 50px" disabled>
                                <option hidden="hidden" value="0">Chọn chức vụ</option>
                                <?php
                                foreach ($listPositions as $position) {
                                    echo "<option value='" . htmlspecialchars($position['position_id']) . "'>" . htmlspecialchars($position['name']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label class="labels">Chuyên khoa</label>
                            <select id="emSpecialty" class="form-select" style="height: 50px" disabled>
                                <option hidden="hidden" value="0">Chọn chuyên khoa</option>
                                <?php
                                foreach ($listSpecialties as $specialty) {
                                    echo "<option value='" . htmlspecialchars($specialty['specialty_id']) . "'>" . htmlspecialchars($specialty['name']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between p-3">
                    <a id="backButton" class="btn btn-danger" href="http://localhost/Medicio/index.php?controller=doctor&action=index">Quay lại danh sách</a>
                    <button id="editButtonDoctor" class="btn btn-primary">Chỉnh sửa</button>
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

    });
    window.onload = function() {
        // Thiết lập giá trị cho select chức vụ
        var positionSelect = document.getElementById('emPosition');
        positionSelect.value = '<?php echo $doctor['position_id']; ?>';

        // Thiết lập giá trị cho select chuyên khoa
        var specialtySelect = document.getElementById('emSpecialty');
        specialtySelect.value = '<?php echo $doctor['specialty_id']; ?>';
    };
</script>
</body>
</html>