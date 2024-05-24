<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center gap-2">
      <a href="http://localhost/Medicio/index.php?controller=home&action=home#hero" class="logo me-auto">
        <img   src="assets/img/Medicare.png" alt="">
      </a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="http://localhost/Medicio/index.php?controller=home&action=home#hero">Trang chủ</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/Medicio/index.php?controller=home&action=home#about">Giới thiệu</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/Medicio/index.php?controller=home&action=home#services">Chuyên khoa</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/Medicio/index.php?controller=home&action=home#doctors">Bác sĩ</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/Medicio/index.php?controller=home&action=home#contact">Liên hệ</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

      <a href="http://localhost/Medicio/index.php?controller=home&action=appointment"
         class="appointment-btn scrollto" style="text-decoration: none"><span class="d-none d-md-inline">ĐẶT LỊCH KHÁM</span></a>

        <?php
        if (isset($_SESSION['user_phone'])) {
            // Lấy số điện thoại người dùng từ session
            $userPhone = $_SESSION['user_phone'];

            // Hiển thị số điện thoại người dùng
            echo '<div class="user-dropdown">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle"  style="background-color: #3FBBC0FF !important; border-color: #3FBBC0FF"
                                  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Xin chào: ' . htmlspecialchars($userPhone) . '
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                <i class="fa-solid fa-user"></i>&nbsp;&nbsp;Thông tin cá nhân
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fa-solid fa-clock-rotate-left"></i>&nbsp;&nbsp;Lịch sử khám
                            </a></li>
                            <li><a class="dropdown-item" href="#"  onclick="confirmLogout(event)">
                                <i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;Đăng xuất
                            </a></li>
                          </ul>
                        </div>
                      </div>';
        }
        ?>
    </div>
  </header>
<script>
    function confirmLogout(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

        // Hiển thị dialog xác nhận
        if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
            window.location.href = "http://localhost/Medicio/index.php?controller=home&action=logout";
        }
    }
</script>
