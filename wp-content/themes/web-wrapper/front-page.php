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

get_header();
?>


<main id="primary" class="site-main">


	<section class="hero">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-6 col-md-12 d-flex flex-column ">
					<h1 class="hero-title">We Believe Every Business Deserves a Website</h1>
					<p class="hero-subtitle">Empowering Entrepreneurs and Businesses with Affordable Websites</p>
					<div class="d-flex gap-3 align-items-center">
						<a href="#consultation" class="btn btn-primary btn-lg w-25">Get Free Consultation</a>
						<p>Start for free, then get your first 3 months for $1/mo.</p>

					</div>

				</div>
				<div class="col-lg-6 col-md-12">
					<div id="portfolio-carousel" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<?php
							$args = array(
								'post_type' => 'portfolio', // Replace 'work' with the name of your custom post type
								'posts_per_page' => 4,
								'orderby' => 'date', // You can change the ordering as needed
								'order' => 'DESC',
							);

							$query = new WP_Query($args);
							$carousel_item_active = true; // Flag to determine the first item as active

							if ($query->have_posts()) :
								while ($query->have_posts()) :
									$query->the_post();

									// Get the work image URL from the custom field
									$work_image_url = get_field('cover_image'); // Assuming you are using ACF (Advanced Custom Fields)

									// Check if there's an image URL, then add it to the carousel
									if ($work_image_url) {
										$carousel_class = $carousel_item_active ? 'active' : ''; // Set 'active' class for the first item

										echo '<div class="carousel-item ' . $carousel_class . '">';
										echo '<a href="' . esc_url(get_permalink()) . '" class="work-link">';
										echo '<img src="' . esc_url($work_image_url) . '" alt="' . get_the_title() . '" class="d-block w-100">';
										echo '</a>';
										echo '</div>';

										$carousel_item_active = false; // Set the flag to false after the first item
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
			</div>
		</div>
	</section>

	<section id="about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-4 pe-5">
					<h2>Discover Why Businesses Trust Web-Wrapper — From Idea to Online Excellence.</h2>
					<p>With Web-Wrapper, it's like having a helpful friend to guide you through the process. You don't need to be tech-savvy; we're here to make it easy for you.</p>
				</div>
				<div class="col-8">
					<div class="row">
						<!-- Item 1: 5+ Years Experience -->
						<div class="col-md-6 mb-4">
							<div class="text-start">
								<div class="icon"><strong class="larger-text">5+</strong></div>
								<h3 class="smaller-text">years experience</h3>
							</div>
						</div>

						<!-- Item 2: Skilled Professionals -->
						<div class="col-md-6 mb-4">
							<div class="text-start">
								<div class="icon"><strong class="larger-text">Experts</strong></div>
								<h3 class="smaller-text">Skilled professionals in diverse technologies</h3>
							</div>
						</div>

						<!-- Item 3: Affordable -->
						<div class="col-md-6 mb-4">
							<div class="text-start">
								<div class="icon"><strong class="larger-text">Affordable</strong></div>
								<h3 class="smaller-text">Industry-leading quality at accessible rates.</h3>
							</div>
						</div>

						<!-- Item 4: 98% Client Satisfaction -->
						<div class="col-md-6 mb-4">
							<div class="text-start">
								<div class="icon"><strong class="larger-text">98%</strong></div>
								<h3 class="smaller-text">client satisfaction</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="services">
		<div class="container">
			<h3>Transform Your Online Presence with Expert Design and Maintenance Solutions</h3>
			<p>With Web-Wrapper, it's like having a helpful friend to guide you through the process. You don't need to be tech-savvy; we're here to make it easy for you.</p>
			<div class="row">

				<!-- Service 1: Website Design and Development -->
				<div class="col-md-3 mb-4">
					<div class="card text-start">
						<div class="card-body">
							<i class="fas fa-desktop fa-3x mb-3"></i>
							<h4 class="card-title">Design & Development</h4>
							<p class="card-text">Crafting visually stunning, user-friendly websites with responsive design and integrated local SEO.</p>
							<a href="#design-development" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>

				<!-- Service 2: Website Revamp -->
				<div class="col-md-3 mb-4">
					<div class="card text-start">
						<div class="card-body">
							<i class="fas fa-sync-alt fa-3x mb-3"></i>
							<h4 class="card-title">Website Revamp</h4>
							<p class="card-text">Breathe new life into outdated websites, making them modern and functional.</p>
							<a href="#website-revamp" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>

				<!-- Service 3: Website Maintenance -->
				<div class="col-md-3 mb-4">
					<div class="card text-start">
						<div class="card-body">
							<i class="fas fa-wrench fa-3x mb-3"></i>
							<h4 class="card-title">Website Maintenance</h4>
							<p class="card-text">Ongoing services to keep your website up-to-date and running smoothly.</p>
							<a href="#website-maintenance" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>

				<!-- Service 4: Why Choose Us? -->
				<div class="col-md-3 mb-4">
					<div class="card text-start">
						<div class="card-body">
							<i class="fas fa-handshake fa-3x mb-3"></i>
							<h4 class="card-title">Not Sure ?</h4>
							<p class="card-text">Contact us today for a FREE consultation. Our experts guide you through identifying and addressing your online needs.




							</p>
							<a href="#why-choose-us" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>





	<section id="website-process" class="text-center">
		<div class="container">
			<!-- Main Title and Subtitle -->
			<div class="row mb-5">
				<div class="col">
					<h2 class="fw-bold">Empower Your Business Online with Web-Wrapper</h2>
					<p class="lead">Getting your website up and running is an uncomplicated process with Web-Wrapper. We're here to guide you every step of the way, and you don't need to be tech-savvy.</p>
				</div>
			</div>

			<!-- Three Steps Row -->
			<div class="row mb-5">
				<!-- Step 1 -->
				<div class="col-md-4 mb-4">
					<img src="<?php echo get_template_directory_uri() . '/img/steps/planning-together-coffee-shop-meeting-website-planning.jpg' ?>" alt="Step 1 Image" class="img-fluid mb-3">
					<h3 class="fw-bold">Step 1: Planning Together</h3>
					<p>We'll have a chat to understand your ideas and goals. Think of it as a friendly conversation, not a technical meeting.</p>
				</div>

				<!-- Step 2 -->
				<div class="col-md-4 mb-4">
					<img src="<?php echo get_template_directory_uri() . '/img/steps/building-your-website-digital-art-team-collaboration.jpg' ?>" alt="Step 2 Image" class="img-fluid mb-3">
					<h3 class="fw-bold">Step 2: Building Your Website</h3>
					<p>Once we understand your goals, we'll choose the best tools to create your website. You don't have to worry about the technical stuff; we'll handle it for you.</p>
				</div>

				<!-- Step 3 -->
				<div class="col-md-4 mb-4">
					<img src="<?php echo get_template_directory_uri() . '/img/steps/launching-your-site-futuristic-website-launch-celebration.jpg ' ?>" alt="Step 3 Image" class="img-fluid mb-3">
					<h3 class="fw-bold">Step 3: Launching Your Site</h3>
					<p>When everything is ready, we'll put your website online. We'll also be there for you after the launch to keep things running smoothly.</p>
				</div>
			</div>

			<!-- CTA and Additional Text -->
			<div class="row">
				<div class="col">
					<a href="#contact" class="btn btn-primary btn-lg">Get Started</a>
					<p class="mt-3">Contact us today for a free consultation. Our experts will guide you through identifying and addressing your website needs, ensuring you're on the right path to a robust online presence for your business.</p>
				</div>
			</div>
		</div>
	</section>








	<section id="unique-features" class="mt-5">
		<div class="container">
			<!-- Main Title and Subtitle -->
			<div class="row mb-4">
				<div class="col">
					<h2 class="fw-bold">Discover Our Unique Features</h2>
					<p class="lead">Explore what sets us apart from the rest.</p>
				</div>
			</div>

			<!-- Services and Image Carousel Row -->
			<div class="row">
				<!-- Services on the Left -->
				<div class="col-md-6">
					<!-- Service 1: Photography Service -->
					<div class="mb-4">
						<h4>Stand Out Online with Impressive Pictures</h4>
						<p>Enhance your online presence with captivating photography. Showcase your local business or source compelling visuals for a powerful website.</p>
						<a href="#learn-more-link-1">Learn More</a>
					</div>

					<!-- Service 2: Elevate Efficiency with Custom Solutions -->
					<div class="mb-4">
						<h4>Elevate Efficiency with Custom Solutions</h4>
						<p>Unleash the power of custom internet applications tailored for your business. Streamline operations and save time with personalized solutions.</p>
						<a href="#learn-more-link-2">Learn More</a>
					</div>

					<!-- Service 3: Power Up Your Business with Silverbrush Collaboration -->
					<div class="mb-4">
						<h4>Power Up Your Business with Silverbrush Collaboration</h4>
						<p>Collaborate with Silverbrush Studio for a comprehensive transformation. From marketing to bespoke branding, achieve a cohesive and impactful brand identity.</p>
						<a href="#learn-more-link-3">Learn More</a>
					</div>

					<!-- CTA to Visit More Services -->
					<div class="mb-4">
						<p class="lead">Explore our full range of services.</p>
						<a href="#services-page" class="btn btn-primary">View All Services</a>
					</div>
				</div>

				<!-- Image Carousel on the Right -->
				<div class="col-md-6">
					<div id="service-carousel" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<!-- Image 1 -->
							<div class="carousel-item active">
								<img src="image1.jpg" class="d-block w-100" alt="Service Image 1">
							</div>

							<!-- Image 2 -->
							<div class="carousel-item">
								<img src="image2.jpg" class="d-block w-100" alt="Service Image 2">
							</div>

							<!-- Image 3 -->
							<div class="carousel-item">
								<img src="image3.jpg" class="d-block w-100" alt="Service Image 3">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>





	<section id="testimonials" class="mt-5">
		<div class="container">
			<!-- Main Title and Subtitle -->
			<div class="row mb-5">
				<div class="col">
					<h2 class="fw-bold">Discover the stories
						of those who
						chose Web-Wrapper</h2>
					<!-- <p class="lead">Getting your website up and running is an uncomplicated process with Web-Wrapper. We're here to guide you every step of the way, and you don't need to be tech-savvy.</p> -->
				</div>
			</div>
			<div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">

					<!-- Testimonial 1 -->
					<div class="carousel-item active">
						<div class="row">
							<!-- Left Section -->
							<div class="col-md-6">
								<div class="star-rating">
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
								</div>
								<p class="lead">"Web-Wrapper transformed our online presence. Their expertise and dedication are commendable."</p>
								<!-- 5 Golden Stars -->

								<p class="h6">XYZ Solutions</p>
								<p class="fw-bold">John Doe - CEO</p>
							</div>

							<!-- Right Section -->
							<div class="col-md-6">
								<img src="person1.jpg" alt="John Doe" class="img-fluid rounded-circle">
							</div>
						</div>
					</div>

					<!-- Testimonial 2 -->
					<div class="carousel-item">
						<div class="row">
							<div class="col-md-6">
								<div class="star-rating">
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
									<i class="fas fa-star text-warning"></i>
								</div>
								<p class="lead">"Outstanding service! Web-Wrapper's team is responsive and delivers top-notch results."</p>
								<p class="h6">ABC Innovations</p>
								<p class="fw-bold">Jane Smith - Marketing Director</p>
							</div>
							<div class="col-md-6">
								<img src="person2.jpg" alt="Jane Smith" class="img-fluid rounded-circle">
							</div>
						</div>
					</div>

					<!-- Testimonial 3 -->
					<div class="carousel-item">
						<div class="row">
							<div class="col-md-6">
								<p class="lead">"Web-Wrapper exceeded our expectations. They're the go-to team for web solutions."</p>
								<p class="h6">EFG Enterprises</p>
								<p class="fw-bold">Alex Johnson - IT Manager</p>
							</div>
							<div class="col-md-6">
								<img src="person3.jpg" alt="Alex Johnson" class="img-fluid rounded-circle">
							</div>
						</div>
					</div>

				</div>


			</div>
			<div class="d-flex justify-content-between align-items-center py-3">
				<p class="lead m-0">Latest Works </p>
				<div class="d-flex gap-2">
					<a class="pe-3" href="#testimonialCarousel" role="button" data-bs-slide="prev">
						<i class="fa-solid fa-circle-chevron-left display-5"></i>
						<span class="visually-hidden">Previous</span>
					</a>
					<a class="" href="#testimonialCarousel" role="button" data-bs-slide="next">
						<i class="fa-solid fa-circle-chevron-right display-5"></i>
						<span class="visually-hidden">Next</span>
					</a>
				</div>
			</div>
		</div>
	</section>


	<section id="cta" class="bg-primary text-white text-center py-4">
		<div class="container">
			<h2 class="fw-bold">Enhance Your Online Presence</h2>
			<p class="lead">Ready to elevate your business? Request a free consultation and let's discuss your goals.</p>
			<a href="#contact" class="btn btn-light btn-lg">Request Free Consultation</a>
		</div>
	</section>


	<section id="faq" class="mt-5">
		<div class="container">
			<!-- Main Title and Subtitle -->
			<div class="row mb-4">
				<div class="col">
					<h2 class="fw-bold">Frequently Asked Questions</h2>
					<p class="lead">Find answers to common queries.</p>
				</div>
			</div>

			<!-- FAQ Accordion -->
			<div class="accordion" id="faqAccordion">
				<!-- FAQ Item 1 -->
				<div class="accordion-item">
					<h2 class="accordion-header" id="faqHeading1">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
							Question 1: What services do you offer?
						</button>
					</h2>
					<div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
						<div class="accordion-body">
							Answer 1: We offer a range of services including web design, development, maintenance, photography, custom applications, and more. <a href="#contact">Contact us</a> for details.
						</div>
					</div>
				</div>

				<!-- FAQ Item 2 -->
				<div class="accordion-item">
					<h2 class="accordion-header" id="faqHeading2">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
							Question 2: How can I get started with your services?
						</button>
					</h2>
					<div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
						<div class="accordion-body">
							Answer 2: Getting started is easy! <a href="#consultation">Contact us</a> for a free consultation. Our experts will guide you through the process.
						</div>
					</div>
				</div>

				<!-- Add more FAQ items as needed -->
			</div>
		</div>
	</section>

	<section id="blog" class="mt-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="fw-bold">Popular Blogs</h2>
					<p class="lead">Stay informed with our latest insights.</p>
				</div>
			</div>

			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4,
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
			?>

					<div class="row mb-4">
						<div class="col-md-4">
							<?php if (has_post_thumbnail()) : ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
								</a>
							<?php endif; ?>
						</div>
						<div class="col-md-8">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
						</div>
					</div>

			<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo 'No blogs found.';
			endif;
			?>
		</div>
	</section>




</main>


<footer class="bg-dark text-light py-5">
	<div class="container">
		<div class="row">
			<!-- Logo and Slogan -->
			<div class="col-md-4">
				<img src="your-logo.png" alt="Your Logo" class="img-fluid mb-3">
				<p class="text-muted">Empowering Businesses with Affordable Websites</p>
			</div>

			<!-- Quick Links -->
			<div class="col-md-4">
				<h3 class="text-warning">info@example.com</h3>
				<p class="text-muted">Click to open in your mail client or save it for later.</p>
			</div>

			<!-- Free Consultation Form -->
			<div class="col-md-4">
				<h5>Get a Free Consultation</h5>
				<p>Interested in our services? Provide your contact information, and we'll reach out for a free consultation.</p>

				<form action="#" method="post">
					<div class="mb-3">
						<input type="text" class="form-control" placeholder="Your Email/Phone Number" aria-label="Your Email/Phone" required>
					</div>
					<button class="btn btn-primary" type="submit">Get Free Consultation</button>
				</form>
			</div>
		</div>

		<!-- Social Icons -->
		<div class="row mt-4">
			<div class="col-md-12">
				<h5>Connect with Us</h5>
				<!-- Add your social icons with links here -->
				<a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
				<a href="#" class="text-light me-3"><i class="fab fa-linkedin"></i></a>
				<a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
	</div>
</footer>



<?php
get_footer();
