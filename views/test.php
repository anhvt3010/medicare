<?php
$currentPage = $_GET['page'] ?? 1;
$counter = ($currentPage - 1) * 10 + 1;
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
        </td>
        <td class="cell-detail milestone" data-project="Bootstrap">
            <span class="completed"></span>
            <span class="cell-detail-description"style="font-size: 13px; color: black"><?php echo htmlspecialchars($appointment['patient_name']); ?></span>
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

                                                // Đặt múi giờ sang "Asia/Ho_Chi_Minh" để đảm bảo chuyển đổi ngày chính xác theo giờ Việt Nam
                                                date_default_timezone_set('Asia/Ho_Chi_Minh');

                                                $date = date('d-m-Y', $timestamp); // Định dạng lại timestamp thành ngày tháng
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
        <td class="text-center">
            <?php
            $statusColors = [
                0 => ['#d3d3d3', 'Chờ kết quả'],
                1 => ['#34a853', 'Đã có kết quả'],
                'default' => ['#d3d3d3', 'Không xác định']
            ];

            // Chọn trạng thái dựa trên có kết quả hay không
            $statusInfo = $appointment['result'] ? $statusColors[1] : $statusColors[0];
            ?>
            <div class="btn btn-secondary"
                 style="width: 150px; color: whitesmoke; font-weight: normal;
                         background-color: <?php echo $statusInfo[0]; ?>;">
                <?php echo $statusInfo[1]; ?>
            </div>
        </td>
        <td class="p-0">
            <div class="btn-group">
                <button id="btn-action"
                        style="border: none; background-color: transparent;"
                        class="dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M3 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm0-5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm0 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z"/>
                    </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-left">
                    <a type="button" class="dropdown-item"
                       href="http://localhost/Medicare/index.php?controller=appointment&action=detail_client&id=<?php echo $appointment['id'] ?>">Chi tiết</a>
                </div>
            </div>
        </td>
    </tr>
    <?php
    $counter++;
endforeach; ?>