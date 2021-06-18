<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class clean_journal_upgrade_pro_customize {

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
		require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/upgrade-button/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'clean_journal_upgrade_pro_customize_section_pro' );

		// Register sections.
		$manager->add_section(
			new clean_journal_upgrade_pro_customize_section_pro(
				$manager,
				'upgrade_button',
				array(
					'title'    => esc_html__( 'Clean Journal Pro', 'clean-journal' ),
					'pro_text' => esc_html__( 'Upgrade Now', 'clean-journal' ),
					'pro_url'  => 'https://catchthemes.com/themes/clean-journal-pro',
					'priority' => 1
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

		wp_enqueue_script( 'catchbase-upgrade-button-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . 'inc/customizer-includes/upgrade-button/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'catchbase-upgrade-button-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . 'inc/customizer-includes/upgrade-button/customize-controls.css' );
	}
}

// Doing this customizer thang!
clean_journal_upgrade_pro_customize::get_instance();
