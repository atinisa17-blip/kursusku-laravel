import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

$(document).ready(function () {
    function checkAvailability() {
        const courseId = $('#course_id').val();
        const availability = $('#availability');

        if (!courseId) {
            availability
                .removeClass('alert-success alert-danger')
                .addClass('alert-info')
                .text('Pilih kursus untuk melihat sisa kursi.');
            return;
        }

        $.ajax({
            url: '/courses/' + courseId + '/availability',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                availability
                    .removeClass('alert-info alert-danger')
                    .addClass('alert-success')
                    .text(data.course + ' — sisa ' + data.remaining + ' kursi.');
            },
            error: function () {
                availability
                    .removeClass('alert-info alert-success')
                    .addClass('alert-danger')
                    .text('Gagal mengambil informasi kursi.');
            }
        });
    }

    $('#course_id').on('change', checkAvailability);
    checkAvailability();
});
