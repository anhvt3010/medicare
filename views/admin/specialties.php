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
    <link rel="stylesheet" type="text/css"
          href="http://localhost/Medicio/views/admin/assets/lib\perfect-scrollbar\css\perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css"
          href="http://localhost/Medicio/views/admin/assets/lib\material-design-icons\css\material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css"
          href="http://localhost/Medicio/views/admin/assets/lib\select2\css\select2.min.css">
    <link rel="stylesheet" type="text/css"
          href="http://localhost/Medicio/views/admin/assets/lib\bootstrap-slider\css\bootstrap-slider.min.css">
    <link rel="stylesheet" type="text/css"
          href="http://localhost/Medicio/views/admin/assets/lib\datetimepicker\css\bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="http://localhost/Medicio/views/admin/assets/css\app.css" type="text/css">
    <!--    icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="be-wrapper">
    <!--    Navbar-->
    <?php include 'navbar.php' ?>
    <!--    left sidebar-->
    <?php include 'sidebar.php' ?>
    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title" style="font-size: 25px">Danh sách chuyên khoa</h2>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quán lý chuyên khoa</li>
                    <li class="breadcrumb-item active">Danh sách chuyên khoa</li>
                </ol>
            </nav>
        </div>
        <div class="main-content container-fluid" style="margin-top: -30px ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="row table-filters-container">
                            <div class="col-12 col-lg-12 col-xl-6">

                            </div>
                            <div class="col-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-lg-9 table-filters">
                                        <div class="row">
                                            <div class="col-12">
                                                <input id="searchInput" placeholder="Nhập tên chuyên khoa..."
                                                       class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 table-filters">
                                        <div class="m-0">
                                            <button id="button" class="btn btn-success form-control">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="noSwipe">
                                <table class="table table-striped table-hover be-table-responsive" id="table1">
                                    <thead>
                                    <tr>
                                        <th style="width:2%;">STT</th>
                                        <th style="width:20%;">Tên chuyên khoa</th>
                                        <th style="width:60%;">Mô tả</th>
                                        <th style="width:15%;">Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tableBody" style="font-size: 15px">
                                    </tbody>
                                </table>
                                <div class="row be-datatable-footer">
                                    <div class="col-sm-9 dataTables_paginate" id="pagination"
                                         style="margin-bottom: 0px!important;"></div>
                                    <div class="col-sm-3 dataTables_info" id="sub-pagination"
                                         style="line-height: 48px"> 1 đến 5 trong số 100 </div>
                                </div>
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
<script src="http://localhost/Medicio/views/admin/assets/lib\jquery\jquery.min.js" type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\perfect-scrollbar\js\perfect-scrollbar.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\bootstrap\dist\js\bootstrap.bundle.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/js\app.js" type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\jquery-ui\jquery-ui.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\select2\js\select2.min.js" type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\select2\js\select2.full.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\bootstrap-slider\bootstrap-slider.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datetimepicker\js\bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net\js\jquery.dataTables.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-bs4\js\dataTables.bootstrap4.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-buttons\js\dataTables.buttons.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-buttons\js\buttons.flash.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\jszip\jszip.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\pdfmake\pdfmake.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\pdfmake\vfs_fonts.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-buttons\js\buttons.colVis.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-buttons\js\buttons.print.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-buttons\js\buttons.html5.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-buttons-bs4\js\buttons.bootstrap4.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-responsive\js\dataTables.responsive.min.js"
        type="text/javascript"></script>
