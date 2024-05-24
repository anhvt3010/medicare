<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Lịch Khám</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/appointment.css" rel="stylesheet">

    <!-- Thêm jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Thêm jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<?php include "components/topbar.php" ?>
<?php include "components/header.php" ?>
<main id="main">
    <section class="container" style="padding-top: 150px">
        <h2>Đặt Lịch Khám</h2>
        <hr>
        <form method="GET" action="#">
            <div class="row" id="form-time-container">
                <?php include "components/form-time.php" ?>
            </div>
            <div id="form-info-container">
                <?php include "components/form-information.php" ?>
            </div>
        </form>
<!--        <div id="confirm-information">-->
<!--            --><?php //include "components/confirm.php" ?>
<!--        </div>-->
    </section>
</main>
<?php include "components/footer.html" ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Thêm JavaScript của jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/appointment.js"></script>
<script src="assets/js/validateAppointment.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formTimeContainer = document.getElementById('form-time-container');
        const formInfoContainer = document.getElementById('form-info-container');
        const buttonAction = document.getElementById('action-button');

        // Ban đầu ẩn form thông tin
        formInfoContainer.style.display = 'none';

        // Kiểm tra các giá trị khi nút được nhấn
        buttonAction.addEventListener('click', function() {
            var specialId = document.getElementById('selected-specialty')?.value;
            var doctorId = document.getElementById('selected-doctor')?.value;
            var dateSlot = document.getElementById('date-slot')?.value;
            var timeSlotId = document.getElementById('time-slot')?.value;

            console.log(validateAppointment(specialId, doctorId, dateSlot, timeSlotId))
            // Kiểm tra nếu một trong các giá trị là rỗng
            if (validateAppointment(specialId, doctorId, dateSlot, timeSlotId)) {
                buttonAction.disabled = false; // Enable nút
                // Ẩn form thời gian và hiển thị form thông tin
                formTimeContainer.style.display = 'none';
                formInfoContainer.style.display = 'block';
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="assets/js/toastr.js"></script>
<script>
    const buttonSubmit = document.getElementById('submit-button');
    buttonSubmit.addEventListener('click', () => {
        var specialId = parseInt(document.getElementById('selected-specialty')?.value, 10);
        var doctorId = parseInt(document.getElementById('selected-doctor')?.value, 10);
        var dateSlot = parseInt(document.getElementById('date-slot')?.value, 10);
        var timeSlotId = parseInt(document.getElementById('time-slot')?.value,10);
        var patientName = document.getElementById('patient-name')?.value;
        var patientGender = parseInt(document.querySelector('input[name="gender"]:checked')?.value, 10);
        var patientDob = document.getElementById('patient-dob')?.value;
        var patientPhone = document.getElementById('patient-phone')?.value;
        var patientEmail = document.getElementById('patient-email')?.value;
        var patientDescription = document.getElementById('patient-description')?.value;

        // console.log('patientId:', patientId);
        console.log('specialId:', specialId);
        console.log('doctorId:', doctorId);
        console.log('dateSlot:', dateSlot);
        console.log('timeSlotId:', timeSlotId);
        console.log('patientName:', patientName);
        console.log('patientGender:', patientGender);
        console.log('patientDob:', patientDob);
        console.log('patientPhone:', patientPhone);
        console.log('patientEmail:', patientEmail);
        console.log('patientDescription:', patientDescription);

        if(validatePatientInfo(patientName, patientGender, patientDob, patientPhone, patientEmail, patientDescription)) {
            $.ajax({
                url: 'http://localhost/Medicio/index.php',
                type: 'POST',
                data: {
                    controller: 'appointment',
                    action: 'create',
                    specialId: specialId,
                    doctorId: doctorId,
                    dateSlot: dateSlot,
                    timeSlotId: timeSlotId,
                    patientName: patientName,
                    patientGender: patientGender,
                    patientDob: patientDob,
                    patientPhone: patientPhone,
                    patientEmail: patientEmail,
                    patientDescription: patientDescription,
                },
                success: function(message) {
                    console.log(message);
                    toastr.success('Lịch hẹn đã được tạo thành công!', '', {
                        onHidden: function() {
                            window.location.href = 'http://localhost/Medicio/index.php?controller=home&action=confirm';
                        }
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                    toastr.error('Có lỗi xảy ra khi tạo lịch hẹn.');
                }
            });
        }
    });
</script>
</body>
</html>