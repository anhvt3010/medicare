function validateAppointment(specialId, doctorId, dateSlot, timeSlotId) {
    var errorSpecialty = document.getElementById('error-specialty');
    if (!specialId) {
        errorSpecialty.style.display = 'block';
        errorSpecialty.textContent = 'Vui lòng chọn chuyên khoa khám'
        return false;
    } else {
        errorSpecialty.style.display = 'none';
    }

    var errorDoctor = document.getElementById('error-doctor');
    if (!doctorId) {
        errorDoctor.style.display = 'block';
        errorDoctor.textContent = 'Vui lòng chọn bác sĩ'
        return false;
    } else {
        errorDoctor.style.display = 'none';
    }

    var errorDate = document.getElementById('error-date');
    if (!dateSlot) {
        errorDate.style.display = 'block';
        errorDate.textContent = 'Vui lòng chọn ngày khám'
        return false;
    } else {
        errorDoctor.style.display = 'none';
    }

    var errorTime = document.getElementById('error-time');
    if (!timeSlotId) {
        errorTime.style.display = 'block';
        errorTime.textContent = 'Vui lòng chọn gi khám'
        return false;
    } else {
        errorTime.style.display = 'none';
    }

    return true;
}