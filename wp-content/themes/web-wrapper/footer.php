<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web-wrapper
 */

?>


</div>
<footer class="bg-dark text-light py-5">
	<div class="container">
		<div class="row flex-column-reverse flex-md-row justify-content-center justify-content-md-around">
			<!-- Logo and Slogan -->
			<div class="col-12  col-md-6 col-lg-4">
				<a class="navbar-brand mb-5" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
				<!-- <img src="your-logo.png" alt="Your Logo" class="img-fluid mb-3"> -->
				<p class="text-muted mt-3">Empowering businesses with affordable and innovative web solutions. Your success is our priority.</p>
				<a href="https://www.facebook.com/thewebwrapper" class="text-light me-3">Connect with us on <i class="fab fa-facebook-f"></i></a>

			</div>

			<!-- Quick Links -->
			<div class="col-12  col-md-6 col-lg-4 email mb-5">
				<h3 class="text-primary">hi@web-wrapper.com</h3>
				<p class="text-muted">Click to open in your mail client or save it for later.</p>
			</div>

			<!-- Free Consultation Form -->
			<div class="col-lg-4 text-lg-end d-none d-lg-block">
				<h5 class="mb-5">Interested in our services? </h5>
				<p class="mb-3">Email us a "Hi" or your queries for a free consultation. We'll reach out to assist you!</p>

			</div>
		</div>

	</div>
</footer>



<?php wp_footer(); ?>

</body>

</html>