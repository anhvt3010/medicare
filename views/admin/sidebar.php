<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#"></a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">Danh sách quản lý</li>
                        <li class="active">
                            <a href="<?php echo BASE_URL ?>/index.php?controller=home&action=home_admin">
                                <i class="icon fa-solid fa-house"></i><span>Trang chủ</span>
                            </a>
                        </li>
                        <li class="parent">
                            <a href="#">
                                <i class="icon fa-regular fa-calendar"></i><span>Quản lý đặt lịch</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo BASE_URL ?>/index.php?controller=appointment&action=index">Danh sách lịch khám</a></li>
                                <li><a href="<?php echo BASE_URL ?>/index.php?controller=appointment&action=today">Lịch khám hôm nay</a></li>
                                <?php if ($_SESSION['role_id'] != 2) { ?>
                                    <li>
                                        <a href="<?php echo BASE_URL ?>/index.php?controller=appointment&action=confirm">Xác
                                            nhận lịch khám</a></li>
                                    <li>
                                        <a href="<?php echo BASE_URL ?>/index.php?controller=appointment&action=expired">
                                            Lịch khám quá hạn</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if ($_SESSION['role_id'] == 1) { ?>
                            <li class="parent">
                                <a href="#">
                                    <i class="icon fa-solid fa-user"></i><span>Quản lý bệnh nhân</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo BASE_URL ?>/index.php?controller=patient&action=index">Danh sách bệnh nhân</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#">
                                    <i class="icon fa-solid fa-user-doctor"></i><span>Quản lý bác sĩ</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo BASE_URL ?>/index.php?controller=doctor&action=index">Danh sách bác sĩ</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#">
                                    <i class="icon fa-solid fa-user-nurse"></i><span>Quản lý nhân viên</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo BASE_URL ?>/index.php?controller=employee&action=index">Danh sách nhân viên</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#">
                                    <i class="icon fa-solid fa-font-awesome"></i><span>Quản lý chuyên khoa</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo BASE_URL ?>/index.php?controller=specialty&action=index">Danh sách chuyên khoa</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
