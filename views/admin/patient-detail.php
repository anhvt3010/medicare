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
    <title>Chi tiết bệnh nhân</title>
    <?php include 'import-link-tag.php' ?>
</head>
<body>
<div class="be-wrapper">
    <!--    Navbar-->
    <?php include 'navbar.php' ?>
    <!--    left sidebar-->
    <?php include 'sidebar.php' ?>
    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title" style="font-size: 25px">Chi tiết bệnh nhân</h2>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quán lý bệnh nhân</li>
                    <li class="breadcrumb-item active">Danh sách bệnh nhân</li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div>
        <div class="main-content container-fluid" style="margin-top: -30px ">
            <div class="row">
                <div class="col-12">
                    <div class="row card card-table pt-1 pb-3">
                        <div class="row p-3">
                            <div class="col">
                                <h4>
                                    <strong>Thông tin cá nhân</strong>
                                    <hr>
                                </h4>
                                <div class="mb-3 row">
                                    <div class="col-4">
                                        <label for="" class="form-label">Tên bệnh nhân</label>
                                        <input type="text" class="form-control" value="<?php echo $patient['name'] ?>"
                                               disabled>
                                    </div>
                                    <div class="col-4">
                                        <label for="" class="form-label">Giới tính</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $patient['name'] == 0 ? 'Nữ' : 'Nam' ?>" disabled>
                                    </div>
                                    <div class="col-4">
                                        <label for="" class="form-label">Ngày sinh</label>
                                        <input type="text" class="form-control" id="specialtyName"
                                               placeholder="Nhập tên chuyên khoa" value="<?php echo $patient['dob'] ?>"
                                               disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $patient['email'] ?? '' ?>" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $patient['phone'] ?? '' ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-12">
                                        <label for="" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $patient['address'] ?? '' ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-3">
                                        <label for="specialtyStatus" class="form-label" style="line-height: 50px"
                                        >Trạng thái tài khoản</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control"
                                               value="<?php echo $patient['status'] == 0 ? 'Mở' : 'Đóng' ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <h4>
                                    <strong>Lịch sử khám</strong>
                                    <hr>
                                </h4>
                                <div class="mb-3 row">
                                    <div class="col-12">
                                        <input type="text" class="form-control"
                                               value="<?php echo $patient['status'] == 0 ? 'Mở' : 'Đóng' ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <a id="backButton" class="btn btn-danger" href="http://localhost/Medicare/index.php?controller=patient&action=index">Quay lại danh sách</a>
                    <button id="editButton" class="btn btn-primary">Chỉnh sửa</button>
                </div>
            </div>
        </div>
    </div>
    <!--    pop-up sidebar-->
    <?php include 'pop-up-sidebar.php' ?>
</div>
<?php include 'import-script.php' ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        App.init();
        App.tableFilters();
    });
</script>
</body>
</html>