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
<footer class="py-5">
	<div class="container">
		<div class="row flex-column-reverse flex-md-row justify-content-center justify-content-md-around">
			<!-- Logo and Slogan -->
			<div class="col-12  col-md-6 col-lg-4">
				<a class="navbar-brand mb-5" href="<?php echo esc_url(home_url('/')); ?>">
				<a href="/">
					<h5 class="mb-5 brand">Web-Wrapper</h5>
				</a>	

				</a>
				<!-- <img src="your-logo.png" alt="Your Logo" class="img-fluid mb-3"> -->
				<p class="mt-3">Empowering businesses with affordable and innovative web solutions. Your success is our priority.</p>


			</div>

			<!-- Quick Links -->
			<div class="col-12  col-md-6 col-lg-4 mb-5 ">
				<a href="/contact">

					<h5 class="mb-5">Contact us</h5>
					
				</a>
				<a href="mailto:info@web-wrapper.com" class="text-decoration-none">
					<h6 class="">info@web-wrapper.com</h6>
				</a>
				<a href="tel:+14379245244" class="text-decoration-none">
					<h6 class="">+1 (437) - 924 - 5244</h6>
				</a>
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