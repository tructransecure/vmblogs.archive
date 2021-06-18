<?php
/**
 * The Sidebar containing the primary widget area
 *
 * @package Catch Themes
 * @subpackage Clean Journal
 * @since Clean Journal 0.1
 */
?>

<?php
/**
 * clean_journal_before_secondary hook
 */
do_action( 'clean_journal_before_secondary' );

$clean_journal_layout = clean_journal_get_theme_layout();

if( 'no-sidebar' == $clean_journal_layout ) {
	return;
}

do_action( 'clean_journal_before_primary_sidebar' );
?>

	<aside class="sidebar sidebar-primary widget-area" role="complementary">
	<?php
	//Primary Sidebar
	if ( is_active_sidebar( 'primary-sidebar' ) ) {
    	dynamic_sidebar( 'primary-sidebar' );
	}
	else {
		//Helper Text
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section id="widget-default-text" class="widget widget_text">
				<div class="widget-wrap">
                	<h4 class="widget-title"><?php esc_html_e( 'Primary Sidebar Widget Area', 'clean-journal' ); ?></h4>

           			<div class="textwidget">
                   		<p><?php esc_html_e( 'This is the Primary Sidebar Widget Area if you are using a two or three column site layout option.', 'clean-journal' ); ?></p>
                   		<p><?php printf( __( 'By default it will load Search and Archives widgets as shown below. You can add widget to this area by visiting your <a href="%s">Widgets Panel</a> which will replace default widgets.', 'clean-journal' ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
                 	</div>
           		</div><!-- .widget-wrap -->
       		</section><!-- #widget-default-text -->
		<?php
		} ?>
		<section class="widget widget_search" id="default-search">
			<div class="widget-wrap">
				<?php get_search_form(); ?>
			</div><!-- .widget-wrap -->
		</section><!-- #default-search -->
		<section class="widget widget_archive" id="default-archives">
			<div class="widget-wrap">
				<h4 class="widget-title"><?php esc_html_e( 'Archives', 'clean-journal' ); ?></h4>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</div><!-- .widget-wrap -->
		</section><!-- #default-archives -->
		<?php
	} ?>
	</aside><!-- .sidebar sidebar-primary widget-area -->

<?php
/**
 * clean_journal_after_primary_sidebar hook
 */
do_action( 'clean_journal_after_primary_sidebar' );


/**
 * clean_journal_after_secondary hook
 *
 */
do_action( 'clean_journal_after_secondary' );
