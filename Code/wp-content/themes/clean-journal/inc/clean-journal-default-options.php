<?php
/**
 * Implement Default Theme/Customizer Options
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


/**
 * Returns the default options for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_get_default_theme_options() {

	$default_theme_options = array(
		//Site Title an Tagline
		'logo'												=> trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/headers/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,
		'move_title_tagline'								=> 0,

		//Layout
		'theme_layout' 										=> 'right-sidebar',
		'content_layout'									=> 'excerpt-image-left',
		'single_post_image_layout'							=> 'disabled',

		//Header Image
		'enable_featured_header_image'						=> 'disabled',
		'featured_image_size'								=> 'full',
		'featured_header_image_url'							=> '',
		'featured_header_image_alt'							=> '',
		'featured_header_image_base'						=> 0,

		//Breadcrumb Options
		'breadcumb_option'									=> 0,
		'breadcumb_onhomepage'								=> 0,
		'breadcumb_seperator'								=> '&raquo;',

		//Custom CSS
		'custom_css'										=> '',

		//Scrollup Options
		'disable_scrollup'									=> 0,

		//Excerpt Options
		'excerpt_length'									=> '55',
		'excerpt_more_text'									=> esc_html__( 'Read More ...', 'clean-journal' ),

		//Homepage / Frontpage Settings
		'front_page_category'								=> '0',

		//Pagination Options
		'pagination_type'									=> 'default',

		//Promotion Headline Options
		'promotion_headline_option'							=> 'disabled',
		'promotion_headline_type'							=> 'promotion-headline-content',
		'promotion_headline'								=> esc_html__( 'Clean Journal is a Premium Responsive WordPress Theme', 'clean-journal' ),
		'promotion_subheadline'								=> esc_html__( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'clean-journal' ),
		'promotion_headline_button'							=> esc_html__( 'Reviews', 'clean-journal' ),
		'promotion_headline_url'							=> esc_url( 'http://wordpress.org/support/view/theme-reviews/journal' ),
		'promotion_headline_target'							=> 1,

		//Search Options
		'search_text'										=> esc_html__( 'Search...', 'clean-journal' ),

		//Basic Color Options
		'color_scheme' 										=> 'light',
		'background_color'									=> '#f9f9f9',
		'header_textcolor'									=> '#111111',

		//Featured Content Options
		'featured_content_option'							=> 'homepage',
		'featured_content_layout'							=> 'layout-three',
		'featured_content_position'							=> 0,
		'featured_content_headline'							=> esc_html__( 'Featured Content', 'clean-journal' ),
		'featured_content_subheadline'						=> esc_html__( 'Here you can showcase the x number of Featured Content.', 'clean-journal' ),
		'featured_content_type'								=> 'demo-featured-content',
		'featured_content_number'							=> '3',
		'featured_content_show'								=> 'excerpt',

		//Featured Slider Options
		'featured_slider_option'							=> 'homepage',
		'featured_slider_image_loader'						=> 'true',
		'featured_slide_transition_effect'					=> 'fadeout',
		'featured_slide_transition_delay'					=> '4',
		'featured_slide_transition_length'					=> '1',
		'featured_slider_type'								=> 'demo-featured-slider',
		'featured_slide_number'								=> '4',

		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	return apply_filters( 'clean_journal_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of color schemes registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_color_schemes() {
	$color_scheme_options = array(
		'light' => esc_html__( 'Light', 'clean-journal' ),
		'dark'  => esc_html__( 'Dark', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> esc_html__( 'Primary Sidebar, Content', 'clean-journal' ),
		'right-sidebar' => esc_html__( 'Content, Primary Sidebar', 'clean-journal' ),
		'no-sidebar'	=> esc_html__( 'No Sidebar ( Content Width )', 'clean-journal' ),
	);
	return apply_filters( 'clean_journal_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-image-left' => esc_html__( 'Show Excerpt', 'clean-journal' ),
		'full-content'       => esc_html__( 'Show Full Content (No Featured Image)', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Clean Journal 0.1
 */
