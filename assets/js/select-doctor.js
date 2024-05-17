$(document).ready(function() {
    $('.doctor-item').on('click', function() {
        var selectedDoctor = $(this).data('filter'); // Lấy tên bác sĩ từ thuộc tính data-filter
        $('#dropdownDoctorButton').text('Bác sĩ: ' + selectedDoctor); // Cập nhật nội dung của nút button
        $('#dropdownDoctorButton').dropdown('toggle'); // Tùy chọn: đóng dropdown sau khi chọn
    });

    $('#input-bts-ex-6').on('input', function() {
        var searchTerm = $(this).val().toLowerCase();
        var hasVisibleItems = false;

        $('.doctor-item').each(function() {
            var itemText = $(this).data('filter').toLowerCase();
            if (itemText.includes(searchTerm)) {
                $(this).show();
                hasVisibleItems = true;
            } else {
                $(this).hide();
            }
        });

        if (!hasVisibleItems) {
            $('.no-search-results').removeClass('d-none');
            $('.no-search-results strong span').text(searchTerm);
        } else {
            $('.no-search-results').addClass('d-none');
        }
    });

    $('#input-bts-ex-6').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue.length > 0) {
            $('#clear-search-doctor').show();
        } else {
            $('#clear-search-doctor').hide();
        }
    });

    $('#clear-search-doctor').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#input-bts-ex-6').val('').trigger('input');
    });
});