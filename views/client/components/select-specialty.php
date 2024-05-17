<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
            width: 100%;
        }

        .filter-item-specialty-specialty {
            cursor: pointer;
            border-bottom: #c3c3c3 solid 1px;
        }

        .filter-item-specialty-specialty small {
            font-size: 13px;
            display: block;
            margin-left: 5px;
            font-style:italic;
            color: #666;
        }

        .filter-item-specialty-specialty:hover {
            background-color: #8fe5e8;
        }

        .no-search-results {
            display: block;
        }
        .input-group .btn-outline-secondary {
            border: none;
            background: transparent;
            color: #495057; /* Màu của icon, có thể điều chỉnh tùy ý */
        }
        .input-group .btn-outline-secondary:hover {
            background: #e9ecef; /* Màu nền khi hover, có thể điều chỉnh tùy ý */
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
<div id="bts-ex-5" class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle end-toggle"
            style="width: 100%; background-color: #3fbbc0; color: #ffffff; border-color: #3fbbc0; text-align: left"
            type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
        Chọn chuyên khoa khám (*)
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <div class="live-filtering" data-clear="true" data-autocomplete="true" data-keys="true">
            <label class="sr-only" for="input-bts-ex-5">Tìm kiếm chuyên khoa</label>
            <div class="search-box p-2">
                <div class="input-group">
                                                <span class="input-group-text" id="search-icon5">
                                                    <span class="fa fa-search"></span>
                                                </span>
                    <input type="text" placeholder="Tìm kiếm chuyên khoa" id="input-bts-ex-5"
                           class="form-control live-search" aria-describedby="search-icon5"
                           tabindex="1" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"/>
                    <button class="btn btn-outline-secondary clear-button" type="button"
                            id="clear-search" style="display: none;">
                        <span class="fa fa-times"></span>
                        <span class="sr-only">Clear filter</span>
                    </button>
                </div>
            </div>
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
                <div class="no-search-results p-2 d-none">
                    <div class="alert alert-warning" role="alert" style="margin-bottom: 0 !important;"><i
                            class="fa fa-warning margin-right-sm"></i>&nbsp;Không tìm thấy chuyên khoa
                        <strong>'<span></span>'</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="bts-ex-5" value="">
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // select specialty
    $(document).ready(function() {
        $('.filter-item-specialty-specialty').on('click', function() {
            var selectedSpecialty = $(this).data('filter'); // Lấy tên chuyên khoa từ thuộc tính data-filter
            $('#dropdownMenuButton').text('Chuyên khoa: ' + selectedSpecialty); // Cập nhật nội dung của nút button
            $('#dropdownMenuButton').dropdown('toggle'); // Tùy chọn: đóng dropdown sau khi chọn
        });

        $('#input-bts-ex-5').on('input', function() {
            var searchSpecialty = $(this).val().toLowerCase();
            var hasVisibleItems = false;

            $('.filter-item-specialty-specialty').each(function() {
                var itemText = $(this).data('filter').toLowerCase();
                if (itemText.includes(searchSpecialty)) {
                    $(this).show();
                    hasVisibleItems = true;
                } else {
                    $(this).hide();
                }
            });

            if (!hasVisibleItems) {
                $('.no-search-results').removeClass('d-none');
                $('.no-search-results strong span').text(searchSpecialty);
            } else {
                $('.no-search-results').addClass('d-none');
            }
        });

        $('#input-bts-ex-5').on('input', function() {
            var inputValue = $(this).val();
            if (inputValue.length > 0) {
                $('#clear-search').show();
            } else {
                $('#clear-search').hide();
            }
        });

        $('#clear-search').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('#input-bts-ex-5').val('').trigger('input');
        });
    });
</script>
</html>