// xử ly chọn ngày ====================================================================================================
$(document).ready(function () {
    // xxxxxx Cấu hình tiếng việt cho chọn lịch =======================================
    $.datepicker.regional['vi'] = {
        closeText: 'Đóng',
        prevText: '&#x3C;Trước',
        nextText: 'Tiếp&#x3E;',
        currentText: 'Hôm nay',
        monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
            'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],
        monthNamesShort: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6',
            'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
        dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
        dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        weekHeader: 'Tu',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['vi']);

    // xxxxxx  Cấu hình giới hạn chọn ngày ============================================
    $('#input-otherDate').datepicker({
        minDate: 0, // Ngày hiện tại
        maxDate: "+14D", // 14 ngày kể từ ngày hiện tại
        dateFormat: 'dd/mm/yy',
        beforeShowDay: function(date) {
            var day = date.getDay();
            // Kiểm tra nếu là thứ Bảy (6) hoặc Chủ Nhật (0)
            if (day === 0 || day === 6) {
                return [false];
            } else {
                return [true];
            }
        }
    });

    // Xử lý khi click vào nút "Ngày khác" =============================================
    $('#input-otherDate').datepicker({
        dateFormat: 'dd/mm/yyyy'
    });
    $('#input-otherDate').change(function () {
        var inputDate = $(this).val();

        var dateParts = inputDate.split('-');
        var year = parseInt(dateParts[0], 10);
        var month = parseInt(dateParts[1], 10) - 1; // Chuyển đổi tháng từ 1-12 sang 0-11
        var day = parseInt(dateParts[2], 10);
        var selectedDate= new Date(Date.UTC(year, month, day));

        selectDate(selectedDate);
    });

    // Hàm selectDate để xử lý việc chọn ngày
    function selectDate(date) {
        var dateTimestamp = convertDateToDayTimestamp(date.toLocaleDateString());
        var specialtyId = document.getElementById('selected-specialty').value;

        console.log('Ngày đã chọn:', dateTimestamp);
        document.getElementById('date-slot').value = dateTimestamp
        console.log('Chuyen khoa: + ', specialtyId)
        console.log('Bác sĩ:  + ', parseInt(document.getElementById('selected-doctor').value,10))

        $.ajax({
            url: 'http://localhost/Medicio/index.php',
            type: 'GET',
            data: {
                controller: 'appointment',
                action: 'getByDateAndDoctor',
                dateSlot: dateTimestamp,
                doctorId: parseInt(document.getElementById('selected-doctor').value,10)
            },
            success: function(timeSlots) {
                // console.log(timeSlots)
                displayTimeSlots(timeSlots);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

});

document.addEventListener('DOMContentLoaded', function() {
    timeSlots = [];
    timeValue = '00:00:00'

    displayTimeSlots(timeSlots, timeValue);
});



function displayTimeSlots(timeSlots, timeValue) {
    var container = document.getElementById('display-time-slot');
    container.innerHTML = ''; // Xóa các khung giờ cũ

    var allTimeSlots = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00",
        "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30"];

    // Kiểm tra và xử lý nếu timeValue không hợp lệ hoặc không tồn tại
    var selectedTime = timeValue ? timeValue.substring(0, 5) : '';
    var isSelectedTimeValid = timeValue && allTimeSlots.includes(selectedTime);

    allTimeSlots.forEach(function(time) {
        var timeSlotDiv = document.createElement('div');
        timeSlotDiv.className = 'time-slot';
        timeSlotDiv.textContent = time;

        // Kiểm tra nếu khung giờ này có trong mảng timeSlots
        if (timeSlots.includes(time)) {
            timeSlotDiv.classList.add('disabled');
            timeSlotDiv.setAttribute('onclick', ''); // Xóa sự kiện onclick
        }

        // Kiểm tra nếu khung giờ này là timeValue
        if (isSelectedTimeValid && time === selectedTime) {
            timeSlotDiv.classList.add('selected');
            timeSlotDiv.setAttribute('onclick', ''); // Xóa sự kiện onclick
        }

        // Nếu không phải là disabled hoặc selected, thêm sự kiện onclick
        if (!timeSlotDiv.classList.contains('disabled') && !timeSlotDiv.classList.contains('selected')) {
            timeSlotDiv.setAttribute('onclick', 'selectTimeSlot(this)');
        }

        container.appendChild(timeSlotDiv);
    });

    // Kiểm tra nếu không có khung giờ nào được hiển thị
    if (container.children.length === 0) {
        container.innerHTML = '<div class="alert alert-info">Không có khung giờ nào.</div>';
    }
}

// Chọn giờ khám =======================================================================================================
function selectTimeSlot(element) {
    var timeSlots = document.querySelectorAll('.time-slot');
    timeSlots.forEach(function (slot) {
        slot.classList.remove('selected');
    });
    element.classList.add('selected');

    // Lấy giá trị tương ứng với khung giờ được chọn
    var selectedTime = element.textContent;
    var timeSlotValues = {
        "08:00": 1, "08:30": 2, "09:00": 3, "09:30": 4, "10:00": 5, "10:30": 6, "11:00": 7,
        "13:00": 8, "13:30": 9, "14:00": 10, "14:30": 11, "15:00": 12, "15:30": 13, "16:00": 14, "16:30": 15
    };
    document.getElementById('time-slot').value = timeSlotValues[selectedTime];
}

// Chọn ngày khám ======================================================================================================
function selectDateSlot(element) {
    var dateSlots = document.querySelectorAll('.btn-select-day');
    dateSlots.forEach(function (slot) {
        slot.classList.remove('selected');
    });
    element.classList.add('selected');
}

// xxxxxxx    Timestamp by day =========================================================================================
function convertDateToDayTimestamp(dateString) {
    var parts = dateString.split('-'); // Tách chuỗi dựa trên dấu "-"
    var year = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10) - 1; // Lưu ý: tháng trong JavaScript bắt đầu từ 0
    var day = parseInt(parts[2], 10);
    var date = new Date(Date.UTC(year, month, day));

    // Chuyển đổi ngày sang timestamp và chia cho số miligiây trong một ngày
    return Math.floor(date.getTime() / 86400000); // 86400000 là số miligiây trong một ngày
}



