<?php
/**
* The template for adding additional theme options in Customizer
*
* @package Catch Themes
* @subpackage Clean Journal
* @since Clean Journal 0.1
*/

// Additional Color Scheme (added to Color Scheme section in Theme Customizer)
if ( ! defined( 'CLEAN_JOURNAL_THEME_VERSION' ) ) {
header( 'Status: 403 Forbidden' );
header( 'HTTP/1.1 403 Forbidden' );
exit();
}


//Theme Options
$wp_customize->add_panel( 'clean_journal_theme_options', array(
    'description'    => esc_html__( 'Basic theme Options', 'clean-journal' ),
    'capability'     => 'edit_theme_options',
    'priority'       => 200,
    'title'    		 => esc_html__( 'Theme Options', 'clean-journal' ),
) );


// Breadcrumb Option
$wp_customize->add_section( 'clean_journal_breadcumb_options', array(
	'description'	=> esc_html__( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'clean-journal' ),
	'panel'			=> 'clean_journal_theme_options',
	'title'    		=> esc_html__( 'Breadcrumb Options', 'clean-journal' ),
	'priority' 		=> 201,
) );

$wp_customize->add_setting( 'clean_journal_theme_options[breadcumb_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcumb_option'],
	'sanitize_callback' => 'clean_journal_sanitize_checkbox'
) );

$wp_customize->add_control( 'clean_journal_theme_options[breadcumb_option]', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb', 'clean-journal' ),
	'section'  => 'clean_journal_breadcumb_options',
	'settings' => 'clean_journal_theme_options[breadcumb_option]',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[breadcumb_onhomepage]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcumb_onhomepage'],
	'sanitize_callback' => 'clean_journal_sanitize_checkbox'
) );

$wp_customize->add_control( 'clean_journal_theme_options[breadcumb_onhomepage]', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb on Homepage', 'clean-journal' ),
	'section'  => 'clean_journal_breadcumb_options',
	'settings' => 'clean_journal_theme_options[breadcumb_onhomepage]',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[breadcumb_seperator]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcumb_seperator'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'clean_journal_theme_options[breadcumb_seperator]', array(
		'input_attrs' => array(
            'style' => 'width: 40px;'
        	),
        'label'    	=> esc_html__( 'Separator between Breadcrumbs', 'clean-journal' ),
		'section' 	=> 'clean_journal_breadcumb_options',
		'settings' 	=> 'clean_journal_theme_options[breadcumb_seperator]',
		'type'     	=> 'text'
	)
);
	// Breadcrumb Option End

/**
 * Do not show Custom CSS option from WordPress 4.7 onwards
 * @remove when WP 5.0 is released
 */
if ( !function_exists( 'wp_update_custom_css_post' ) ) {
	// Custom CSS Option
	$wp_customize->add_section( 'clean_journal_custom_css', array(
		'description'	=> esc_html__( 'Custom/Inline CSS', 'clean-journal'),
		'panel'  		=> 'clean_journal_theme_options',
		'priority' 		=> 203,
		'title'    		=> esc_html__( 'Custom CSS Options', 'clean-journal' ),
	) );

	$wp_customize->add_setting( 'clean_journal_theme_options[custom_css]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['custom_css'],
		'sanitize_callback' => 'clean_journal_sanitize_custom_css',
	) );

	$wp_customize->add_control( 'clean_journal_theme_options[custom_css]', array(
			'label'		=> esc_html__( 'Enter Custom CSS', 'clean-journal' ),
	        'priority'	=> 1,
			'section'   => 'clean_journal_custom_css',
	        'settings'  => 'clean_journal_theme_options[custom_css]',
			'type'		=> 'textarea',
	) );
	// Custom CSS End
}


	// Excerpt Options
$wp_customize->add_section( 'clean_journal_excerpt_options', array(
	'panel'  	=> 'clean_journal_theme_options',
	'priority' 	=> 204,
	'title'    	=> esc_html__( 'Excerpt Options', 'clean-journal' ),
) );

$wp_customize->add_setting( 'clean_journal_theme_options[excerpt_length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_length'],
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( 'clean_journal_theme_options[excerpt_length]', array(
	'description' => esc_html__('Excerpt length. Default is 55 words', 'clean-journal'),
	'input_attrs' => array(
        'min'   => 10,
        'max'   => 200,
        'step'  => 5,
        'style' => 'width: 60px;'
        ),
    'label'    => esc_html__( 'Excerpt Length (words)', 'clean-journal' ),
	'section'  => 'clean_journal_excerpt_options',
	'settings' => 'clean_journal_theme_options[excerpt_length]',
	'type'	   => 'number',
)	);


$wp_customize->add_setting( 'clean_journal_theme_options[excerpt_more_text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_more_text'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'clean_journal_theme_options[excerpt_more_text]', array(
	'label'    => esc_html__( 'Read More Text', 'clean-journal' ),
	'section'  => 'clean_journal_excerpt_options',
	'settings' => 'clean_journal_theme_options[excerpt_more_text]',
	'type'	   => 'text',
) );
// Excerpt Options End

