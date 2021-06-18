<?php
/**
 * The template for adding Customizer Custom Controls
 *
 * @package Catch Themes
 * @subpackage Clean Journal
 * @since Clean Journal 0.1
 */

if ( ! defined( 'CLEAN_JOURNAL_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
	//Custom control for dropdown category multiple select
	class Clean_Journal_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
		public $type = 'dropdown-categories';

		public $name;

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'             => $this->name,
					'echo'             => 0,
					'hide_empty'       => false,
					'show_option_none' => false,
					'hide_if_empty'    => false,
					'show_option_all'  => esc_html__( 'All Categories', 'clean-journal' )
				)
			);

			$dropdown = str_replace('<select', '<select multiple = "multiple" style = "height:95px;" ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',esc_html( $this->label ), $dropdown ); // WPCS: XSS OK.
			echo '<p class="description">'. __( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'clean-journal' ) . '</p>';
		}
	}

	//Custom control for dropdown category multiple select
	class Clean_Journal_Important_Links extends WP_Customize_Control {
        public $type = 'important-links';

        public function render_content() {
        	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
            $important_links = array(
							'theme_instructions' => array(
								'link'	=> esc_url( 'https://catchthemes.com/theme-instructions/journal/' ),
								'text' 	=> esc_html__( 'Theme Instructions', 'clean-journal' ),
								),
							'support' => array(
								'link'	=> esc_url( 'https://catchthemes.com/support/' ),
								'text' 	=> esc_html__( 'Support', 'clean-journal' ),
								),
							'changelog' => array(
								'link'	=> esc_url( 'https://catchthemes.com/changelogs/clean-journal-theme/' ),
								'text' 	=> esc_html__( 'Changelog', 'clean-journal' ),
								),
							'donate' => array(
								'link'	=> esc_url( 'https://catchthemes.com/donate/' ),
								'text' 	=> esc_html__( 'Donate Now', 'clean-journal' ),
								),
							'review' => array(
								'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/clean-journal' ),
								'text' 	=> esc_html__( 'Review', 'clean-journal' ),
								),
							);
			foreach ( $important_links as $important_link) {
				echo '<p><a target="_blank" href="' . $important_link['link'] .'" >' . esc_attr( $important_link['text'] ) .' </a></p>';
			}
        }
    }
