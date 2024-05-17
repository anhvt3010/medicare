// select specialty
$(document).ready(function() {
    $('.filter-item').on('click', function() {
        var selectedSpecialty = $(this).data('filter'); // Lấy tên chuyên khoa từ thuộc tính data-filter
        $('#dropdownMenuButton').text('Chuyên khoa: ' + selectedSpecialty); // Cập nhật nội dung của nút button
        $('#dropdownMenuButton').dropdown('toggle'); // Tùy chọn: đóng dropdown sau khi chọn
    });

    $('#input-bts-ex-5').on('input', function() {
        var searchSpecialty = $(this).val().toLowerCase();
        var hasVisibleItems = false;

        $('.filter-item').each(function() {
            var itemText = $(this).data('filter').toLowerCase();
            if (itemText.includes(searchSpecialty)) {
                $(this).show();
                hasVisibleItems = true;
            } else {
                $(this).hide();
            }
        });

        if (!hasVisibleItems) {
            $('.no-search-results').removeClass('d-none');
            $('.no-search-results strong span').text(searchSpecialty);
        } else {
            $('.no-search-results').addClass('d-none');
        }
    });

    $('#input-bts-ex-5').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue.length > 0) {
            $('#clear-search').show();
        } else {
            $('#clear-search').hide();
        }
    });

    $('#clear-search').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#input-bts-ex-5').val('').trigger('input');
    });
});