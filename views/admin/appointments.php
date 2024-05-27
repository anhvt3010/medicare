<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/img/logo.png" rel="icon">
    <title>Danh sách lịch khám</title>
    <?php include 'import-link-tag.php' ?>
    <style>
        #btn-action:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }
        .col-2-5 {
            flex: 0 0 20.83333%;
            max-width: 20.83333%;
        }
    </style>
</head>
<body>
<div class="be-wrapper">
    <!--    Navbar-->
    <?php include 'navbar.php' ?>
    <!--    left sidebar-->
    <?php include 'sidebar.php' ?>
    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title">Danh sách lịch khám</h2>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quán lý đặt lịch</li>
                    <li class="breadcrumb-item active">Danh sách lịch khám</li>
                </ol>
            </nav>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="row table-filters-container">
                            <div class="col-2-5 table-filters pb-0 pb-xl-4">
                                <div class="filter-container">
                                    <label class="control-label table-filter-title">Lọc chuyên khoa:</label>
                                    <form>
                                        <select class="select2" name="specialty">
                                            <option value="All" selected>Tất cả chuyên khoa</option>
                                            <?php
                                            foreach ($listSpecialties as $specialty) {
                                                echo "<option value='" . htmlspecialchars($specialty['specialty_id']) . "'>" . htmlspecialchars($specialty['name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </form>
                                </div>
                            </div>

                            <div class="col-2-5 table-filters pb-0 pb-xl-4">
                                <div class="filter-container">
                                    <label class="control-label table-filter-title">Lọc bác sĩ:</label>
                                    <form>
                                        <select class="select2" name="doctor">
                                            <option value="All" selected>Tất cả bác sĩ</option>
                                            <?php
                                            foreach ($listDoctors as $doctor) {
                                                echo "<option value='" . htmlspecialchars($doctor['id']) . "'>" . htmlspecialchars($doctor['name']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </form>
                                </div>
                            </div>

                            <div class="col-2-5 table-filters pb-0 pb-xl-4">
                                <span class="table-filter-title">Bộ lọc ngày</span>
                                <div class="filter-container">
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <input  placeholder="Từ ngày"
                                                        class="form-control datetimepicker" id="dateSince" data-min-view="2" data-date-format="yyyy-mm-dd">
                                            </div>
                                            <div class="col-6">
                                                <input  placeholder="Đến ngày"
                                                        class="form-control datetimepicker" id="dateTo" data-min-view="2" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-2-5 table-filters pb-xl-4">
                                <span class="table-filter-title">Trạng thái</span>
                                <div class="filter-container">
                                    <form>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-controls-stacked">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="toDo" type="checkbox">
                                                        <label class="custom-control-label" for="toDo">Chờ xác nhận</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="inReview" type="checkbox">
                                                        <label class="custom-control-label" for="inReview">Đã xác nhận</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-controls-stacked">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="inProgress" type="checkbox">
                                                        <label class="custom-control-label" for="inProgress">Hoàn thành</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="done" type="checkbox">
                                                        <label class="custom-control-label" for="done">Đã hủy</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-2 table-filters pb-xl-4">
                                <div class="m-0 pt-8">
                                    <button id="button" class="btn btn-success form-control">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="noSwipe">
                                <table class="table table-striped table-hover be-table-responsive" id="table1">
                                    <thead>
                                    <tr>
                                        <th style="width:2%;">STT</th>
                                        <th style="width:13%;">Bác sĩ</th>
                                        <th style="width:15%;">Bệnh nhân</th>
                                        <th style="width:12%;">Thông tin liên hệ</th>
                                        <th style="width:10%;">Chuyên khoa khám</th>
                                        <th style="width:10%;">Thời gian hẹn</th>
                                        <th style="width:10%;" class="text-center">Trạng thái</th>
                                        <th style="width:1%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 1;
                                    foreach ($listAppointments as $appointment): ?>
                                        <tr class="<?php
                                        switch ($appointment['status']) {
                                            case 0:
                                                echo 'warning in-progress';
                                                break;
                                            case 1:
                                                echo 'primary to-do';
                                                break;
                                            case 2:
                                                echo 'success done';
                                                break;
                                            case 3:
                                                echo 'danger in-review';
                                                break;
                                            default:
                                                echo '';
                                        }
                                        ?>">
                                            <td style="text-align: center">
                                                <?php echo $counter; ?>
                                            </td>
                                            <td class="user-avatar cell-detail user-info">
                                                <img class="mt-0 mt-md-2 mt-lg-0" src="<?php echo htmlspecialchars($appointment['doctor_avt']); ?>" alt="Avatar">
                                                <span><?php echo htmlspecialchars($appointment['doctor_name']); ?></span>
    <!--                                            <span class="cell-detail-description">Bác sĩ chuyên khoa 1</span>-->
                                            </td>
                                            <td class="cell-detail milestone" data-project="Bootstrap">
                                                <span class="completed"><?php echo htmlspecialchars($appointment['patient_dob']); ?></span>
                                                <span class="cell-detail-description"style="font-size: 13px; color: black"><?php echo htmlspecialchars($appointment['patient_name']); ?></span>
                                                <span><?php echo htmlspecialchars($appointment['patient_gender'] == 1 ? 'Nam' : 'Nũ'); ?></span>
                                            </td>
                                            <td class="milestone">
                                                <div><?php echo htmlspecialchars($appointment['patient_phone']); ?></div>
                                                <span class="version"><?php echo htmlspecialchars($appointment['patient_email']); ?></span>

                                            </td>
                                            <td class="cell-detail">
                                                <span><?php echo htmlspecialchars($appointment['specialty_name']); ?></span>
    <!--                                            <span class="cell-detail-description">63e8ec3</span>-->
                                            </td>
                                            <td class="cell-detail">
                                                <span class="date"><?php echo date('H:i', strtotime($appointment['time_slot'])); ?></span>
                                                <span class="cell-detail-description">
                                                    <?php
                                                    //$appointment['date_slot'] là số ngày kể từ ngày 1/1/1970
                                                    $timestamp = $appointment['date_slot'] * 86400; // Chuyển đổi số ngày thành giây
                                                    $date = date('Y-m-d', $timestamp); // Định dạng lại timestamp thành ngày tháng
                                                    echo htmlspecialchars($date);
                                                    ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $statusColors = [
                                                    0 => ['#fbbc05', 'Chờ xác nhận'],
                                                    1 => ['#4285f4', 'Đã xác nhận'],
                                                    2 => ['#34a853', 'Đã hoàn thành'],
                                                    3 => ['#ea4335', 'Đã hủy'],
                                                    'default' => ['#d3d3d3', 'Không xác định']
                                                ];

                                                // Lấy màu và tên trạng thái dựa trên $appointment['status']
                                                $statusInfo = $statusColors[$appointment['status']] ?? $statusColors['default'];
                                                ?>
                                                <div class="btn btn-secondary"
                                                     style="width: 150px; color: whitesmoke; font-weight: normal;
                                                             background-color: <?php echo $statusInfo[0]; ?>;">
                                                    <?php echo $statusInfo[1]; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button id="btn-action"
                                                            style="border: none; background-color: transparent; "
                                                            class=" dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                            <path d="M3 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm0-5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm0 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z"/>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item">Chi tiết</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    $counter++;
                                    endforeach; ?>
                                    </tbody>
                                </table>
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
<?php include 'import-script.php' ?>
<script type="text/javascript">
    $(document).ready(function(){
        //-initialize the javascript
        App.init();
        App.tableFilters();
    });
</script>
<script>
    document.getElementById('button').addEventListener('click', function() {
    var specialty = document.querySelector('.select2[name="specialty"]').value;
    var doctor = document.querySelector('.select2[name="doctor"]').value;
    var dateSince = document.getElementById('dateSince').value;
    var dateTo = document.getElementById('dateTo').value;
    var toDo = document.getElementById('toDo').checked;
    var inReview = document.getElementById('inReview').checked;
    var inProgress = document.getElementById('inProgress').checked;
    var done = document.getElementById('done').checked;

    var status = [];
    if (toDo) status.push('Chờ xác nhận');
    if (inReview) status.push('Đã xác nhận');
    if (inProgress) status.push('Hoàn thành');
    if (done) status.push('Đã hủy');

    alert('Chuyên khoa: ' + specialty + '\n' +
    'Bác sĩ: ' + doctor + '\n' +
    'Từ ngày: ' + dateSince + '\n' +
    'Đến ngày: ' + dateTo + '\n' +
    'Trạng thái: ' + status.join(', '));
    });
</script>
</body>
</html>