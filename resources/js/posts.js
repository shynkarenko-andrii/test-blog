console.log('test');

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const form = '#form_add_post';

    $(form).on('submit', function (event) {
        event.preventDefault();

        const url = $(this).attr('action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if ($.isEmptyObject(data.errors)) {
                    alert(data.success);
                    location.reload();
                } else {
                    printErrorMsg(data.errors);
                }
                console.log(data);
            },
            error: function (data) {
                printErrorMsg(data.responseJSON.errors);
                console.log(data);
                console.log('error');

            }
        });
    });

    function printErrorMsg(msg) {
        console.log(msg);
        console.log('msg');
        $("#print-error-msg").find("ul").html('');
        $("#print-error-msg").css('display', 'block');
        $.each(msg, function (key, value) {
            $("#print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }

});