<script src="http://localhost/Medicio/views/admin/assets/lib\datatables\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"
        type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // App.init();
        // App.tableFilters();

        const listSpecialties = JSON.parse('<?php echo json_encode($listSpecialties); ?>');
        const itemsPerPage = 6;
        let currentPage = 1;

        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', searchSpecialty);


        function searchSpecialty() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const filteredDoctors = listSpecialties.filter(doctor => doctor.name.toLowerCase().includes(input));
            currentPage = 1;
            setupPagination(filteredDoctors, paginationElement, itemsPerPage);
            renderSpecialties(currentPage, filteredDoctors); 
        }

        function renderSpecialties(page, items = listSpecialties) {
            const start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            const paginatedItems = items.slice(start, end);
            const tableBody = document.getElementById('tableBody');

            tableBody.innerHTML = '';
            paginatedItems.forEach((specialty, index) => {
                const rowNumber = start + index + 1; // Tính số thứ tự cho mỗi hàng
                const row = `<tr>
                        <td>${rowNumber}</td>
                        <td>
                            <span>${specialty.name}</span>
                        </td>
                        <td>
                            <span style='font-size: 15px; color: black'>${specialty.description}</span>
                        </td>
                        <td class='milestone'>
                            <div>${specialty.status == 1 ? 'Đang hoạt động' : 'Đã đóng'}</div>
                        </td>
                        <td class='text-right'>
                            <div class='btn-group btn-hspace'>
                                <button class='btn btn-secondary dropdown-toggle' type='button'
                                        data-toggle='dropdown'>Hành động
                                    <span class='icon-dropdown mdi mdi-chevron-down'></span>
                                </button>
                                <div class='dropdown-menu' role='menu'>
                                    <button type='button' class='dropdown-item'>Xem chi tiết</button>
                                    <button type='button' class='dropdown-item'>Chỉnh sửa</button>
                                    <button type='button' class='dropdown-item'>Xóa</button>
                                </div>
                            </div>
                        </td>
                    </tr>`;
                tableBody.innerHTML += row;
            });

            const paginationInfo = document.getElementById('sub-pagination');
            if(currentPage === Math.ceil(listSpecialties.length / itemsPerPage)) {
                end = listSpecialties.length
            }
            paginationInfo.innerHTML = `${start + 1} - ${end} trong số ${items.length} chuyên khoa`;
        }

        function setupPagination(items, wrapper, rowsPerPage) {
            wrapper.innerHTML = ""; // Xóa nội dung hiện tại của wrapper
            let pageCount = Math.ceil(items.length / rowsPerPage);
            let ul = document.createElement('ul');
            ul.className = 'pagination';

            // Tạo và thêm nút "Previous"
            let prevLi = document.createElement('li');
            prevLi.className = 'page-item';
            if (currentPage === 1) prevLi.classList.add('disabled');
            let prevLink = document.createElement('a');
            prevLink.className = 'page-link';
            prevLink.href = '#';
            prevLink.innerText = 'Trang trước';
            prevLink.addEventListener('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    changePage(currentPage - 1);
                }
            });
            prevLi.appendChild(prevLink);
            ul.appendChild(prevLi);

            // Tạo các nút số trang
            for (let i = 1; i <= pageCount; i++) {
                let li = paginationButton(i, items);
                ul.appendChild(li);
            }

            // Tạo và thêm nút "Next"
            let nextLi = document.createElement('li');
            nextLi.className = 'page-item';
            if (currentPage === pageCount) nextLi.classList.add('disabled');
            let nextLink = document.createElement('a');
            nextLink.className = 'page-link';
            nextLink.href = '#';
            nextLink.innerText = 'Trang tiếp';
            nextLink.addEventListener('click', function (e) {
                e.preventDefault();
                if (currentPage < pageCount) {
                    changePage(currentPage + 1);
                }
            });
            nextLi.appendChild(nextLink);
            ul.appendChild(nextLi);

            wrapper.appendChild(ul);
        }

        function paginationButton(page, items) {
            let li = document.createElement('li');
            li.className = 'page-item';
            if (currentPage === page) li.classList.add('active');

            let link = document.createElement('a');
            link.className = 'page-link';
            link.href = '#';
            link.innerText = page;
            link.addEventListener('click', function (e) {
                e.preventDefault();
                currentPage = page;
                renderSpecialties(currentPage);

                document.querySelectorAll('.pagination .page-item').forEach(item => {
                    item.classList.remove('active');
                });
                li.classList.add('active');
            });

            li.appendChild(link);
            return li;
        }

        function changePage(page) {
            currentPage = page;
            renderSpecialties(currentPage);
            setupPagination(listSpecialties, document.getElementById('pagination'), itemsPerPage);
        }

        const paginationElement = document.getElementById('pagination');
        setupPagination(listSpecialties, paginationElement, itemsPerPage);
        renderSpecialties(currentPage);

        App.init();
        App.tableFilters();
    });
</script>
</body>
</html>