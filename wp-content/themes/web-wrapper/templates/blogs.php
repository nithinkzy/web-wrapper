<?php
/*
 * Template Name: Blogs Page
 */
function custom_meta_tags()
{
    // Output your custom meta tags
    echo '<meta name="description" content="Read the latest blogs from Web-Wrapper, a Toronto-based web agency committed to making websites affordable globally. Get insights into web development, design, digital marketing, and more.">';
    echo '<meta name="keywords" content="web agency, Toronto, affordable websites, web development, web design, digital marketing">';
    // Add Open Graph meta tags for better social sharing
    echo '<meta property="og:title" content="Blogs | Web-Wrapper - Your Digital Transformation Partner">';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:url" content="' . get_permalink() . '">';
    echo '<meta property="og:description" content="Read the latest blogs from Web-Wrapper, a Toronto-based web agency committed to making websites affordable globally. Get insights into web development, design, digital marketing, and more.">';
}

// Hook into the wp_head action to add custom meta tags
add_action('wp_head', 'custom_meta_tags');

// Modify the document title
function custom_document_title_parts($title_parts)
{
    // Customize the title based on the current page
    $title_parts['title'] = "Blogs | Web-Wrapper - Your Digital Transformation Partner";

    return $title_parts;
}

// Hook into the document_title_parts filter to modify the title
add_filter('document_title_parts', 'custom_document_title_parts');
get_header();
?>
<div class="container page">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-12 text-center mb-5">
                <h1 class="display-6 mb-4"><span>Blogs</span></h1>
                <!-- <p class=" mb-4">Ready to transform your digital presence with Web-wrapper ?
            <br>
            Fantastic! simply complete the form below 😀
        </p> -->
            </div>

        <?php endwhile; ?>
    <?php endif; ?>

    <div class="row mb-2">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10 // Adjust as needed
        );
        $main_query = new WP_Query($args);
        if ($main_query->have_posts()) :
            while ($main_query->have_posts()) : $main_query->the_post();
        ?>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary-emphasis"><?php the_category(', '); ?></strong>
                            <h3 class="mb-0"><?php the_title(); ?></h3>
                            <div class="mb-1 text-body-secondary"><?php the_time('M j, Y'); ?></div>
                            <p class="card-text mb-auto"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="icon-link gap-1 icon-link-hover stretched-link">
                                Continue reading
                                <svg class="bi">
                                    <use xlink:href="#chevron-right" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-flex align-items-center">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'bd-placeholder-img', 'alt' => 'Thumbnail']); ?>
                            <?php else : ?>
                                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>


</div>
<?php
get_footer();
?>