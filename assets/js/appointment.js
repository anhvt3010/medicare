// select time
function selectTimeSlot(element) {
    var timeSlots = document.querySelectorAll('.time-slot');
    timeSlots.forEach(function (slot) {
        slot.classList.remove('selected');
    });
    element.classList.add('selected');
}

function setDates() {
    let today = new Date();
    let tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    let dayAfterTomorrow = new Date(today);
    dayAfterTomorrow.setDate(today.getDate() + 2);

    document.getElementById('todayBtn').innerText = formatDate(today);
    document.getElementById('tomorrowBtn').innerText = formatDate(tomorrow);
    document.getElementById('dayAfterTomorrowBtn').innerText = formatDate(dayAfterTomorrow);
}

function formatDate(date) {
    let day = date.getDate();
    let month = date.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0
    let year = date.getFullYear();
    return (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month);
}

window.onload = setDates;

document.getElementById('otherDateBtn').addEventListener('click', function () {
    document.getElementById('otherDateInput').classList.toggle('d-none');
});


