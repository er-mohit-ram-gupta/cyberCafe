<?php
/**
 * Cathedral functions and definitions
 *
 * @package Cathedral
 */

if ( ! function_exists( 'cathedral_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function cathedral_setup() {
	
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'cathedral', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cathedral' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	
	add_filter('use_widgets_block_editor', '__return_false');
	
	/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
}
endif; // cathedral_setup
add_action( 'after_setup_theme', 'cathedral_setup' );


function cathedral_scripts() {
	wp_enqueue_style( 'cathedral-basic-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'cathedral_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function cathedral_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'cathedral_front_page_template' );

/**
 * Customizer additions.
 */

// Block Patterns.
require get_template_directory() . '/block-patterns.php';

// Theme About Page
require get_template_directory() . '/inc/about.php';


add_filter('use_widgets_block_editor', '__return_false');



// Define the custom widget class
class Custom_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'custom_widget', // Base ID
            __('Custom Widget', 'textdomain'), // Name
            array('description' => __('A Custom Widget', 'textdomain'),) // Args
        );
    }

    // Front-end display of widget
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo __('Hello, World!', 'textdomain');
        echo $args['after_widget'];
    }

    // Back-end widget form
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'textdomain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e(esc_attr('Title:')); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    // Sanitize widget form values as they are saved
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

// Register the custom widget
function register_custom_widget() {
    register_widget('Custom_Widget');
}
add_action('widgets_init', 'register_custom_widget');

// Register the sidebar
function desktop_register_int() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'textdomain'),
        'id' => 'Sidebar-1',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'desktop_register_int');
