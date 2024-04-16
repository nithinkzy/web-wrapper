<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pawsgang
 */
// Add custom content to the head
function custom_meta_tags()
{
	// Output your custom meta tags
	echo '<meta name="description" content="Discover the power of Web-Wrapper! Affordable web solutions for businesses worldwide. Improve visibility, achieve growth, and stand out with our expert services.">';
	echo '<meta name="keywords" content="web solutions, online presence, affordable websites, business growth, expert services">';
}

// Hook into the wp_head action to add custom meta tags
add_action('wp_head', 'custom_meta_tags');

// Modify the document title
function custom_document_title_parts($title_parts)
{
	// Customize the title based on the current page
	$title_parts['title'] = "Web-Wrapper | Elevate Your Online Presence";

	return $title_parts;
}

// Hook into the document_title_parts filter to modify the title
add_filter('document_title_parts', 'custom_document_title_parts');

get_header();
?>


<main id="primary" class="site-main">

	<section>
		<div class="hero">
			<div class="container-xxl heading">
				<div class="">

					<h1 class="display-1 mb-5">We believe, every business<span> Deserves a Website</span></h1>

					<div class="d-flex flex-column flex-md-row justify-content-between mb-5">
						<div class="d-flex gap-3 gap-md-5 align-items-center">
							<a class="btn btn-secondary" href="/services">SERVICES</a>
							<a class="btn btn-primary" href="/contact">let's talk</a>
						</div>
						<div class="col-12 col-md-5">

							<p class="d-none d-md-block ">Toronto, Canada based web agency for affordable websites. </p>
							<p class="fw-bold mt-3 money-back"><i class="fa-solid fa-certificate pe-2" style="color: #FFD43B;"></i>100% Money-Back Guarantee Included.</p>
						</div>

					</div>
				</div>

				<!-- <div class="d-flex justify-content-between mb-5">

					<p><i class="fa-solid fa-sack-dollar"></i> Money-Back Guarantee Included.</p>
					<p><i class="fa-solid fa-sack-dollar"></i> Built To Convert Over Your Competitors</p>
					<p><i class="fa-solid fa-sack-dollar"></i> Toronto Developed & Operated</p>
				</div> -->




			</div>
			<p class="text-center link-underline-light d-none d-md-block">Recent works</p>

			<div class="swiper mySwiper">
				<div class="swiper-wrapper">
					<?php
					$args = array(
						'post_type' => 'portfolio', // Replace 'work' with the name of your custom post type
						'posts_per_page' => 10,
						'orderby' => 'date', // You can change the ordering as needed
						'order' => 'DESC',
					);

					$query = new WP_Query($args);

					if ($query->have_posts()) :
						while ($query->have_posts()) :
							$query->the_post();

							// Get the work image URL from the custom field
							$work_image_url = get_field('cover_image'); // Assuming you are using ACF (Advanced Custom Fields)

							// Check if there's an image URL, then add it to the carousel
							if ($work_image_url) {
								echo '<div class="swiper-slide" >';
								// echo '<a href="' . esc_url(get_permalink()) . '">';
								echo '<img src="' . esc_url($work_image_url) . '" alt="' . get_the_title() . '" class="img-fluid">';
								// echo '</a>';
								echo '</div>';
							}

						endwhile;
						wp_reset_postdata();
					else :
						echo 'No works found.';
					endif;
					?>
				</div>
			</div>
		</div>
	</section>


	<section id="about" class="section-spacing">
		<div class="container-xxl">
			<div class="d-flex justify-content-between align-items-center">
				<div class="col-12 col-md-10">
					<h2 class="display-4 mb-4">We Will Help You <br> Stand Out From Your Competitors.</h2>
					<p class="mb-4">Welcome to Web-Wrapper, your premier destination for affordable and bespoke website solutions. Based in Toronto, Canada, and serving clients worldwide, we specialize in crafting unique online identities that set you apart from the competition. Whether you're a budding entrepreneur or an established business, our team is dedicated to creating stunning websites that capture your brand essence and drive results. From website design and development to optimization and support, we're here to help you shine in the digital arena.</p>
					<a class="btn btn-secondary" href="/services">About Us</a>
				</div>
				<!-- <img src="<?php echo get_template_directory_uri() . '/img/why-choose-web-wrapper.jpeg' ?>" alt="Step 1 Image" class="img-fluid"> -->

			</div>
		</div>
	</section>
	<section id="services" class="section-spacing">
		<div class="container-xxl">
			<div class="d-flex align-items-center justify-content-between mb-3 mb-md-5 ">
				<h2 class="display-4">Services we offer.</h2>
				<a class="btn btn-secondary d-none d-md-block" href="/contact">Let's talk</a>
			</div>
			<ul class="d-flex justify-content-around ">
				<li>Business Website</li>
				<li>Landing Page</li>
				<li>E-commerce</li>
				<li>Custom Web App</li>
			</ul>
		
			<div class="services-card mb-5">
				<p>Design</p>
				<p>Development</p>
				<p>Audit</p>
				<p>Revamp</p>
				<p>Maintainence</p>
				<p>Search Engine Optimization</p>
				<!-- <p>SEO</p> -->
			</div>
			<!-- <a class="btn btn-primary d-md-none" href="/services">DISCOVER YOUR SOLUTION</a> -->
		</div>
	</section>

	<section id="cta" class="white-card">
		<div class="container-xxl text-center">
			<div class="ribbon text-center mb-2">Offer Ends Soon</div>
			<h2 class="display-5 mb-3">Your dream website today for as low as <strong>$300</strong></h2>
			<p class="mb-3">Yes, you read that right, it's worth over $1000! Don't let this chance slip away</p>
			<a class="btn btn-primary" href="/contact">Get in Touch Today</a>
		</div>
	</section>


	<section id="testimonials" class="section-spacing">
		<div class="container-xxl mb-5">

			<h2 class="display-4 mb-5 text-center">Testimonials</h2>
			<div class="d-flex flex-column flex-lg-row justify-content-evenly gap-2">
				<?php
				$args = array(
					'post_type'      => 'testimonial',
					'posts_per_page' => 4,
				);

				$testimonials = get_posts($args);

				$active = 'active';

				foreach ($testimonials as $testimonial) {
					$review    = get_field('review', $testimonial->ID);
					$company   = get_field('company', $testimonial->ID);
					$name      = get_field('name', $testimonial->ID);
					$position  = get_field('position', $testimonial->ID);
					$image_url = get_field('image', $testimonial->ID);
				?>

					<div class="d-flex flex-column justify-content-between review-card">
						<div class="star-rating mb-3">
							<i class="fas fa-star text-warning"></i>
							<i class="fas fa-star text-warning"></i>
							<i class="fas fa-star text-warning"></i>
							<i class="fas fa-star text-warning"></i>
							<i class="fas fa-star text-warning"></i>
						</div>
						<p class="review mb-auto"><?php echo esc_html($review); ?></p>
						<div class="row align-items-center mt-4">
							<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($name); ?>" class="col-6 img-fluid">
							<div class="col-6">
								<p class="company m-0"><?php echo esc_html($company); ?></p>
								<p class="position m-0"><?php echo esc_html($name); ?> </p>
								<p class="fw-bold"><?php echo esc_html($position); ?></p>
							</div>
						</div>
					</div>

				<?php
					$active = ''; // Remove 'active' class after the first iteration
				}
				?>
			</div>

		</div>

	</section>









</main>


<?php
get_footer();
