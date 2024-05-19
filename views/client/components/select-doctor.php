<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chọn Bác Sĩ</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
            width: 100%;
        }

        .filter-item {
            cursor: pointer;
            border-bottom: #c3c3c3 solid 1px;
        }

        .filter-item:hover {
            background-color: #8fe5e8;
        }

        .end-toggle::after {
            content: "";
            border-left: 0.5em solid transparent;
            border-right: 0.5em solid transparent;
            border-top: 0.5em solid;
            position: relative;
            top: 0.5em;
            margin-left: 0.5em;
            float: right;
        }
        .no-search-results {
            display: block;
        }

    </style>
</head>
<body>
<div id="bts-ex-6" class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle end-toggle"
            style="width: 100%; background-color: #3fbbc0; color: #ffffff; border-color: #3fbbc0; text-align: left"
            type="button" id="dropdownMenuButtonDoctor"
            data-bs-toggle="dropdown" aria-expanded="false">
        Chọn Bác Sĩ (*)
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDoctor">
        <div class="live-filtering" data-clear="true" data-autocomplete="true" data-keys="true">
            <div class="list-to-filter" id="filter-doctor">
                <ul class="list-unstyled mb-0">
                    <?php
                    if (empty($listDoctorsBySpecialty)) {
                        echo '<div class="no-search-results p-2">
                        <div class="alert alert-warning" role="alert" style="margin-bottom: 0 !important;">
                            <i class="fa fa-warning margin-right-sm"></i>&nbsp;Không có bác sĩ
                            <strong></strong>
                        </div>
                      </div>';
                    } else {
                        foreach ($listDoctorsBySpecialty as $doctor) {
                            echo "<li class='filter-item doctor-item p-2' data-filter='" . htmlspecialchars($doctor['name']) . "' data-value='" . htmlspecialchars($doctor['employee_id']) . "'>" . htmlspecialchars($doctor['name']) . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.filter-item', function() {
            var selectedDoctor = $(this).data('filter'); // Lấy tên bác sĩ từ thuộc tính data-filter
            var dropdownMenuButtonDoctor = $('#dropdownMenuButtonDoctor');
            dropdownMenuButtonDoctor.text('Bác sĩ: ' + selectedDoctor); // Cập nhật nội dung của nút button
            dropdownMenuButtonDoctor.dropdown('toggle'); // Đóng dropdown
        });
    });
</script>
</body>
</html>