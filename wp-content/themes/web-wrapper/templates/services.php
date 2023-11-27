<?php
/*
 * Template Name: Services Page
 */
// Add custom content to the head
function custom_meta_tags()
{
	// Output your custom meta tags
	echo '<meta name="description" content="Explore a range of services at Web-Wrapper: web design, development, SEO optimization, AI solutions, photography, and more. Tailored solutions for small to medium businesses.">';
	echo '<meta name="keywords" content="web design, website development, SEO optimization, AI solutions, photography services, business solutions">';
}

// Hook into the wp_head action to add custom meta tags
add_action('wp_head', 'custom_meta_tags');

// Modify the document title
function custom_document_title_parts($title_parts)
{
	// Customize the title based on the current page
	$title_parts['title'] = "Our Services | Web Design, Development, SEO, and More";

	return $title_parts;
}

// Hook into the document_title_parts filter to modify the title
add_filter('document_title_parts', 'custom_document_title_parts');

get_header();

$services = array(
	array(
		'icon' => 'fa-desktop',
		'title' => 'Web Design and Development',
		'description' => 'Craft visually stunning and user-friendly websites that captivate your audience.',
	),
	array(
		'icon' => 'fa-camera',
		'title' => 'Professional Photography Services',
		'description' => 'Elevate your brand imagery with professional photography services.',
	),
	array(
		'icon' => 'fa-robot',
		'title' => 'AI WhatsApp Bot Development',
		'description' => 'Transform customer engagement with AI-driven WhatsApp bots for personalized interactions.',
	),
	array(
		'icon' => 'fa-shopping-cart',
		'title' => 'E-Commerce Solutions',
		'description' => 'Maximize online sales with SEO-optimized and user-friendly e-commerce platforms.',
	),
	array(
		'icon' => 'fa-chart-line',
		'title' => 'Data Analytics for Informed Decisions',
		'description' => 'Harness the power of data to make informed decisions and identify trends.',
	),
	array(
		'icon' => 'fa-cogs',
		'title' => 'Custom Software Development for Efficiency',
		'description' => 'Empower your business with tailor-made software solutions for efficiency.',
	),
	array(
		'icon' => 'fa-refresh',
		'title' => 'Website Revamp and Ongoing Maintenance',
		'description' => 'Revitalize your digital presence with our website revamp services and ensure ongoing maintenance for optimal performance.',
	),
	array(
		'icon' => 'fa-search-location',
		'title' => 'Local SEO Optimization for Visibility',
		'description' => 'Boost your local visibility with our specialized Local SEO optimization services. Stand out in local searches and attract nearby customers effectively.',
	),
	array(
		'icon' => 'fa-wrench',
		'title' => 'Custom Tools for Business Efficiency',
		'description' => 'Optimize your business processes with our bespoke tools. From unique software solutions to tailored applications, we empower your business with custom tools.',
	),
	array(
		'icon' => 'fa-lightbulb',
		'title' => 'Expert IT Consulting and Advice',
		'description' => 'Navigate the dynamic tech landscape with confidence. Our IT experts provide insightful advice and guidance, ensuring your business decisions align with SEO principles for digital success.',
	),
	array(
		'icon' => 'fa-search',
		'title' => 'Website Auditing for Enhanced Performance',
		'description' => 'Optimize your website for better performance with our comprehensive audits. Identify areas for improvement, both in appearance and traffic, enhancing your Google search rankings.',
	),
	array(
		'icon' => 'fa-star',
		'title' => 'Google Review Improvement',
		'description' => 'Enhance your online reputation with our Google Review Improvement service. We help businesses manage and improve their online reviews, boosting their overall rating and visibility.',
	),
);
?>

<div class="container py-5 services-page">

	<!-- Main Title and Subtitle -->
	<div class="row mb-5 pb-4">
		<div class="col-12 col-lg-8 mx-auto text-center">
			<h2 class="mb-3"> <span>Our Services</span> <br> Web Design, Development, SEO, and More</h2>
			<p class="lead">Tailored Solutions for Small to Medium Businesses</p>
		</div>
	</div>

	<!-- Services Section -->
	<div class="row g-4 mb-5 d-none d-md-flex">

		<?php



		foreach ($services as $service) {
		?>

			<div class="col-md-6 col-lg-4">
				<div class="card h-100">
					<div class="card-body">
						<i class="fas <?php echo esc_attr($service['icon']); ?> fa-3x text-primary mb-5"></i>
						<h5 class="card-title  mb-3"><?php echo esc_html($service['title']); ?></h5>
						<p class="card-text"><?php echo esc_html($service['description']); ?></p>
					</div>
				</div>
			</div>

		<?php } ?>

	</div>

	<!-- Services Section -->
	<div class="accordion d-md-none" id="servicesAccordion">

		<?php

		foreach ($services as $index => $service) {
		?>

			<div class="accordion-item">
				<h2 class="accordion-header" id="serviceHeading<?php echo $index; ?>">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#serviceCollapse<?php echo $index; ?>" aria-expanded="true" aria-controls="serviceCollapse<?php echo $index; ?>">
						<i class="fas <?php echo esc_attr($service['icon']); ?> fa-2x text-primary mb-2 pe-3"></i>
						<?php echo esc_html($service['title']); ?>
					</button>
				</h2>
				<div id="serviceCollapse<?php echo $index; ?>" class="accordion-collapse collapse <?php echo ($index === 0) ? 'show' : ''; ?>" aria-labelledby="serviceHeading<?php echo $index; ?>" data-bs-parent="#servicesAccordion">
					<div class="accordion-body">
						<p><?php echo esc_html($service['description']); ?></p>
					</div>
				</div>
			</div>

		<?php } ?>

	</div>



</div>
<?php get_template_part('template-parts/content', 'why'); ?>

<?php get_footer(); ?>