//Homepage / Frontpage Options
$wp_customize->add_section( 'clean_journal_homepage_options', array(
	'description'	=> esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'clean-journal' ),
	'panel'			=> 'clean_journal_theme_options',
	'priority' 		=> 209,
	'title'   	 	=> esc_html__( 'Homepage / Frontpage Options', 'clean-journal' ),
) );

$wp_customize->add_setting( 'clean_journal_theme_options[front_page_category]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['front_page_category'],
	'sanitize_callback'	=> 'clean_journal_sanitize_category_list',
) );

$wp_customize->add_control( new Clean_Journal_Customize_Dropdown_Categories_Control( $wp_customize, 'clean_journal_theme_options[front_page_category]', array(
    'label'   	=> esc_html__( 'Select Categories', 'clean-journal' ),
    'name'	 	=> 'clean_journal_theme_options[front_page_category]',
	'priority'	=> '6',
    'section'  	=> 'clean_journal_homepage_options',
    'settings' 	=> 'clean_journal_theme_options[front_page_category]',
    'type'     	=> 'dropdown-categories',
) ) );
//Homepage / Frontpage Settings End


// Layout Options
$wp_customize->add_section( 'clean_journal_layout', array(
	'capability'=> 'edit_theme_options',
	'panel'		=> 'clean_journal_theme_options',
	'priority'	=> 211,
	'title'		=> esc_html__( 'Layout Options', 'clean-journal' ),
) );

$wp_customize->add_setting( 'clean_journal_theme_options[theme_layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['theme_layout'],
	'sanitize_callback' => 'clean_journal_sanitize_select',
) );

$wp_customize->add_control( 'clean_journal_theme_options[theme_layout]', array(
	'choices'	=> clean_journal_layouts(),
	'label'		=> esc_html__( 'Default Layout', 'clean-journal' ),
	'section'	=> 'clean_journal_layout',
	'settings'   => 'clean_journal_theme_options[theme_layout]',
	'type'		=> 'select',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[content_layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['content_layout'],
	'sanitize_callback' => 'clean_journal_sanitize_select',
) );

$wp_customize->add_control( 'clean_journal_theme_options[content_layout]', array(
	'choices'   => clean_journal_get_archive_content_layout(),
	'label'		=> esc_html__( 'Archive Content Layout', 'clean-journal' ),
	'section'   => 'clean_journal_layout',
	'settings'  => 'clean_journal_theme_options[content_layout]',
	'type'      => 'select',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[single_post_image_layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['single_post_image_layout'],
	'sanitize_callback' => 'clean_journal_sanitize_select',
) );

$wp_customize->add_control( 'clean_journal_theme_options[single_post_image_layout]', array(
		'label'		=> esc_html__( 'Single Page/Post Image Layout ', 'clean-journal' ),
		'section'   => 'clean_journal_layout',
        'settings'  => 'clean_journal_theme_options[single_post_image_layout]',
        'type'	  	=> 'select',
		'choices'  	=> clean_journal_single_post_image_layout_options(),
) );
	// Layout Options End

// Pagination Options
$pagination_type	= $options['pagination_type'];

$clean_journal_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%1$s">WP-PageNavi Plugin</a>.<br/>Infinite Scroll Options requires <a target="_blank" href="%2$s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'clean-journal' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );

/**
 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled
 */
if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
	if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
		$clean_journal_navigation_description = sprintf( __( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'clean-journal' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );
	}
	else {
		$clean_journal_navigation_description = '';
	}
}
/**
* Check if navigation type is numeric and if Wp-PageNavi Plugin is enabled
*/
else if ( 'numeric' == $pagination_type ) {
	if ( !function_exists( 'wp_pagenavi' ) ) {
		$clean_journal_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.', 'clean-journal' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ) );
	}
	else {
		$clean_journal_navigation_description = '';
	}
}

$wp_customize->add_section( 'clean_journal_pagination_options', array(
	'description'	=> $clean_journal_navigation_description,
	'panel'  		=> 'clean_journal_theme_options',
	'priority'		=> 212,
	'title'    		=> esc_html__( 'Pagination Options', 'clean-journal' ),
) );

$wp_customize->add_setting( 'clean_journal_theme_options[pagination_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['pagination_type'],
	'sanitize_callback' => 'sanitize_key',
) );

$wp_customize->add_control( 'clean_journal_theme_options[pagination_type]', array(
	'choices'  => clean_journal_get_pagination_types(),
	'label'    => esc_html__( 'Pagination type', 'clean-journal' ),
	'section'  => 'clean_journal_pagination_options',
	'settings' => 'clean_journal_theme_options[pagination_type]',
	'type'	   => 'select',
) );
// Pagination Options End

//Promotion Headline Options
$wp_customize->add_section( 'clean_journal_promotion_headline_options', array(
	'description'	=> esc_html__( 'To disable the fields, simply leave them empty.', 'clean-journal' ),
	'panel'			=> 'clean_journal_theme_options',
	'priority' 		=> 213,
	'title'   	 	=> esc_html__( 'Promotion Headline Options', 'clean-journal' ),
) );

