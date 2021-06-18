<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Catch Themes
 * @subpackage Clean Journal
 * @since Clean Journal 0.1 
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<article class="error-404 not-found hentry">

			<div class="entry-container">
				
				<header class="entry-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'clean-journal' ); ?></h1>
				</header>

				<div class="entry-content">
				
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'clean-journal' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .entry-content -->

			</div><!-- .entry-container -->

		</article><!-- .error-404 -->

	</main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
