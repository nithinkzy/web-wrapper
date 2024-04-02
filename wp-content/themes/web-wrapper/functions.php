<?php

/**
 * web-wrapper functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package web-wrapper
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function web_wrapper_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on web-wrapper, use a find and replace
		* to change 'web-wrapper' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('web-wrapper', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'web-wrapper'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'web_wrapper_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'web_wrapper_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function web_wrapper_content_width()
{
	$GLOBALS['content_width'] = apply_filters('web_wrapper_content_width', 640);
}
add_action('after_setup_theme', 'web_wrapper_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function web_wrapper_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'web-wrapper'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'web-wrapper'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'web_wrapper_widgets_init');


// Enqueue Bootstrap NavWalker
/**
 * Enqueue scripts and styles.
 */
function web_wrapper_scripts()
{
	// Enqueue styles
	wp_enqueue_style('wrapper-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
	wp_enqueue_style('swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_style('wrapper-main', get_template_directory_uri() . '/css/main.css');

	// Set RTL
	wp_style_add_data('wrapper-style', 'rtl', 'replace');

	// Enqueue jquery scripts
	wp_deregister_script('jquery'); // deregisters the default WordPress jQuery  
	wp_register_script('jquery', ("https://code.jquery.com/jquery-3.6.0.min.js"), false);
	wp_enqueue_script('jquery');



	// Bootstrap
	wp_enqueue_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js', array('jquery'), null, true);
	// wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js', array('jquery'));
	wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js', array('jquery', 'bootstrap-popper'), null, true);

	// Custom Script
	// wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js');
	// wp_enqueue_script('ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/ScrollTrigger.min.js');
	wp_enqueue_script('lenis', 'https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js');
	// wp_enqueue_script('split-type', 'https://cdn.jsdelivr.net/npm/split-type@0.3.4/umd/index.min.js');
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
	wp_enqueue_script('wrapper-script', get_template_directory_uri() . '/js/script.js', array('swiper'));

	wp_localize_script('wrapper-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

	// Enqueue comment reply script if needed
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'web_wrapper_scripts');


/**
 * Custom Fonts
 * font-family: 'Montserrat', sans-serif;
font-family: 'Raleway', sans-serif;
font-family: 'Raleway Dots', sans-serif;
 */
function enqueue_custom_fonts()
{
	if (!is_admin()) {
		wp_register_style('Martel_Sans_&_Spectral', 'https://fonts.googleapis.com/css2?family=Martel+Sans:wght@200;300;400;600;700;800;900&family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

		wp_enqueue_style('Martel_Sans_&_Spectral');
	}
}
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Include Bootstrap NavWalker
require_once get_template_directory() . '/bootstrap-navwalker.php';

add_action('wp_ajax_process_contact_form', 'process_contact_form');
add_action('wp_ajax_nopriv_process_contact_form', 'process_contact_form');

function process_contact_form()
{

	if (isset($_POST['formData'])) {

		parse_str($_POST['formData'], $form_data);

		// Process your email sending logic here
		$to = "devworldofn@gmail.com,nithinkzy@gmail.com,support@web-wrapper.com";
		$subject = "New Contact Form Submission - " . $form_data['name'];
		$body = "Hello,\n\n";
		$body .= "You have received a new contact form submission with the following details:\n\n";
		$body .= "Name: {$form_data['name']}\n";
		$body .= "Email: {$form_data['email']}\n";
		$body .= "Message:\n{$form_data['message']}\n\n";
		$body .= "Please respond to the inquiry as soon as possible.\n\n";
		$body .= "Thank you,\nYour Company Name";

		// Use appropriate mail headers
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: Web-wrapper Contact Page <support@web-wrapper.com>";

		// Send email
		if (wp_mail($to, $subject, $body, $headers)) {
			// Email sent successfully
			echo "Congrats and Thanks for contacting us! We will get back to you soon.";
		} else {
			// Email sending failed
			echo "Sorry, something went wrong. Please try again later.";
		}
	} else {
		// If data is not received, show an error message
		echo "Invalid data received.";
	}

	// Always exit to avoid extra output
	wp_die();
}

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
		'icon' => 'fa-solid fa-robot',
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