$wp_customize->add_setting( 'clean_journal_theme_options[promotion_headline_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['promotion_headline_option'],
	'sanitize_callback' => 'clean_journal_sanitize_select',
) );

$wp_customize->add_control( 'clean_journal_theme_options[promotion_headline_option]', array(
	'choices'  	=> clean_journal_featured_slider_content_options(),
	'label'    	=> esc_html__( 'Enable Promotion Headline on', 'clean-journal' ),
	'priority'	=> '0.5',
	'section'  	=> 'clean_journal_promotion_headline_options',
	'settings' 	=> 'clean_journal_theme_options[promotion_headline_option]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[promotion_headline]', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline'],
	'sanitize_callback'	=> 'wp_kses_post'
) );

$wp_customize->add_control( 'clean_journal_theme_options[promotion_headline]', array(
	'description'	=> esc_html__( 'Appropriate Words: 10', 'clean-journal' ),
	'label'    	=> esc_html__( 'Promotion Headline Text', 'clean-journal' ),
	'priority'	=> '1',
	'section' 	=> 'clean_journal_promotion_headline_options',
	'settings'	=> 'clean_journal_theme_options[promotion_headline]',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[promotion_subheadline]', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_subheadline'],
	'sanitize_callback'	=> 'wp_kses_post'
) );

$wp_customize->add_control( 'clean_journal_theme_options[promotion_subheadline]', array(
	'description'	=> esc_html__( 'Appropriate Words: 15', 'clean-journal' ),
	'label'    	=> esc_html__( 'Promotion Subheadline Text', 'clean-journal' ),
	'priority'	=> '2',
	'section' 	=> 'clean_journal_promotion_headline_options',
	'settings'	=> 'clean_journal_theme_options[promotion_subheadline]',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[promotion_headline_button]', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline_button'],
	'sanitize_callback'	=> 'sanitize_text_field'
) );

$wp_customize->add_control( 'clean_journal_theme_options[promotion_headline_button]', array(
	'description'	=> esc_html__( 'Appropriate Words: 3', 'clean-journal' ),
	'label'    	=> esc_html__( 'Promotion Headline Button Text ', 'clean-journal' ),
	'priority'	=> '3',
	'section' 	=> 'clean_journal_promotion_headline_options',
	'settings'	=> 'clean_journal_theme_options[promotion_headline_button]',
	'type'		=> 'text',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[promotion_headline_url]', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline_url'],
	'sanitize_callback'	=> 'esc_url_raw'
) );

$wp_customize->add_control( 'clean_journal_theme_options[promotion_headline_url]', array(
	'label'    	=> esc_html__( 'Promotion Headline Link', 'clean-journal' ),
	'priority'	=> '4',
	'section' 	=> 'clean_journal_promotion_headline_options',
	'settings'	=> 'clean_journal_theme_options[promotion_headline_url]',
	'type'		=> 'text',
) );

$wp_customize->add_setting( 'clean_journal_theme_options[promotion_headline_target]', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline_target'],
	'sanitize_callback' => 'clean_journal_sanitize_checkbox',
) );

$wp_customize->add_control( 'clean_journal_theme_options[promotion_headline_target]', array(
	'label'    	=> esc_html__( 'Check to Open Link in New Window/Tab', 'clean-journal' ),
	'priority'	=> '5',
	'section'  	=> 'clean_journal_promotion_headline_options',
	'settings' 	=> 'clean_journal_theme_options[promotion_headline_target]',
	'type'     	=> 'checkbox',
) );
// Promotion Headline Options End

// Scrollup
$wp_customize->add_section( 'clean_journal_scrollup', array(
	'panel'    => 'clean_journal_theme_options',
	'priority' => 215,
	'title'    => esc_html__( 'Scrollup Options', 'clean-journal' ),
) );

$wp_customize->add_setting( 'clean_journal_theme_options[disable_scrollup]', array(
	'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['disable_scrollup'],
	'sanitize_callback' => 'clean_journal_sanitize_checkbox',
) );

$wp_customize->add_control( 'clean_journal_theme_options[disable_scrollup]', array(
	'label'		=> esc_html__( 'Check to disable Scroll Up', 'clean-journal' ),
	'section'   => 'clean_journal_scrollup',
    'settings'  => 'clean_journal_theme_options[disable_scrollup]',
	'type'		=> 'checkbox',
) );
// Scrollup End

// Search Options
$wp_customize->add_section( 'clean_journal_search_options', array(
	'description'=> esc_html__( 'Change default placeholder text in Search.', 'clean-journal'),
	'panel'  => 'clean_journal_theme_options',
	'priority' => 216,
	'title'    => esc_html__( 'Search Options', 'clean-journal' ),
) );

$wp_customize->add_setting( 'clean_journal_theme_options[search_text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['search_text'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'clean_journal_theme_options[search_text]', array(
	'label'		=> esc_html__( 'Default Display Text in Search', 'clean-journal' ),
	'section'   => 'clean_journal_search_options',
    'settings'  => 'clean_journal_theme_options[search_text]',
	'type'		=> 'text',
) );
// Search Options End
//Theme Option End
