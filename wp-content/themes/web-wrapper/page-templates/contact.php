<?php /* Template Name: Contact*/ ?>
<?php
// Check if the form is submitted
$message = "";
$alert = "d-none";
if (isset($_POST['submit'])) {
    // Get form data
    $name = sanitize_text_field($_POST['name']);
    $company = sanitize_text_field($_POST['Company']);
    $email = sanitize_email($_POST['Email']);
    $servicesRequired = sanitize_text_field($_POST['Services-Required']);
    $project = sanitize_textarea_field($_POST['Project']);

    // Compose the email
    $to = 'studiosilverbrush@gmail.com';
    $subject = 'Form Submission';
    $message = "Name: $name\n";
    $message .= "Company: $company\n";
    $message .= "Email: $email\n";
    $message .= "Services Required: $servicesRequired\n";
    $message .= "Project Details:\n$project";

    // Send the email
    $sent = wp_mail($to, $subject, $message);

    // Display a success message or handle errors
    if ($sent) {
        $message = 'Thank you! Your submission has been received!';
        $alert = 'd-block alert-success';
    } else {
        $message = 'Oops! Something went wrong while submitting the form.';
        $alert = 'd-block alert-danger';
    }
}
?>

<?php get_header(); ?>
<main id="contact_page">
    <div class="container-fluid contact-section pb-5 ">

        <div class="container-lg ">

            <div class=" row pt-5 gap-1 justify-content-evenly">
                <div class="d-none d-md-block col-5 bg-dark m-0 p-0 pb-1">
                    <img class="color-block" src="<?php echo get_template_directory_uri() . '/assets/images/Contact-us-artwork.jpg' ?>" alt="Contact Us Artwork">
                </div>
                <div class="col-12 col-md-6">
                    <div class="row flex-column">
                        <div class="d-flex justify-content-start socials mb-3">
                            <a target="_blank" href="mailto:studiosilverbrush@gmail.com"><i class="fa-regular fa-envelope"></i></a>
                            <a target="_blank" href="https://www.behance.net/silverbrushstudio"><i class="fa-brands fa-behance"></i></a>
                            <a target="_blank" href="https://www.youtube.com/@silverbrushstudio"><i class="fa-brands fa-youtube"></i></a>
                            <a target="_blank" href="https://www.instagram.com/silver_brush"><i class="fa-brands fa-instagram"></i></a>
                            <a target="_blank" href="https://in.linkedin.com/company/silverbrushstudio"><i class="fa-brands fa-linkedin"></i></a>
                            <a target="_blank" href="https://dribbble.com/silverbrushstudio"><i class="fa-brands fa-dribbble"></i></a>
                        </div>
                        <p class="mb-4 contact-sub-text">Art is our language, Let’s start a conversation!</p>
                        <div class="form-block w-form">
                            <form id="contact-form" method="post" class="mb-5">
                                <input type="text" class="form-control" maxlength="256" name="name" data-name="Name" placeholder="Name*" id="Name" required>
                                <input type="text" class="form-control" maxlength="256" name="Company" data-name="Company" placeholder="Company Name" id="Company">
                                <input type="email" class="form-control" maxlength="256" name="Email" data-name="Email" placeholder="Contact Email / Mobile*" id="Email/ Mobile Number" required>
                                <input type="text" class="form-control" maxlength="256" name="Services-Required" data-name="Services Required" placeholder="Services Required*" id="Services-Required" required>
                                <textarea class="mb-5" placeholder="Project Details*" maxlength="5000" id="Project" name="Project" data-name="Project" required class="form-control"></textarea>
                                <input type="hidden" name="action" value="send_email_ajax_handler"> <!-- Add the hidden action field -->
                                <button class="btn btn-secondary back-btn" type="submit">SEND</button>
                            </form>
                            <div id="form-response" class="d-none" tabindex="-1" role="region" aria-label="Email Form response"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="success-box">
        <div class="d-flex justify-content-end align-items-center">
            <img class="close-btn" src="http://localhost/wp-content/themes/chriss/assets/images/close.png" alt="Close Menu Button">
        </div>
        <div class="message">
            <h2>Thank You</h2>
            <p>We'll be in touch shortly</p>
        </div>
    </div>

    <?php get_footer(); ?>

</main>
</body>

</html>