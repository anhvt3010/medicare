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

        .filter-item small {
            font-size: 13px;
            display: block;
            margin-left: 5px;
            font-style: italic;
            color: #666;
        }

        .filter-item:hover {
            background-color: #8fe5e8;
        }

        .no-search-results {
            display: block;
        }

        .input-group .btn-outline-secondary {
            border: none;
            background: transparent;
            color: #495057;
        }

        .input-group .btn-outline-secondary:hover {
            background: #e9ecef;
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
            <label class="sr-only" for="input-bts-ex-6">Tìm kiếm bác sĩ</label>
            <div class="search-box p-2">
                <div class="input-group">
                    <span class="input-group-text" id="search-icon6">
                        <span class="fa fa-search"></span>
                    </span>
                    <input type="text" placeholder="Tìm kiếm bác sĩ" id="input-bts-ex-6"
                           class="form-control live-search" aria-describedby="search-icon6"
                           tabindex="1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"/>
                    <button class="btn btn-outline-secondary clear-button" type="button"
                            id="clear-search-doctor" style="display: none;">
                        <span class="fa fa-times"></span>
                        <span class="sr-only">Clear filter</span>
                    </button>
                </div>
            </div>
            <div class="list-to-filter">
                <ul class="list-unstyled mb-0">
                    <?php
                    if (!empty($listDoctorsBySpecialty)) {
                        foreach ($listDoctorsBySpecialty as $doctor) {
                            echo "<li class='filter-item doctor-item p-2' data-filter='" . htmlspecialchars($doctor['name']) . "' data-value='" . htmlspecialchars($doctor['employee_id']) . "'>" . htmlspecialchars($doctor['name']) . "</li>";
                        }
                    }
                    ?>
                </ul>
                <div class="no-search-results p-2 d-none">
                    <div class="alert alert-warning" role="alert" style="margin-bottom: 0 !important;">
                        <i class="fa fa-warning margin-right-sm"></i>&nbsp;Không tìm thấy bác sĩ
                        <strong>'<span></span>'</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="bts-ex-6" value="">
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.filter-item').on('click', function() {
            var selectedDoctor = $(this).data('filter'); // Lấy tên bác sĩ từ thuộc tính data-filter
            $('#dropdownMenuButtonDoctor').text('Bác sĩ: ' + selectedDoctor); // Cập nhật nội dung của nút button
            $('#dropdownMenuButtonDoctor').dropdown('toggle'); // Tùy chọn: đóng dropdown sau khi chọn
        });

        $('#input-bts-ex-6').on('input', function() {
            var searchDoctor = $(this).val().toLowerCase();
            var hasVisibleItems = false;

            $('.filter-item').each(function() {
                var itemText = $(this).data('filter').toLowerCase();
                if (itemText.includes(searchDoctor)) {
                    $(this).show();
                    hasVisibleItems = true;
                } else {
                    $(this).hide();
                }
            });

            if (!hasVisibleItems) {
                $('.no-search-results').removeClass('d-none');
                $('.no-search-results strong span').text(searchDoctor);
            } else {
                $('.no-search-results').addClass('d-none');
            }
        });

        $('#input-bts-ex-6').on('input', function() {
            var inputValue = $(this).val();
            if (inputValue.length > 0) {
                $('#clear-search-doctor').show();
            } else {
                $('#clear-search-doctor').hide();
            }
        });

        $('#clear-search-doctor').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('#input-bts-ex-6').val('').trigger('input');
        });
    });
</script>
</html>