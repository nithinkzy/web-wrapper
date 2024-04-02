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
			<div class="container-xxl">
				<div class="col-11 ms-auto">

					<h1 class="display-1 mt-2 mb-3">We Believe every business Deserves a Website</h1>

					<div class="d-flex justify-content-start mb-5">
						<p class="col-6 lead">Your top pick for affordable, local websites. We specialize in crafting online success stories for small businesses.</p>
						<div class="d-flex gap-5 ms-5 align-items-center">
							<a class="btn btn-secondary" href="/services">EXPLORE SERVICES</a>
							<a class="btn btn-primary" href="/contact">Free Consulation</a>
						</div>
					</div>
				</div>

				<div class="d-flex justify-content-between mb-5">
					<p><i class="fa-solid fa-sack-dollar"></i> Money-Back Guarantee Included.</p>
					<p><i class="fa-solid fa-sack-dollar"></i> Built To Convert Over Your Competitors</p>
					<p><i class="fa-solid fa-sack-dollar"></i> Toronto Developed & Operated</p>
				</div>




			</div>
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
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>


	<section id="about">
		<div class="container-xxl">
			<div class="d-flex justify-content-between">
				<div class="col-5">
					<h2 class="display-6 mb-4">We Help You Stand Out From Your Competitors</h2>
					<p class="mb-3">At web-wrapper we meticulously code and handcraft each website, tailoring it to your business. Our sites prioritize : Bespoke Design , Optimized Speed, SEO Excellence, Responsive on all Devices</p>
					<a class="btn btn-secondary" href="/services">About Us</a>
				</div>
				<img src="<?php echo get_template_directory_uri() . '/img/about-us.svg' ?>" alt="Step 1 Image" class="img-fluid">

			</div>
		</div>
	</section>

	<section id="services">
		<div class="container-xxl">
			<h2 class="display-6 mb-5">Services <i class="fa-solid fa-robot"></i></h2>
			<div class="row">
				<?php foreach ($services as $service) : ?>
					<div class="col-md-6">
						<div class="d-flex align-items-center mb-5">
							<i class="fa <?php echo $service['icon']; ?> me-3"></i>
							<h5 class="mb-0"><?php echo $service['title']; ?></h5>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<a class="btn btn-primary" href="/services">DISCOVER YOUR SOLUTION</a>
		</div>
	</section>

	<section id="testimonials">
		<div class="container-xxl">

			<h2 class="display-6 mb-4">Testimonials</h2>
			<div class="d-flex justify-content-evenly ">
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
								<p class="position m-0"><?php echo esc_html($name); ?> - <span class="fw-bold"><?php echo esc_html($position); ?></span></p>
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


	<section id="cta">
		<div class="container-xxl text-center">
			<h2 class="display-6 mb-3">Start building your website now !</h2>
			<p class="lead mb-3">
				Take the first step towards transforming your online presence. Your business deserves the magic of action.
			</p>
			<a class="btn btn-primary" href="/contact">Contact Today</a>
		</div>
	</section>






</main>


<?php
get_footer();
