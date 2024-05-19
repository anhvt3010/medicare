<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Lịch Khám</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/appointment.css" rel="stylesheet">
</head>
<body>
<?php include "components/topbar.php" ?>
<?php include "components/header.html" ?>
<main id="main">
    <section class="container" style="padding-top: 150px">
        <h2>Đặt Lịch Khám</h2>
        <hr>
        <br>
        <form>
            <div class="row">
                <div class="col-6">
                    <h5 class="mb-4">Chọn thông tin khám bệnh</h5>
                    <div class="row">
                        <div class="mb-3 col-sm-11">
                            <?php include "components/select-specialty.php" ?>
                        </div>
                        <div class="mb-3 col-sm-11">
                            <?php include "components/select-doctor.php" ?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h5 class="mb-4">Thời gian khám</h5>
                    <div class="row ">
                        <div class="col-12 mb-3">
                            <p>Ngày khám (*)</p>
                            <div class="btn btn-outline-primary">
                                <div id="todayBtn"></div>
                                <span style="font-size: 13px">Hôm nay</span>
                            </div>
                            <div class="btn btn-outline-primary">
                                <div id="tomorrowBtn"></div>
                                <span style="font-size: 13px">Ngày mai</span>
                            </div>
                            <div class="btn btn-outline-primary">
                                <div id="dayAfterTomorrowBtn"></div>
                                <span style="font-size: 13px">Ngày kia</span>
                            </div>
                            <div class="btn btn-outline-primary">
                                <div id="otherDateBtn"><i class="fa-solid fa-plus"></i></div>
                                <span style="font-size: 13px">Ngày khác</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Giờ khám (*)</p>
                            <div class="time-slot" onclick="selectTimeSlot(this)">08:00</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">08:30</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">09:00</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">09:30</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">10:00</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">10:30</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">11:00</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">11:30</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">13:00</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">13:30</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">14:00</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">14:30</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">15:00</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">15:30</div>
                            <div class="time-slot" onclick="selectTimeSlot(this)">16:00</div>
                        </div>
                        <strong style="font-style: italic">Lưu ý: Thời gian khám trên chỉ là thời gian dự kiến, tổng đài sẽ liên hệ xác nhận thời
                            gian khám chính xác tới quý khách sau khi quý khách đặt hẹn</strong>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h5 class="mb-4 col-12">Nhập thông tin cá nhân</h5>
                <div class="col-6">
                    <div class="row">
                        <div class="mb-4 col-8">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên (*)">
                            </div>
                        </div>
                        <div class="mb-4 col-4 text-center row">
                            <div class="col-6">
                                <input type="radio" id="male" name="gender" value="male"
                                       style="width: 15px; height: 15px;">
                                <label for="male">Nam</label>
                            </div>
                            <div class="col-6">
                                <input type="radio" id="female" name="gender" value="female"
                                       style="width: 15px; height: 15px;">
                                <label for="female">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-birthday-cake"></i>
                            </span>
                            <input type="date" class="form-control" id="birthdate" placeholder="Ngày sinh (*)">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" class="form-control" id="phone"
                                   placeholder="Nhập số điện thoại chính xác để nhận OTP (*)">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email"
                                   placeholder="Để lại email để nhận thông tin lịch hẹn">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <textarea class="form-control" id="description" rows="9" style="resize: none"
                              placeholder="Vui lòng mô tả rõ triệu chứng của bạn và nhu cầu thăm khám (*)"></textarea>
                </div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-success"
                        style="background-color:#3fbbc0 !important; width: 20%; font-weight: bold"
                >ĐẶT LỊCH
                </button>
            </div>
        </form>
    </section>
</main>
<?php include "components/footer.html" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/appointment.js"></script>
</body>
</html>