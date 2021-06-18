<?php
/**
 * The Template for displaying all single posts
 *
 * @package Catch Themes
 * @subpackage Clean Journal
 * @since Clean Journal 0.1 
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php 
			/** 
			 * clean_journal_after_post hook
			 *
			 * @hooked clean_journal_post_navigation - 10
			 */
			do_action( 'clean_journal_after_post' ); 
			
			/** 
			 * clean_journal_comment_section hook
			 *
			 * @hooked clean_journal_get_comment_section - 10
			 */
			do_action( 'clean_journal_comment_section' ); 
		?>
	<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>