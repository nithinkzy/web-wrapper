<?php
/*
 * Template Name: About Page
 */
function custom_meta_tags()
{
    // Output your custom meta tags
    echo '<meta name="description" content="Learn about Web-Wrapper, a Toronto-based web agency. Committed to making websites affordable globally. Get insights into our mission, values, and dedicated team.">';
    echo '<meta name="keywords" content="web agency, Toronto, affordable websites, digital transformation, mission, values, dedicated team">';
}

// Hook into the wp_head action to add custom meta tags
add_action('wp_head', 'custom_meta_tags');

// Modify the document title
function custom_document_title_parts($title_parts)
{
    // Customize the title based on the current page
    $title_parts['title'] = "About Us | Web-Wrapper - Your Digital Transformation Partner";

    return $title_parts;
}

// Hook into the document_title_parts filter to modify the title
add_filter('document_title_parts', 'custom_document_title_parts');
get_header();
?>

<!-- Add this within your about page -->
<div class="container py-5 about-page page">

    <!-- About Title Section -->
    <div class="row text-center mb-5 pb-4">
        <div class="col-12 col-md-8 mx-auto">
            <h1 class="display-5 mb-3"><span>About Us</span> </h1>
            <p class="lead">Affordable Websites for Impact</p>
        </div>
    </div>

    <!-- First Row - Image and About Me -->
    <div class="row mb-5 align-items-center mb-5">
        <div class="col-md-6 mb-5">
            <img src="<?php echo get_template_directory_uri() . '/img/about.jpg' ?>" alt="Web-Wrapper Office" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h2 class=" mb-3">Who We Are</h2>


            <p class="">
                At Web-Wrapper, we are passionate about providing <strong>affordable web solutions</strong> from Toronto, Canada, to clients worldwide. Our mission is to empower every business with the online presence they deserve.
            </p>
            <p class="">
                We believe in making the process easy for everyone, even those without extensive IT knowledge. Our commitment extends beyond affordability, providing guidance and support to help businesses navigate the digital landscape successfully.
            </p>
        </div>
    </div>



    <!-- Second Row - Core Values -->
    <div class="row my-5 py-3 justify-content-evenly align-items-center text-center bg-white rounded values ">
        <div class="col-md-4">
            <h3 class="text-uppercase mb-3"><i class="fas fa-bullseye mb-4"></i> <br> Core Values</h3>
            <p class="lead">Innovation, Collaboration, Expertise</p>
        </div>
        <div class="col-md-4">
            <h3 class="text-uppercase mb-3"><i class="fas fa-cogs mb-4"></i> <br> Our Approach</h3>
            <p class="lead">Strategic, User-Centric, Affordable</p>
        </div>
        <div class="col-md-4">
            <h3 class="text-uppercase mb-3"><i class="fas fa-users mb-4"></i> <br> Our Team</h3>
            <p class="lead">Diverse, Dedicated, Passionate</p>
        </div>
    </div>

    <!-- Third Row - Founder -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <h2 class=" mb-3">Meet Our Founder</h2>
            <p class="">
                Founded by a seasoned <strong>full-stack developer</strong> with over 5 years of industry experience, our founder brings unparalleled expertise and passion to every project. With a focus on contributing to the success of businesses, we offer high-quality web solutions tailored to unique needs.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <a href="https://www.linkedin.com/in/foundername" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/img/founder.jpeg' ?>" alt="Founder Nithin - Web-Wrapper" class="img-fluid rounded-circle" style="width: 200px; height: 200px;">
            </a>
            <p class="mt-3">
                <a href="https://www.linkedin.com/in/founder" target="_blank" class="btn btn-outline-primary btn-lg"><i class="fab fa-linkedin"></i> Connect on LinkedIn</a>

            </p>
        </div>
    </div>

    <!-- Additional Text for Team -->
    <div class="row ">
        <div class="col-md-12">
            <h2 class=" mb-3">Our Expert Team</h2>
            <p class="">
                Behind every successful project at Web-Wrapper is a team of industry experts. Our professionals bring valuable experience from renowned companies, ensuring that we have a diverse range of expertise at our disposal. Together, we collaborate seamlessly to deliver top-notch web solutions and elevate the online presence of businesses.
            </p>
        </div>
    </div>



</div>
<?php get_template_part('template-parts/content', 'why'); ?>



<?php get_footer(); ?>