<?php
/**
 * Classic Internet Services functions and definitions
 *
 * @package Classic Internet Services
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'classic_internet_services_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_internet_services_setup() {
	global $content_width;   
	if ( ! isset( $content_width ) )
		$content_width = 680; 

	load_theme_textdomain( 'classic-internet-services', get_template_directory() . '/languages' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-header', array( 
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'classic-internet-services' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
} 
endif; // classic_internet_services_setup
add_action( 'after_setup_theme', 'classic_internet_services_setup' );

function classic_internet_services_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' , ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function classic_internet_services_widgets_init() {
	register_sidebar( array( 
		'name'          => __( 'Blog Sidebar', 'classic-internet-services' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-internet-services' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'classic-internet-services' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'classic-internet-services' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'classic-internet-services' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'classic-internet-services' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'classic-internet-services' ),
		'description'   => __( 'Appears on shop page', 'classic-internet-services' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'classic-internet-services' ),
		'description'   => __( 'Appears on footer', 'classic-internet-services' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'classic-internet-services' ),
		'description'   => __( 'Appears on footer', 'classic-internet-services' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'classic-internet-services' ),
		'description'   => __( 'Appears on footer', 'classic-internet-services' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'classic-internet-services' ),
		'description'   => __( 'Appears on footer', 'classic-internet-services' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'classic_internet_services_widgets_init' );

function classic_internet_services_scripts() {
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'classic-internet-services-basic-style', get_stylesheet_uri() );
	wp_style_add_data('classic-internet-services-basic-style', 'rtl', 'replace');
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'classic-internet-services-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'classic-internet-services-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'classic-internet-services-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'classic-internet-services-basic-style',$classic_internet_services_color_scheme_css );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font family
	$headings_font = esc_html(get_theme_mod('classic_internet_services_headings_fonts'));
	$body_font = esc_html(get_theme_mod('classic_internet_services_body_fonts'));

	if ($headings_font) {
	    wp_enqueue_style('classic-internet-services-headings', 'https://fonts.googleapis.com/css?family=' . urlencode($headings_font));
	} else {
	    wp_enqueue_style('hind-headings', 'https://fonts.googleapis.com/css?family=Hind:wght@300;400;500;600;700');
	}

	if ($body_font) {
	    wp_enqueue_style('classic-internet-services-body', 'https://fonts.googleapis.com/css?family=' . urlencode($body_font));
	} else {
	    wp_enqueue_style('hind-body', 'https://fonts.googleapis.com/css?family=Hind:wght@300;400;500;600;700');
	}

}
add_action( 'wp_enqueue_scripts', 'classic_internet_services_scripts' );


require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

// select
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';

// Footer Link
define('CLASSIC_INTERNET_SERVICES_FOOTER_LINK',__('https://www.theclassictemplates.com/products/free-internet-provider-wordpress-theme/','classic-internet-services'));

if ( ! defined( 'CLASSIC_INTERNET_SERVICES_THEME_PAGE' ) ) {
define('CLASSIC_INTERNET_SERVICES_THEME_PAGE',__('https://www.theclassictemplates.com/collections/all','classic-internet-services'));
}
if ( ! defined( 'CLASSIC_INTERNET_SERVICES_SUPPORT' ) ) {
define('CLASSIC_INTERNET_SERVICES_SUPPORT',__('https://wordpress.org/support/theme/classic-internet-services/','classic-internet-services'));
}
if ( ! defined( 'CLASSIC_INTERNET_SERVICES_REVIEW' ) ) {
define('CLASSIC_INTERNET_SERVICES_REVIEW',__('https://wordpress.org/support/theme/classic-internet-services/reviews/#new-post','classic-internet-services'));
}
if ( ! defined( 'CLASSIC_INTERNET_SERVICES_PRO_DEMO' ) ) {
define('CLASSIC_INTERNET_SERVICES_PRO_DEMO',__('https://live.theclassictemplates.com/classic-internet-services-pro/','classic-internet-services'));
}
if ( ! defined( 'CLASSIC_INTERNET_SERVICES_PREMIUM_PAGE' ) ) {
define('CLASSIC_INTERNET_SERVICES_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/internet-service-provider-wordpres-theme/','classic-internet-services'));
}
if ( ! defined( 'CLASSIC_INTERNET_SERVICES_THEME_DOCUMENTATION' ) ) {
define('CLASSIC_INTERNET_SERVICES_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/classic-internet-services-free/','classic-internet-services'));
}

/* Starter Content */
add_theme_support( 'starter-content', array(
	'widgets' => array(
		'footer-1' => array(
			'categories',
		),
		'footer-2' => array(
			'archives',
		),
		'footer-3' => array(
			'meta',
		),
		'footer-4' => array(
			'search',
		),
	),
));
    
if ( ! function_exists( 'classic_internet_services_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function classic_internet_services_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/*radio button sanitization*/
function classic_internet_services_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

if ( ! function_exists( 'classic_internet_services_sanitize_integer' ) ) {
	function classic_internet_services_sanitize_integer( $input ) {
		return (int) $input;
	}
}