<?php
function custom_meta_tags()
{
	// Output your custom meta tags
	echo '<meta name="description" content="View our portfolio at Web-Wrapper. Explore successful projects, innovative web designs, and digital solutions that have helped businesses thrive online.">';
	echo '<meta name="keywords" content="portfolio, successful projects, web design, digital solutions">';
}

// Hook into the wp_head action to add custom meta tags
add_action('wp_head', 'custom_meta_tags');

// Modify the document title
function custom_document_title_parts($title_parts)
{
	// Customize the title based on the current page
	$title_parts['title'] = "Portfolio | Web-Wrapper's Successful Projects";

	return $title_parts;
}

// Hook into the document_title_parts filter to modify the title
add_filter('document_title_parts', 'custom_document_title_parts');

get_header(); ?>

<main id="primary" class="site-main">
	<div class="container py-5 portfolio-page">

		<!-- Main Title and Subtitle -->
		<div class="row  mb-5 pb-4">
			<div class="col-12 col-lg-8 mx-auto text-center">
				<h2 class="mb-3"><span>Portfolio</span> <br> Web-Wrapper's Digital Success Stories</h2>
				<p class="lead">Explore Our Innovative and Impactful Projects</p>
			</div>
		</div>

		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
				$title = get_the_title();
				$cover_image = get_field('cover_image'); // Replace with your actual field name
				$url = get_field('url'); // Replace with your actual field name
				$description = get_field('description'); // Replace with your actual field name
		?>
				<div class="row flex-column-reverse flex-md-row mb-5 portfolio ">
					<div class="content col-md-6">
						<h3 class="mb-3 mb-md-5"><?php echo esc_html($title); ?></h3>
						<p class="mb-5"><?php echo esc_html($description); ?></p>
						<a href="<?php echo esc_url($url); ?>" target="_blank" class="text-uppercase">VISIT <?php echo str_replace('https://', '', esc_html($url));; ?> <svg data-v-67d7128c="" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="a-icon--arrow-north-east400 a-icon--text a-icon--no-align top-[0.05em] relative f-ui-1 ml-2 -mr-4" data-new="" aria-hidden="true" style="width: 1em; height: 1em;"><polygon data-v-67d7128c="" fill="currentColor" points="5 4.31 5 5.69 9.33 5.69 2.51 12.51 3.49 13.49 10.31 6.67 10.31 11 11.69 11 11.69 4.31 5 4.31"></polygon></svg></a>
					</div>
					<div class="col-md-6">
						<img src="<?php echo esc_url($cover_image); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid">
					</div>
				</div>
		<?php
			endwhile;

			// Pagination
			echo '<div class="pagination d-flex justify-content-center">';
			echo paginate_links(array(
				'total'   => $wp_query->max_num_pages,
				'current' => max(1, get_query_var('paged')),
			));
			echo '</div>';
		else :
			echo '<p>No portfolio items found.</p>';
		endif;
		?>
	</div>
	<?php get_template_part('template-parts/content', 'why'); ?>

</main>

<?php get_footer(); ?>