function clean_journal_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage'               => esc_html__( 'Homepage / Frontpage', 'clean-journal' ),
		'exclude-home'           => esc_html__( 'Excluding Homepage', 'clean-journal' ),
		'exclude-home-page-post' => esc_html__( 'Excluding Homepage, Page/Post Featured Image', 'clean-journal' ),
		'entire-site'            => esc_html__( 'Entire Site', 'clean-journal' ),
		'entire-site-page-post'  => esc_html__( 'Entire Site, Page/Post Featured Image', 'clean-journal' ),
		'pages-posts'            => esc_html__( 'Pages and Posts', 'clean-journal' ),
		'disabled'               => esc_html__( 'Disabled', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_image_size_options() {
	$featured_image_size_options = array(
		'full'   => esc_html__( 'Full Image', 'clean-journal' ),
		'large'  => esc_html__( 'Large Image', 'clean-journal' ),
		'slider' => esc_html__( 'Slider Image', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and slider layout options registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> esc_html__( 'Homepage / Frontpage', 'clean-journal' ),
		'entire-site' 	=> esc_html__( 'Entire Site', 'clean-journal' ),
		'disabled'		=> esc_html__( 'Disabled', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of feature content types registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => esc_html__( 'Demo', 'clean-journal' ),
		'featured-page-content' => esc_html__( 'Page', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-three' => esc_html__( '3 columns', 'clean-journal' ),
		'layout-four'  => esc_html__( '4 columns', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_featured_content_layout_options', $featured_content_layout_option );
}


/**
 * Returns an array of featured content show registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt' 		=> esc_html__( 'Show Excerpt', 'clean-journal' ),
		'full-content' 	=> esc_html__( 'Show Full Content', 'clean-journal' ),
		'hide-content' 	=> esc_html__( 'Hide Content', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_featured_content_show', $featured_content_show_option );
}


/**
 * Returns an array of feature slider types registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => esc_html__( 'Demo', 'clean-journal' ),
		'featured-page-slider' => esc_html__( 'Page', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_featured_slider_types', $featured_slider_types );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_slide_transition_effects() {
	$featured_slide_transition_effects = array(
		'fade' 		=> esc_html__( 'Fade', 'clean-journal' ),
		'fadeout' 	=> esc_html__( 'Fade Out', 'clean-journal' ),
		'none' 		=> esc_html__( 'None', 'clean-journal' ),
		'scrollHorz'=> esc_html__( 'Scroll Horizontal', 'clean-journal' ),
		'scrollVert'=> esc_html__( 'Scroll Vertical', 'clean-journal' ),
		'flipHorz'	=> esc_html__( 'Flip Horizontal', 'clean-journal' ),
		'flipVert'	=> esc_html__( 'Flip Vertical', 'clean-journal' ),
		'tileSlide'	=> esc_html__( 'Tile Slide', 'clean-journal' ),
		'tileBlind'	=> esc_html__( 'Tile Blind', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_featured_slide_transition_effects', $featured_slide_transition_effects );
}


/**
 * Returns an array of featured slider image loader options
 *
 * @since Clean Journal 2.1
 */
function clean_journal_featured_slider_image_loader() {
	$color_scheme_options = array(
		'true'  => esc_html__( 'True', 'clean-journal' ),
		'wait'  => esc_html__( 'Wait', 'clean-journal' ),
		'false' => esc_html__( 'False', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of color schemes registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_get_pagination_types() {
	$pagination_types = array(
		'default'                => esc_html__( 'Default(Older Posts/Newer Posts)', 'clean-journal' ),
		'numeric'                => esc_html__( 'Numeric', 'clean-journal' ),
		'infinite-scroll-click'  => esc_html__( 'Infinite Scroll (Click)', 'clean-journal' ),
		'infinite-scroll-scroll' => esc_html__( 'Infinite Scroll (Scroll)', 'clean-journal' ),
	);

	return apply_filters( 'clean_journal_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'featured'  => esc_html__( 'Featured', 'clean-journal' ),
		'full-size' => esc_html__( 'Full Size', 'clean-journal' ),
		'disabled'  => esc_html__( 'Disabled', 'clean-journal' ),
	);
	return apply_filters( 'clean_journal_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Clean Journal 0.1
*/
function clean_journal_get_social_icons_list() {
	$clean_journal_social_icons_list = array(
		'facebook_link'		=> array(
			'genericon_class' 	=> 'facebook-alt',
			'label' 			=> esc_html__( 'Facebook', 'clean-journal' )
			),
		'twitter_link'		=> array(
			'genericon_class' 	=> 'twitter',
			'label' 			=> esc_html__( 'Twitter', 'clean-journal' )
			),
		'googleplus_link'	=> array(
			'genericon_class' 	=> 'googleplus-alt',
			'label' 			=> esc_html__( 'Googleplus', 'clean-journal' )
			),
		'email_link'		=> array(
			'genericon_class' 	=> 'mail',
			'label' 			=> esc_html__( 'Email', 'clean-journal' )
			),
		'feed_link'			=> array(
			'genericon_class' 	=> 'feed',
			'label' 			=> esc_html__( 'Feed', 'clean-journal' )
			),
		'wordpress_link'	=> array(
			'genericon_class' 	=> 'wordpress',
			'label' 			=> esc_html__( 'WordPress', 'clean-journal' )
			),
		'github_link'		=> array(
			'genericon_class' 	=> 'github',
			'label' 			=> esc_html__( 'GitHub', 'clean-journal' )
			),
		'linkedin_link'		=> array(
			'genericon_class' 	=> 'linkedin',
			'label' 			=> esc_html__( 'LinkedIn', 'clean-journal' )
			),
		'pinterest_link'	=> array(
			'genericon_class' 	=> 'pinterest',
			'label' 			=> esc_html__( 'Pinterest', 'clean-journal' )
			),
		'flickr_link'		=> array(
			'genericon_class' 	=> 'flickr',
			'label' 			=> esc_html__( 'Flickr', 'clean-journal' )
			),
		'vimeo_link'		=> array(
			'genericon_class' 	=> 'vimeo',
			'label' 			=> esc_html__( 'Vimeo', 'clean-journal' )
			),
		'youtube_link'		=> array(
			'genericon_class' 	=> 'youtube',
			'label' 			=> esc_html__( 'YouTube', 'clean-journal' )
			),
		'tumblr_link'		=> array(
			'genericon_class' 	=> 'tumblr',
			'label' 			=> esc_html__( 'Tumblr', 'clean-journal' )
			),
		'instagram_link'	=> array(
			'genericon_class' 	=> 'instagram',
			'label' 			=> esc_html__( 'Instagram', 'clean-journal' )
			),
		'polldaddy_link'	=> array(
			'genericon_class' 	=> 'polldaddy',
			'label' 			=> esc_html__( 'PollDaddy', 'clean-journal' )
			),
		'codepen_link'		=> array(
			'genericon_class' 	=> 'codepen',
			'label' 			=> esc_html__( 'CodePen', 'clean-journal' )
			),
		'path_link'			=> array(
			'genericon_class' 	=> 'path',
			'label' 			=> esc_html__( 'Path', 'clean-journal' )
			),
		'dribbble_link'		=> array(
			'genericon_class' 	=> 'dribbble',
			'label' 			=> esc_html__( 'Dribbble', 'clean-journal' )
			),
		'skype_link'		=> array(
			'genericon_class' 	=> 'skype',
			'label' 			=> esc_html__( 'Skype', 'clean-journal' )
			),
		'digg_link'			=> array(
			'genericon_class' 	=> 'digg',
			'label' 			=> esc_html__( 'Digg', 'clean-journal' )
			),
		'reddit_link'		=> array(
			'genericon_class' 	=> 'reddit',
			'label' 			=> esc_html__( 'Reddit', 'clean-journal' )
			),
		'stumbleupon_link'	=> array(
			'genericon_class' 	=> 'stumbleupon',
			'label' 			=> esc_html__( 'Stumbleupon', 'clean-journal' )
			),
		'pocket_link'		=> array(
			'genericon_class' 	=> 'pocket',
			'label' 			=> esc_html__( 'Pocket', 'clean-journal' ),
			),
		'dropbox_link'		=> array(
			'genericon_class' 	=> 'dropbox',
			'label' 			=> esc_html__( 'DropBox', 'clean-journal' ),
			),
		'spotify_link'		=> array(
			'genericon_class' 	=> 'spotify',
			'label' 			=> esc_html__( 'Spotify', 'clean-journal' ),
			),
		'foursquare_link'	=> array(
			'genericon_class' 	=> 'foursquare',
			'label' 			=> esc_html__( 'Foursquare', 'clean-journal' ),
			),
		'twitch_link'		=> array(
			'genericon_class' 	=> 'twitch',
			'label' 			=> esc_html__( 'Twitch', 'clean-journal' ),
			),
		'website_link'		=> array(
			'genericon_class' 	=> 'website',
			'label' 			=> esc_html__( 'Website', 'clean-journal' ),
			),
		'phone_link'		=> array(
			'genericon_class' 	=> 'phone',
			'label' 			=> esc_html__( 'Phone', 'clean-journal' ),
			),
		'handset_link'		=> array(
			'genericon_class' 	=> 'handset',
			'label' 			=> esc_html__( 'Handset', 'clean-journal' ),
			),
		'cart_link'			=> array(
			'genericon_class' 	=> 'cart',
			'label' 			=> esc_html__( 'Cart', 'clean-journal' ),
			),
		'cloud_link'		=> array(
			'genericon_class' 	=> 'cloud',
			'label' 			=> esc_html__( 'Cloud', 'clean-journal' ),
			),
		'link_link'		=> array(
			'genericon_class' 	=> 'link',
			'label' 			=> esc_html__( 'Link', 'clean-journal' ),
			),
	);

	return apply_filters( 'clean_journal_social_icons_list', $clean_journal_social_icons_list );
}


/**
 * Returns an array of metabox layout options registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'clean-journallayout-option',
			'value' => 'default',
			'label' => esc_html__( 'Default', 'clean-journal' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'clean-journallayout-option',
			'value' => 'left-sidebar',
			'label' => esc_html__( 'Primary Sidebar, Content', 'clean-journal' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'clean-journallayout-option',
			'value' => 'right-sidebar',
			'label' => esc_html__( 'Content, Primary Sidebar', 'clean-journal' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'clean-journallayout-option',
			'value' => 'no-sidebar',
			'label' => esc_html__( 'No Sidebar ( Content Width )', 'clean-journal' ),
		),
	);
	return apply_filters( 'clean_journal_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'clean-journalheader-image',
			'value' 	=> 'default',
			'label' 	=> esc_html__( 'Default', 'clean-journal' ),
		),
		'enable' => array(
			'id'		=> 'clean-journalheader-image',
			'value' 	=> 'enable',
			'label' 	=> esc_html__( 'Enable', 'clean-journal' ),
		),
		'disable' => array(
			'id'		=> 'clean-journalheader-image',
			'value' 	=> 'disable',
			'label' 	=> esc_html__( 'Disable', 'clean-journal' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox featured image options registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'clean-journalfeatured-image',
			'value' 	=> 'default',
			'label' 	=> esc_html__( 'Default', 'clean-journal' ),
		),
		'featured' => array(
			'id'		=> 'clean-journalfeatured-image',
			'value' 	=> 'featured',
			'label' 	=> esc_html__( 'Featured Image', 'clean-journal' )
		),
		'full-size' => array(
			'id' => 'clean-journalfeatured-image',
			'value' => 'full-size',
			'label' => esc_html__( 'Full Image', 'clean-journal' )
		),
		'disable' => array(
			'id' => 'clean-journalfeatured-image',
			'value' => 'disable',
			'label' => esc_html__( 'Disable Image', 'clean-journal' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns clean_journal_contents registered for journal.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_get_content() {
	$theme_data = wp_get_theme();

	$clean_journal_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved. %3$s', '1: Year, 2: Site Title with home URL 3: Privacy Policy Link
', 'clean-journal' ), esc_attr( date_i18n( __( 'Y', 'clean-journal' ) ) ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>', get_the_privacy_policy_link() );

	$clean_journal_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'clean-journal' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'clean_journal_get_content', $clean_journal_content );
}


/**
 * Returns the default options for Clean Journal dark theme.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_default_dark_color_options() {
	$default_dark_color_options = array(
		//Basic Color Options
		'background_color'	=> '#333333',
		'header_textcolor'	=> '#dddddd',
	);

	return apply_filters( 'clean_journal_default_dark_color_options', $default_dark_color_options );
}
