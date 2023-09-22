jQuery(document).ready(function ($) {
    $('#contact-form').submit(function (e) {
        e.preventDefault(); // Prevent form submission

        var formData = $(this).serialize(); // Serialize form data
        console.log(formData);
        // Disable the submit button
        $('#contact-form button[type="submit"]').attr('disabled', true);

        $.ajax({
            url: ajax_object.ajax_url, // AJAX handler URL
            type: 'POST',
            data: formData, // Add the action parameter
            beforeSend: function () {
                // Show loading or processing message
                $('#form-response').html('<p>Sending...</p>').removeClass('alert-success alert-danger').addClass('d-block');
            },
            success: function (response) {
                console.log(response);
                if (response.status === 'success') {
                    // Show success message
                    // $('#form-response').html('<p>' + response.message + '</p>').addClass('alert-success').removeClass('d-none alert-danger');
                    $('.success-box').toggle();
                    // Clear form fields
                    $('#contact-form')[0].reset();
                } else {
                    // Show error message
                    $('#form-response').html('<p>' + response.message + '</p>').addClass('alert-danger').removeClass('d-none alert-success');
                }
            },
            error: function () {
                // Show error message
                $('#form-response').html('<p>Oops! Something went wrong.</p>').addClass('alert-danger').removeClass('d-none alert-success');
            },
            complete: function () {
                // Enable the submit button
                $('#contact-form button[type="submit"]').attr('disabled', false);
            },
        });
    });
    $("#scroll_btn").click(function (e) {
        e.preventDefault();
        var duration = 2000;
        $('html, body').animate({
            scrollTop: $("#brand").offset().top
        }, {
            duration: duration,
            easing: 'linear', // Use linear easing function for consistent scroll pace
            start: function () {
                // Disable scrolling during animation
                $('html, body').css('overflow-y', 'hidden');
            },
            complete: function () {
                // Re-enable scrolling after animation completes
                $('html, body').css('overflow-y', 'auto');
            }
        });
    });

    $('.success-box .close-btn').click(function (e) {
        $('.success-box').toggle();
    })
})
