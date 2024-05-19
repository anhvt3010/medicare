<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
    <div class="align-items-center d-none d-md-flex">
      <i class="bi bi-clock"></i> Thứ Hai - Thứ Sáu, 8AM - 6PM
    </div>
    <div class="d-flex align-items-center">
      <i class="bi bi-phone"></i> Liên hệ ngay! 090 7676 195
    </div>
    <div>
      <?php
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['user'])) {
            // Hiển thị số điện thoại của người dùng
            echo "<span style='color: white;'>" . htmlspecialchars($_SESSION['user']) . "</span>";
      } else {
      // Hiển thị liên kết để đăng nhập
      echo '<a href="http://localhost/Medicio/index.php?controller=home&action=login" class="navbar order-last order-lg-0" style="color:white;">
      <i style="color: white;" class="fa fa-sign-in" aria-hidden="true"></i>
      Đăng nhập
    </a>';
      }
      ?>
    </div>
  </div>
</div>