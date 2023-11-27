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


	<section class="hero gradient-bg">
		<div class="container pt-5 ">
			<div class="row d-flex align-items-center">
				<div class="content col-lg-6 col-md-12 d-flex flex-column ">
					<h1 class="hero-title mb-4 ">We Believe <br> Every Business <br> Deserves a Website</h1>
					<p class="hero-subtitle mb-5">Building Affordable and Local Websites: <br> Your Best Choice for Small Business Success</p>
					<div class="">
						<a href="/contact" class="btn btn-primary  btn-lg mb-5">Request Free Consultation</a>
						<!-- <p class="text-small lead ps-2">no hidden catches, just affordable solutions for your needs.</p> -->
					</div>

				</div>
				<div class="portfolio col-lg-6 col-md-12">
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
					<div class="d-flex justify-content-between align-items-center py-3">
						<p class=" m-0">Our Latest Works </p>
						<div class="d-flex gap-2">
							<a class="pe-3" href="#portfolio-carousel" role="button" data-bs-slide="prev">
								<i class="fa-solid fa-circle-chevron-left display-5"></i>
								<span class="visually-hidden">Previous</span>
							</a>
							<a class="" href="#portfolio-carousel" role="button" data-bs-slide="next">
								<i class="fa-solid fa-circle-chevron-right display-5"></i>
								<span class="visually-hidden">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="about">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="d-none d-lg-block col-5 pe-5">
					<!-- <h2>Discover Why Businesses Trust Web-Wrapper — From Idea to Online Excellence.</h2> -->
					<p class="trust-text">"With Web-Wrapper, it's like having a helpful friend to guide you through the process.<span class="highlight"> You don't need to be tech-savvy;</span> we're here to make it easy for you."</p>
				</div>
				<div class="col-12 col-lg-7">
					<h2 class="mb-5 ">Discover why businesses trust web-wrapper <br><span> — from idea to online excellence.</span></h2>

					<div class="row trust-factors py-4">
						<!-- Item 1: 5+ Years Experience -->
						<div class="text-start">
							<div class="icon">
								<p class="larger-text">7+</p>
							</div>
							<h3 class="smaller-text">years experience</h3>
						</div>

						<!-- Item 2: Skilled Professionals -->
						<div class="text-start">
							<div class="icon">
								<p class="larger-text">Experts</p>
							</div>
							<h3 class="smaller-text">team of skilled professionals</h3>
						</div>

						<!-- Item 3: Affordable -->
						<div class="text-start">
							<div class="icon">
								<p class="larger-text">Affordable</p>
							</div>
							<h3 class="smaller-text">industry-quality starting $300.</h3>
						</div>

						<!-- Item 4: 98% Client Satisfaction -->
						<div class="text-start">
							<div class="icon">
								<p class="larger-text">100%</p>
							</div>
							<h3 class="smaller-text">client satisfaction</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="services">
		<div class="container pb-5 mb-5">
			<p class="mb-5 lead">Transform Your Online Presence with Expert Design and Maintenance Solutions</p>
			<div class="featured-services">

				<!-- Service 1: Website Design and Development -->
				<div class="card text-start">
					<div class="card-body d-flex flex-column justify-content-between">
						<div>

							<i class="fas fa-desktop fa-2x mb-3"></i>
							<h4 class="card-title">Design & Development</h4>
							<p class="card-text tiny-text">Crafting visually stunning, user-friendly websites with responsive design and integrated local SEO.</p>
						</div>
						<!-- <div>
							<a href="#design-development" class="btn btn-link">Learn More</a>
						</div> -->
					</div>
				</div>

				<!-- Service 2: Website Revamp -->
				<div class="card text-start">
					<div class="card-body d-flex flex-column justify-content-between">
						<div>

							<i class="fas fa-sync-alt fa-2x mb-3"></i>
							<h4 class="card-title">Website Revamp</h4>
							<p class="card-text tiny-text">Breathe new life into outdated websites, making them modern and functional.</p>
						</div>
						<!-- <div>
							<a href="#website-revamp" class="btn btn-link">Learn More</a>
						</div> -->
					</div>
				</div>

				<!-- Service 3: Website Maintenance -->
				<div class="card text-start">
					<div class="card-body d-flex flex-column justify-content-between">
						<div>

							<i class="fas fa-wrench fa-2x mb-3"></i>
							<h4 class="card-title">Website Maintenance</h4>
							<p class="card-text tiny-text">Ongoing services to keep your website up-to-date and running smoothly.</p>
						</div>
						<!-- <div>
							<a href="#website-maintenance" class="btn btn-link">Learn More</a>
						</div> -->
					</div>
				</div>

				<!-- Service 4: Why Choose Us? -->
				<div class="text-start">
					<div class="card-body d-flex flex-column justify-content-between">
						<div>

							<i class="fas fa-handshake fa-2x mb-3"></i>
							<h4 class="card-title">Not Sure ?</h4>
							<p class="card-text tiny-text">Contact us today for a FREE consultation. Our experts guide you through identifying and addressing your online needs.
							</p>
						</div>
						<div>
							<a href="/contact" class="btn btn-link">Contact us</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>





	<section id="website-process">
		<div class="container py-5">
			<!-- Main Title and Subtitle -->
			<div class="row mb-5 text-start text-md-center">
				<div class="col ">
					<h2 class="mb-3">Web-Wrapper's <br> - 3 Steps to Success</h2>
					<p class="lead col-12  mx-auto">Getting your website up and running is an uncomplicated process with us. <br> We're here to guide you every step of the way.</p>
				</div>
			</div>

			<!-- Three Steps Row -->
			<div class="row mb-3">
				<!-- Step 1 -->
				<div class="col-md-4 mb-4">
					<img src="<?php echo get_template_directory_uri() . '/img/steps/planning-together-coffee-shop-meeting-website-planning.jpg' ?>" alt="Step 1 Image" class="img-fluid mb-4">
					<h3 class=" mb-3">01: Planning </h3>
					<p>We'll have a chat to understand your ideas and goals. Think of it as a friendly conversation, not a technical meeting.</p>
				</div>

				<!-- Step 2 -->
				<div class="col-md-4 mb-4">
					<img src="<?php echo get_template_directory_uri() . '/img/steps/building-your-website-digital-art-team-collaboration.jpg' ?>" alt="Step 2 Image" class="img-fluid mb-4">
					<h3 class=" mb-3">02: Building</h3>
					<p>Once we understand your goals, we'll choose the best tools to create your website. You don't have to worry about the technical stuff; we'll handle it for you.</p>
				</div>

				<!-- Step 3 -->
				<div class="col-md-4 mb-4">
					<img src="<?php echo get_template_directory_uri() . '/img/steps/launching-your-site-futuristic-website-launch-celebration.jpg ' ?>" alt="Step 3 Image" class="img-fluid mb-4">
					<h3 class=" mb-3">03: Launching</h3>
					<p>When everything is ready, we'll put your website online. We'll also be there for you after the launch to keep things running smoothly.</p>
				</div>
			</div>

			<!-- CTA and Additional Text -->
			<div class="row">
				<div class="col-12 col-lg-2 mx-auto ">
					<a href="/contact" class="btn btn-primary btn-lg w-100">Let's Plan</a>
					<!-- <p class="mx-auto mt-3 col-12 col-md-8 tiny-text">Contact us today for a free consultation. Our experts will guide you through identifying and addressing your website needs, ensuring you're on the right path to a robust online presence for your business.</p> -->
				</div>
			</div>
		</div>
	</section>








	<section id="unique-features">
		<div class="container py-5">
			<!-- Main Title and Subtitle -->
			<div class="row mb-4">
				<div class="col">
					<h2 class="mb-3">Elevate Your Online Presence <br> with Our Exclusive Services</h2>
					<p class="lead">Discover what sets us apart and propels your online presence to new heights.</p>
				</div>
			</div>
			<!-- Services and Image Carousel Row -->
			<div class="row align-items-center py-4">
				<!-- Services on the Left -->
				<div class="col-md-12 col-lg-7 col-xl-6 d-flex flex-column justify-items-between ">
					<div>

						<div class="mb-5">
							<h4><i class="fas fa-camera pe-2"></i> Striking Visuals</h4>
							<p>Stand out online with visually stunning and impactful imagery. Our photography services bring your local business to life and ensure a memorable digital presence.</p>
							<!-- <a href="#learn-more-link-1">Learn More</a> -->
						</div>

						<div class="mb-5">
							<h4><i class="fas fa-tools pe-2"></i> Custom Solutions</h4>

							<p>Elevate efficiency with tailor-made internet applications designed specifically for your business. Streamline operations and save valuable time with our personalized solutions.</p>
							<!-- <a href="#learn-more-link-2">Learn More</a> -->
						</div>

						<div class="mb-5">
							<h4><i class="fab fa-whatsapp pe-2"></i> AI Whatsapp Chatbot</h4>
							<p>Experience the future of customer interaction with our AI-driven Whatsapp Chatbot. Our chatbot studies your business, engages with customers, and provides personalized responses, enhancing your customer service 24/7.</p>
							<!-- <a href="#learn-more-link-3">Learn More</a> -->
						</div>
					</div>

					<!-- CTA to Visit More Services -->
					<div class="col-12 col-lg-4 mx-auto">
						<a href="/services" class="btn btn-lg btn-primary w-100">View All Services</a>
					</div>
				</div>

				<!-- Image Carousel on the Right -->
				<div class="col-md-6 d-none d-xl-block">
					<div id="service-carousel" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<!-- Image 1 -->
							<div class="carousel-item active">
								<img src="<?php echo get_template_directory_uri() . '/img/steps/unique-services.png' ?>" class="d-block w-100" alt="Service Image 1">
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>





	<section id="testimonials">
		<div class="container py-5">
			<!-- Main Title and Subtitle -->
			<div class="row mb-5 pb-4">
				<div class="col-12 col-lg-8 mx-auto">
					<h2 class="fw-bold text-start text-md-center">
						<i class="fa-solid fa-bullhorn d-none d-md-block"></i>
						<br>
						Hear the stories <br>
						of those who
						chose <br> Web-Wrapper
					</h2>
					<!-- <p class="lead">Getting your website up and running is an uncomplicated process with Web-Wrapper. We're here to guide you every step of the way, and you don't need to be tech-savvy.</p> -->
				</div>
			</div>
			<div id="testimonialCarousel" class="carousel slide py-xl-5" data-ride="carousel">
				<div class="carousel-inner">

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

						<div class="carousel-item <?php echo esc_attr($active); ?>">
							<div class="row justify-content-xl-between align-items-xl-center">
								<div class="col-12 col-xl-7">
									<div class="star-rating">
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
									</div>
									<p class="review mb-5"><?php echo esc_html($review); ?></p>
								</div>
								<div class="col-12 col-xl-4 d-flex justify-content-start gap-3 align-items-center">
									<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($name); ?>" class="img-fluid">
									<div class="col">
										<p class="company m-0"><?php echo esc_html($company); ?></p>
										<p class="position m-0"><?php echo esc_html($name); ?> - <span class="fw-bold"><?php echo esc_html($position); ?></span></p>
									</div>
								</div>
							</div>
						</div>

					<?php
						$active = ''; // Remove 'active' class after the first iteration
					}
					?>

				</div>


			</div>

			<!-- <p class="lead m-0">Latest Works </p> -->
			<div class="d-flex gap-2 justify-content-end py-3">
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


	<section id="cta" class="bg-primary text-white text-center py-5 gradient-bg">
		<div class="container py-5">
			<h2 class="fw-bold mb-3 mb-md-2">Unlock the Magic of Online Success.</h2>
			<p class="lead mb-4 mb-5">Take the first step towards transforming your online presence. Your business deserves the magic of action.</p>
			<div class="col-12 col-lg-4 mx-auto">
				<a href="/contact" class="btn btn-light btn-lg w-100">Start Now</a>
			</div>
		</div>
	</section>


	<section id="faq" class="mt-5">
		<div class="container">
			<h2 class="fw-bold mb-5 text-center ">Frequently Asked Questions</h2>

			<div class="row">
				<!-- Left Section - Top 6 Questions -->
				<div class="col-md-6">
					<h2 class="lead mb-4">Top 6 Questions</h2>

					<!-- FAQ Accordion for Left Section -->
					<div class="accordion" id="leftFaqAccordion">

						<!-- FAQ Item 1 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading1">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse1" aria-expanded="true" aria-controls="leftFaqCollapse1">
									How can having a website benefit my small business?
								</button>
							</h2>
							<div id="leftFaqCollapse1" class="accordion-collapse collapse show" aria-labelledby="leftFaqHeading1" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									A website increases your online presence, making it easier for potential customers to find and learn about your business. It can also boost credibility and provide a platform for marketing.
								</div>
							</div>
						</div>

						<!-- FAQ Item 2 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading2">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse2" aria-expanded="false" aria-controls="leftFaqCollapse2">
									How do I choose a domain name for my business website?
								</button>
							</h2>
							<div id="leftFaqCollapse2" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading2" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									Select a domain name that is easy to remember, relevant to your business, and preferably includes your business name. Keep it short, avoid special characters, and choose a reputable domain extension.
								</div>
							</div>
						</div>

						<!-- FAQ Item 3 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading3">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse3" aria-expanded="false" aria-controls="leftFaqCollapse3">
									How much does it cost to build a business website?
								</button>
							</h2>
							<div id="leftFaqCollapse3" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading3" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									The cost of building a business website can vary. Factors include the complexity of the site, features required, and whether you hire a professional developer. DIY platforms may have lower upfront costs.
								</div>
							</div>
						</div>

						<!-- FAQ Item 4 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading4">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse4" aria-expanded="false" aria-controls="leftFaqCollapse4">
									How long does it take to build a website?
								</button>
							</h2>
							<div id="leftFaqCollapse4" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading4" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									The timeline for building a website varies. Simple sites can be completed in a few weeks, while more complex projects may take several months. Timelines also depend on factors like content and revisions.
								</div>
							</div>
						</div>

						<!-- FAQ Item 5 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading5">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse5" aria-expanded="false" aria-controls="leftFaqCollapse5">
									Can I update my website content on my own?
								</button>
							</h2>
							<div id="leftFaqCollapse5" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading5" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									Yes, many websites are built with content management systems (CMS) that allow you to update content easily. WordPress is a popular CMS that provides a user-friendly interface for content updates.
								</div>
							</div>
						</div>

						<!-- FAQ Item 6 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading6">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse6" aria-expanded="false" aria-controls="leftFaqCollapse6">
									Do I need a professional to design my website?
								</button>
							</h2>
							<div id="leftFaqCollapse6" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading6" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									While DIY website builders are available, hiring a professional can ensure a polished and effective design. Professionals can create a custom design tailored to your business and audience.
								</div>
							</div>
						</div>

						<!-- Repeat similar structure for Questions 7 to 12 -->

					</div>
				</div>
				<div class="col-md-6 mt-5 mt-md-0">
					<h2 class="lead mb-4 ">Additional Questions</h2>

					<!-- FAQ Accordion for Left Section -->
					<div class="accordion" id="leftFaqAccordion">

						<!-- FAQ Item 7 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading7">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse7" aria-expanded="false" aria-controls="leftFaqCollapse7">
									What features should I include on my business website?
								</button>
							</h2>
							<div id="leftFaqCollapse7" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading7" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									The features depend on your business, but consider essentials like an about page, contact information, product or service details, and clear navigation. Additional features may include a blog, testimonials, or an online store.
								</div>
							</div>
						</div>

						<!-- FAQ Item 8 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading8">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse8" aria-expanded="false" aria-controls="leftFaqCollapse8">
									How can I improve the security of my business website?
								</button>
							</h2>
							<div id="leftFaqCollapse8" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading8" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									Ensure your website uses HTTPS, keep software up-to-date, use strong passwords, and consider security plugins. Regularly backup your site, monitor for suspicious activity, and educate yourself on common security threats.
								</div>
							</div>
						</div>

						<!-- FAQ Item 9 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading9">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse9" aria-expanded="false" aria-controls="leftFaqCollapse9">
									Should I invest in SEO for my business website?
								</button>
							</h2>
							<div id="leftFaqCollapse9" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading9" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									Yes, investing in SEO (Search Engine Optimization) can improve your website's visibility on search engines. This can lead to increased organic traffic, better reach, and improved chances of acquiring new customers.
								</div>
							</div>
						</div>

						<!-- FAQ Item 10 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading10">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse10" aria-expanded="false" aria-controls="leftFaqCollapse10">
									How can I market my business website effectively?
								</button>
							</h2>
							<div id="leftFaqCollapse10" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading10" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									Utilize digital marketing strategies such as social media marketing, content marketing, email campaigns, and paid advertising. Consistent and targeted marketing efforts can help you reach your audience effectively.
								</div>
							</div>
						</div>

						<!-- FAQ Item 11 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading11">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse11" aria-expanded="false" aria-controls="leftFaqCollapse11">
									What is responsive web design, and why is it important?
								</button>
							</h2>
							<div id="leftFaqCollapse11" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading11" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									Responsive web design ensures your website looks and functions well on various devices and screen sizes. It's important because it enhances user experience, improves SEO, and caters to the growing use of mobile devices.
								</div>
							</div>
						</div>

						<!-- FAQ Item 12 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="leftFaqHeading12">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leftFaqCollapse12" aria-expanded="false" aria-controls="leftFaqCollapse12">
									Can I integrate social media with my business website?
								</button>
							</h2>
							<div id="leftFaqCollapse12" class="accordion-collapse collapse" aria-labelledby="leftFaqHeading12" data-bs-parent="#leftFaqAccordion">
								<div class="accordion-body">
									Yes, you can integrate social media buttons, feeds, or share options on your website. This helps in cross-promotion, building an online community, and driving traffic from social platforms to your business site.
								</div>
							</div>
						</div>


						<!-- Repeat similar structure for Questions 7 to 12 -->

					</div>
				</div>
				<!-- ... (Rest of your code) -->
			</div>
		</div>
	</section>



	<section class="blog-section d-none">
		<div class="container mb-5 ">
			<div class="row">
				<div class="d-flex mb-5 justify-content-between align-items-center">
					<h2 class="fw-bold">Popular blog posts</h2>

					<a class="btn btn-link">Explore the Web-Wrapper blogs.</a>
				</div>

				<?php
				// Assuming your blog query goes here, modify as needed
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 3, // Show top 3 posts
					'orderby'        => 'date',
					'order'          => 'DESC',
				);

				$blog_query = new WP_Query($args);

				if ($blog_query->have_posts()) :
					while ($blog_query->have_posts()) :
						$blog_query->the_post();
				?>
						<div class="col-md-4 mb-4">
							<div class="card">
								<?php
								// Featured image
								if (has_post_thumbnail()) {
									// Link the thumbnail to the blog post
									echo '<a href="' . esc_url(get_permalink()) . '">';
									the_post_thumbnail('large', ['class' => 'card-img-top', 'alt' => get_the_title()]);
									echo '</a>';
								}
								?>
								<div class="card-body">
									<!-- Blog title with link to the full post -->
									<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									<!-- Excerpt with a maximum of 20 words and an ellipsis (...) -->
									<!-- <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p> -->
									<!-- Read more button linking to the full post -->
									<a href="<?php the_permalink(); ?>" class="btn btn-link">Read More</a>
								</div>
							</div>
						</div>


				<?php
					endwhile;
					wp_reset_postdata();
				else :
					echo '<p>No blog posts found</p>';
				endif;
				?>
			</div>
		</div>
	</section>





</main>


<?php
get_footer();
