<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chọn Chuyên Khoa Khám</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        /*.dropdown-menu {*/
        /*    max-height: 300px;*/
        /*    overflow-y: auto;*/
        /*    width: 100%;*/
        /*}*/

        .filter-item-specialty-specialty {
            cursor: pointer;
            border-bottom: #c3c3c3 solid 1px;
        }

        .filter-item-specialty-specialty small {
            font-size: 13px;
            display: block;
            margin-left: 5px;
            font-style: italic;
            color: #666;
        }

        .filter-item-specialty-specialty:hover {
            background-color: #8fe5e8;
        }

        /*.end-toggle::after {*/
        /*    content: "";*/
        /*    border-left: 0.5em solid transparent;*/
        /*    border-right: 0.5em solid transparent;*/
        /*    border-top: 0.5em solid;*/
        /*    position: relative;*/
        /*    top: 0.5em;*/
        /*    margin-left: 0.5em;*/
        /*    float: right;*/
        /*}*/
        .no-search-results {
            display: block;
        }

    </style>
</head>
<body>
<div id="bts-ex-5" class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle end-toggle"
            style="width: 100%; background-color: #3fbbc0; color: #ffffff; border-color: #3fbbc0; text-align: left"
            type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
        Chọn chuyên khoa khám (*)
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <div class="live-filtering" data-clear="true" data-autocomplete="true" data-keys="true">
            <div class="list-to-filter">
                <ul class="list-unstyled mb-0">
                    <?php
                    if (!empty($listSpecialties)) {
                        foreach ($listSpecialties as $specialty) {
                            echo "<li class='filter-item-specialty-specialty items p-2' data-filter='" . htmlspecialchars($specialty['name']) . "' data-value='" . htmlspecialchars($specialty['specialty_id']) . "'>" . htmlspecialchars($specialty['name']) . "<br><small class='text-muted'>" . htmlspecialchars($specialty['description']) . "</small></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" name="bts-ex-5" value="">
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.filter-item-specialty-specialty').on('click', function () {
            var selectedSpecialty = $(this).data('filter'); // Lấy tên chuyên khoa từ thuộc tính data-filter
            var specialtyId = $(this).data('value'); // Lấy ID của chuyên khoa
            localStorage.setItem('specialtyId', specialtyId); // lưu id chuyên khoa vào localStorage
            $('#dropdownMenuButton').text('Chuyên khoa: ' + selectedSpecialty); // Cập nhật nội dung của nút button
            $('#dropdownMenuButton').dropdown('toggle');
        });
    });
</script>
<script>
    function loadDoctorsBySpecialty(specialtyId) {
        if (!specialtyId) {
            console.error("specialtyId is required");
            return;
        }
        $.ajax({
            url: 'http://localhost/Medicio/index.php',
            type: 'GET',
            data: {
                controller: 'home',
                action: 'getDoctor',
                specialtyId: specialtyId
            },
            success: function (response) {
                updateDoctorList(response); // Cập nhật danh sách bác sĩ từ dữ liệu JSON
                console.log(specialtyId)
                console.log(response)
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        });
    }

    function updateDoctorList(doctors) {
        if (!Array.isArray(doctors)) {
            console.error("Invalid response, array expected", doctors);
            return;
        }
        var listHtml = '';
        $.each(doctors, function (index, doctor) {
            listHtml += "<li class='filter-item doctor-item p-2' data-filter='" + doctor.name + "' data-value='" + doctor.employee_id + "'>" + doctor.name + "</li>";
        });
        $('#filter-doctor ul').html(listHtml);
    }

    $(document).ready(function () {
        $('.filter-item-specialty-specialty').on('click', function () {
            var specialtyId = localStorage.getItem('specialtyId');
            if (specialtyId) {
                loadDoctorsBySpecialty(specialtyId);
            }
        })
    });
</script>
</body>
</html>