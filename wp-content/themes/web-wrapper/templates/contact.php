<?php
/*
 * Template Name: Contact Page
 */
function custom_meta_tags()
{
    // Output your custom meta tags
    echo '<meta name="description" content="Reach out to Web-Wrapper for all your web-related needs. Contact our expert team for web design, development, SEO, and other digital solutions. Let\'s transform your online presence!">';
    echo '<meta name="keywords" content="contact us, web design, web development, SEO, digital solutions">';
}

// Hook into the wp_head action to add custom meta tags
add_action('wp_head', 'custom_meta_tags');

// Modify the document title
function custom_document_title_parts($title_parts)
{
    // Customize the title based on the current page
    $title_parts['title'] = "Contact Us | Get in Touch with Web-Wrapper";

    return $title_parts;
}

// Hook into the document_title_parts filter to modify the title
add_filter('document_title_parts', 'custom_document_title_parts');
get_header();
?>
<script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.12.0/tsparticles.confetti.bundle.min.js"></script>
<div class="container py-5 contact-us">

    <!-- Contact Form Section -->
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4"><span>Contact Us</span> <br> Transforming Your Online Presence</h2>
            <p class="lead mb-4">Ready to transform your digital presence with Web-wrapper ?
                <br>
                Fantastic! simply complete the form below 😀
            </p>
        </div>

        <!-- Contact Form -->
        <form class="col-md-8 col-lg-6 mx-auto py-5" id="contactForm">

            <!-- Name Field -->
            <div class="form-group floating-label-input">
                <input type="text" class="form-control" id="name" name="name" required>
                <label for="name">Enter your name</label>
            </div>

            <!-- Email Field -->
            <div class="form-group floating-label-input">
                <input type="email" class="form-control" id="email" name="email" required>
                <label for="email">E-mail</label>
            </div>

            <!-- Phone Field -->
            <div class="form-group floating-label-input">
                <input type="tel" class="form-control" id="phone" name="phone" required>
                <label for="phone">Phone number</label>
            </div>

            <!-- Message Field -->
            <div class="form-group floating-label-input mb-5">
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                <label for="message">Briefly describe what you are looking for</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-100 btn btn-primary btn-lg ">Message Now</button>
        </form>
        <!-- Display messages to the user -->
        <div id="status"></div>
    </div>

</div>

<script>
    const defaults = {
        spread: 360,
        ticks: 100,
        gravity: 0,
        decay: 0.94,
        startVelocity: 30,
    };

    function shoot() {
        confetti({
            ...defaults,
            particleCount: 30,
            scalar: 1.2,
            shapes: ["circle", "square"],
            colors: ["#a864fd", "#29cdff", "#78ff44", "#ff718d", "#fdff6a"],
        });

        confetti({
            ...defaults,
            particleCount: 20,
            scalar: 2,
            shapes: ["text"],
            shapeOptions: {
                text: {
                    value: ["🦄", "🌈"],
                },
            },
        });
    }
    jQuery(document).ready(function($) {

        setTimeout(shoot, 0);
        setTimeout(shoot, 100);
        setTimeout(shoot, 200);
        // Handle form submission
        $("#contactForm").submit(function(e) {
            e.preventDefault();

            // Get form data
            var formData = $(this).serialize();
            // Reference to the Bootstrap alert div
            var alertDiv = $("#status");
            // Send AJAX request
            $.ajax({
                type: "POST",
                url: ajax_object.ajax_url,
                data: {
                    action: 'process_contact_form',
                    formData: formData,
                },
                success: function(response) {
                    // Update status on the page
                    var alertClass = response.includes("Thanks") ? "alert-success" : "alert-danger";
                    var alertHtml = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                        '<strong>' + response + '</strong>' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';

                    // Update the status div with the alert
                    alertDiv.html(alertHtml);

                    // Clear form fields
                    $("#contactForm")[0].reset();
                }
            });
        });
    });
</script>

<?php get_footer(); ?>