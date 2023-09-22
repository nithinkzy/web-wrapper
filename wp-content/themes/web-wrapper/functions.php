<?php
function enqueue_ajax_script()
{
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/js/ajax-script.js', array('jquery'), '1.0', true);
    wp_localize_script('ajax-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('send_email_nonce')
    ));

    // Enqueue custom CSS file
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/theme.css', array(), '1.0.0');

    // Enqueue jQuery
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.4.min.js', array(), '3.6.4', true);

    // Enqueue Font Awesome CSS
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');

    // Enqueue Bootstrap bundle JS
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), '5.2.3', true);
    // wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);

    // Enqueue custom JS file
    wp_enqueue_script('aos', get_template_directory_uri() . '/js/aos.js', array(), '2.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_script');


function submit_contact_form()
{
    parse_str($_POST['formData'], $formData);

    $name = sanitize_text_field($formData['name']);
    $email = sanitize_email($formData['email']);
    $message = sanitize_textarea_field($formData['message']);

    // You can add additional validation here if needed

    $to = 'support@web-wrapper.com'; // Replace with your email address
    $subject = 'Website Contact Form Submission';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    $message_body = "Name: $name\n\nEmail/Phone: $email\n\nMessage:\n$message";

    if (wp_mail($to, $subject, $message_body, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }

    wp_die();
}

add_action('wp_ajax_submit_contact_form', 'submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'submit_contact_form');
