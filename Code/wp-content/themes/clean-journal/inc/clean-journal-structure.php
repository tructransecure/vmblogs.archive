<?php
/**
 * The template for Managing Theme Structure
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


if ( ! function_exists( 'clean_journal_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'clean_journal_doctype', 'clean_journal_doctype', 10 );


if ( ! function_exists( 'clean_journal_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'clean_journal_before_wp_head', 'clean_journal_head', 10 );


if ( ! function_exists( 'clean_journal_doctype_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_page_start() {
		?>
		<div id="page" class="hfeed site">
			<a href="#content" class="skip-link screen-reader-text"><?php esc_html_e( 'Skip to content', 'clean-journal' ); ?></a>
		<?php
	}
endif;
add_action( 'clean_journal_header', 'clean_journal_page_start', 10 );


if ( ! function_exists( 'clean_journal_header_top' ) ) :
	/**
	 * Header Top Area
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_header_top() {
		if ( '' == ( $clean_journal_social_icons = clean_journal_get_social_icons() ) && !has_nav_menu( 'header-top' ) ) {
			//Helper Text
		    if ( current_user_can( 'edit_theme_options' ) ) { ?>
		        <div id="header-top" class="header-top-bar">
		            <div class="wrapper">
		                <div class="header-top-left full-width">
		                    <section id="widget-default-text" class="widget widget_text header_top_widget_area">
		                        <div class="widget-wrap">
		                            <div class="textwidget">
		                                <p><?php esc_html_e( 'This is Header Top Area. Assign Header Top Menu and Social Icons from Theme Customizer', 'clean-journal' ); ?></p>
		                            </div>
		                        </div><!-- .widget-wrap -->
		                    </section><!-- #widget-default-text -->
		                </div><!-- .header-top-left -->
		            </div><!-- .wrapper -->
		        </div><!-- #header-top -->
		    <?php
		    }
		}
		else {
			if ( '' != ( $clean_journal_social_icons = clean_journal_get_social_icons() ) && has_nav_menu( 'header-top' ) ) {
				$classes = 'normal-width';
			}
			else {
				$classes = 'full-width';
			}
			?>
			<div id="header-top" class="header-top-bar">
				<div class="wrapper">
					<?php if ( has_nav_menu( 'header-top' ) ) { ?>
						<div class="header-top-left <?php echo $classes; ?>">
							<?php clean_journal_header_top_menu(); ?>
						</div>
					<?php
					} ?>
			       	<?php if ( '' != ( $clean_journal_social_icons = clean_journal_get_social_icons() ) ) { ?>
			       		<div class="header-top-right <?php echo $classes; ?>">
							<section class="widget widget_clean_journal_social_icons" id="header-right-social-icons">
								<div class="widget-wrap">
									<?php echo $clean_journal_social_icons; ?>
								</div><!-- .widget-wrap -->
							</section><!-- #header-right-social-icons -->
						</div><!-- .header-top-right -->
					<?php
					} ?>
			    </div><!-- .wrapper -->
			</div><!-- #header-top -->
			<?php
		}
	}
endif;
add_action( 'clean_journal_header', 'clean_journal_header_top', 20 );


if ( ! function_exists( 'clean_journal_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'clean_journal_footer', 'clean_journal_page_end', 200 );


if ( ! function_exists( 'clean_journal_header_start' ) ) :
	/**
	 * Start Header id #masthead and class .wrapper
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_header_start() {
		?>
		<header id="masthead" role="banner">
    		<div class="wrapper">
		<?php
	}
endif;
add_action( 'clean_journal_header', 'clean_journal_header_start', 30 );


if ( ! function_exists( 'clean_journal_header_end' ) ) :
	/**
	 * End Header id #masthead and class .wrapper
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'clean_journal_header', 'clean_journal_header_end', 100 );


if ( ! function_exists( 'clean_journal_content_start' ) ) :
	/**
	 * Start div id #content and class .wrapper
	 *
	 * @since Clean Journal 0.1
	 *
	 */
	function clean_journal_content_start() {
		?>
		<div id="content" class="site-content">
			<div class="wrapper">
	<?php
	}
endif;
add_action('clean_journal_content', 'clean_journal_content_start', 10 );

if ( ! function_exists( 'clean_journal_content_end' ) ) :
	/**
	 * End div id #content and class .wrapper
	 *
	 * @since Clean Journal 0.1
	 */
	function clean_journal_content_end() {
		?>
			</div><!-- .wrapper -->
	    </div><!-- #content -->
		<?php
	}

endif;
add_action( 'clean_journal_after_content', 'clean_journal_content_end', 30 );


if ( ! function_exists( 'clean_journal_footer_content_start' ) ) :
/**
 * Start footer id #colophon
 *
 * @since Clean Journal 0.1
 */
function clean_journal_footer_content_start() {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
}
endif;
add_action( 'clean_journal_footer', 'clean_journal_footer_content_start', 30 );


if ( ! function_exists( 'clean_journal_footer_sidebar' ) ) :
/**
 * Footer Sidebar
 *
 * @since Clean Journal 0.1
 */
function clean_journal_footer_sidebar() {
	get_sidebar( 'footer' );
}
endif;
add_action( 'clean_journal_footer', 'clean_journal_footer_sidebar', 40 );


if ( ! function_exists( 'clean_journal_footer_content_end' ) ) :
/**
 * End footer id #colophon
 *
 * @since Clean Journal 0.1
 */
function clean_journal_footer_content_end() {
	?>
	</footer><!-- #colophon -->
	<?php
}
endif;
add_action( 'clean_journal_footer', 'clean_journal_footer_content_end', 110 );


if ( ! function_exists( 'clean_journal_header_right' ) ) :
/**
 * Shows Header Right Social Icon
 *
 * @since Clean Journal 0.1
 */
function clean_journal_header_right() { ?>
	<aside class="sidebar sidebar-header-right widget-area">
		<section class="widget widget_search" id="header-right-search">
			<div class="widget-wrap">
				<?php echo get_search_form(); ?>
			</div>
		</section>
	</aside><!-- .sidebar .header-sidebar .widget-area -->
<?php
}
endif;
add_action( 'clean_journal_header', 'clean_journal_header_right', 70 );
