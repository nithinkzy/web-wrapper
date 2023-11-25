<?php

/**
 * Template Name: Portfolio Archive
 * Description: A custom template for displaying the portfolio archive.
 */
get_header();

// The custom query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'portfolio', // Replace with your actual custom post type
    'posts_per_page' => 3,
    'paged'          => $paged,
);

$portfolio_query = new WP_Query($args);

?>
<main id="primary" class="site-main">
    <div class="container py-5 portfolio-page">

        <!-- Main Title and Subtitle -->
        <div class="row mb-5 pb-4">
            <div class="col-12 col-lg-8 mx-auto text-center">
                <h2 class="mb-3">Explore Our Portfolio</h2>
                <p class="lead">Discover a new era of digital success with Web-Wrapper. Explore our showcased projects and get inspired for your next venture.</p>
            </div>
        </div>

        <?php
        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                $title         = get_the_title();
                $cover_image   = get_field('cover_image'); // Replace with your actual field name
                $url           = get_field('url'); // Replace with your actual field name
                $description   = get_field('description'); // Replace with your actual field name
        ?>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <img src="<?php echo esc_url($cover_image); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($description); ?></p>
                        <p><a href="<?php echo esc_url($url); ?>" target="_blank" class="btn btn-primary">Visit <?php echo esc_html($title); ?></a></p>
                    </div>
                </div>
        <?php
            endwhile;

            // Pagination
            echo '<div class="pagination d-flex justify-content-center">';
            echo paginate_links(array(
                'total'   => $portfolio_query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
            ));
            echo '</div>';


            wp_reset_postdata();
        else :
            echo '<p>No portfolio items found.</p>';
        endif;

        ?>
    </div>
</main>
<?php get_footer(); ?>