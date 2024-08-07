<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Elemento_IT_Solutions_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/includes/go-pro/upgrade-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Elemento_IT_Solutions_Customize_Section_Pro' );

		$manager->add_section(
			new Elemento_IT_Solutions_Customize_Section_Pro(
				$manager,
				'elemento_it_solutions_upgrade_pro',
				array(
					'title'       => esc_html__( 'Elemento IT Solutions Pro', 'elemento-it-solutions' ),
					'pro_text'    => esc_html__( 'GET PRO', 'elemento-it-solutions' ),
					'pro_url'     => 'https://www.wpelemento.com/products/it-solutions-wordpress-theme',
					'priority'    => 5,
				)
			)
		);

		$manager->add_section(
			new Elemento_IT_Solutions_Customize_Section_Pro(
				$manager,
				'elemento-it-solutions-documentation',
				array(
					'title'       => esc_html__( 'Documentation', 'elemento-it-solutions' ),
					'pro_text'    => esc_html__( 'DOCS', 'elemento-it-solutions' ),
					'pro_url'     => 'https://preview.wpelemento.com/theme-documentation/elemento-it-solutions/',
					'priority'    => 5,
				)
			)
		);

		$manager->add_section(
			new Elemento_IT_Solutions_Customize_Section_Pro(
				$manager,
				'elemento-it-solutions-demo',
				array(
					'title'       => esc_html__( 'Pro Demo link', 'elemento-it-solutions' ),
					'pro_text'    => esc_html__( 'Demo', 'elemento-it-solutions' ),
					'pro_url'     => 'https://preview.wpelemento.com/elemento-it-solutions/',
					'priority'    => 5,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'elemento-it-solutions-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'elemento-it-solutions-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Elemento_IT_Solutions_Customize::get_instance();