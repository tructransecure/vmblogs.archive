<?php
/**
 * The template for displaying the Featured Content
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


if( !function_exists( 'clean_journal_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook clean_journal_before_content.
*
* @since Clean Journal 0.1
*/
function clean_journal_featured_content_display() {
	clean_journal_flush_transients();

	global $post, $wp_query;

	// get data value from options
	$options 		= clean_journal_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent  ) ) {
		if( ( !$clean_journal_featured_content = get_transient( 'clean_journal_featured_content_display' ) ) ) {
			$layouts 	 = $options['featured_content_layout'];
			$headline 	 = $options['featured_content_headline'];
			$subheadline = $options['featured_content_subheadline'];

			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if( 'demo-featured-content' == $contentselect  ) {
				$classes 		.= ' demo-featured-content' ;
				$headline 		= __( 'Featured Content', 'clean-journal' );
				$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'clean-journal' );
			}
			elseif ( 'featured-page-content' == $contentselect  ) {
				$classes .= ' featured-page-content' ;
			}

			//Check Featured Content Position
			$featured_content_position = $options['featured_content_position'];

			if ( '1' == $featured_content_position ) {
				$classes .= ' border-top' ;
			}

			$clean_journal_featured_content ='
				<section id="featured-content" class="' . $classes . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$clean_journal_featured_content .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$clean_journal_featured_content .='<h2 id="featured-heading" class="entry-title">' . wp_kses_post( $headline ) . '</h2>';
								}
								if ( !empty( $subheadline ) ) {
									$clean_journal_featured_content .='<p>' . wp_kses_post( $subheadline ) . '</p>';
								}
							$clean_journal_featured_content .='</div><!-- .featured-heading-wrap -->';
						}
						$clean_journal_featured_content .='
						<div class="featured-content-wrap">';

							// Select content
							if ( 'demo-featured-content' == $contentselect   && function_exists( 'clean_journal_demo_content' ) ) {
								$clean_journal_featured_content .= clean_journal_demo_content( $options );
							}
							elseif ( 'featured-page-content' == $contentselect  && function_exists( 'clean_journal_page_content' ) ) {
								$clean_journal_featured_content .= clean_journal_page_content( $options );
							}

			$clean_journal_featured_content .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';
		set_transient( 'clean_journal_featured_content', $clean_journal_featured_content, 86940 );
		}
	echo $clean_journal_featured_content;
	}
}
endif;


if ( ! function_exists( 'clean_journal_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action clean_journal_content, clean_journal_after_secondary
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_content_display_position() {
	// Getting data from Theme Options
	$options 		= clean_journal_get_theme_options();

	$featured_content_position = $options['featured_content_position'];

	if ( '1' != $featured_content_position ) {
		add_action( 'clean_journal_before_content', 'clean_journal_featured_content_display', 40 );
	} else {
		add_action( 'clean_journal_after_content', 'clean_journal_featured_content_display', 40 );
	}

}
endif; // clean_journal_featured_content_display_position
add_action( 'clean_journal_before', 'clean_journal_featured_content_display_position' );


if ( ! function_exists( 'clean_journal_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Clean Journal 0.1
 *
 */
function clean_journal_demo_content( $options ) {
	$clean_journal_demo_content = '
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Central Park" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured1-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Central Park" href="#">Central Park</a>
					</h2>
				</header>
				<div class="entry-content">
					<p>Central Park is is the most visited urban park in the United States as well as one of the most filmed locations in the world. It was opened in 1857 and is expanded in 843 acres of city-owned land.</p>
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Home Office" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured2-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Home Office" href="#">Home Office</a>
					</h2>
				</header>
				<div class="entry-content">
					<p>It might be work, but it doesn\'t have to feel like it. All you need is a comfortable desk, nice laptop, home office furniture that keeps things organized, and the right lighting for the job.</p>
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Vespa Scooter" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured3-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Vespa Scooter" href="#">Vespa Scooter</a>
					</h2>
				</header>
				<div class="entry-content">
					<p>The Vespa Scooter has evolved from a single model motor scooter manufactured in the year 1946 by Piaggio & Co. S.p.A. of Pontedera, Italy-to a full line of scooters, today owned by Piaggio.</p>
				</div>
			</div><!-- .entry-container -->
		</article>';

	if( 'layout-four' == $options['featured_content_layout'] || 'layout-two' == $options['featured_content_layout'] ) {
		$clean_journal_demo_content .= '
		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Antique Clock" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured4-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Antique Clock" href="#">Antique Clock</a>
					</h2>
				</header>
				<div class="entry-content">
					<p>Antique clocks increase in value with the rarity of the design, their condition, and appeal in the market place. Many different materials were used in antique clocks.</p>
				</div>
			</div><!-- .entry-container -->
		</article>';
	}

	return $clean_journal_demo_content;
}
endif; // clean_journal_demo_content


if ( ! function_exists( 'clean_journal_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: clean_journal_theme_options from customizer
 *
 * @since Clean Journal 0.1
 */
function clean_journal_page_content( $options ) {
	global $post;

	$quantity 					= $options['featured_content_number'];

	$more_link_text				= $options['excerpt_more_text'];

	$show_content	= $options['featured_content_show'];

	$clean_journal_page_content 	= '';

   	$number_of_page 			= 0; 		// for number of pages

	$page_list					= array();	// list of valid pages ids

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_content_page_' . $i] ) && $options['featured_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_content_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$loop = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$i=0;
		while ( $loop->have_posts()) : $loop->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => esc_html__( 'Permalink to: ', 'clean-journal' ), 'echo' => false ) );

			$excerpt = get_the_excerpt();

			$clean_journal_page_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';
				if ( has_post_thumbnail() ) {
					$clean_journal_page_content .= '
					<figure class="featured-homepage-image">
						<a href="' . esc_url( get_permalink() ) . '" title="'.the_title( '', '', false ).'">
						'. get_the_post_thumbnail( $post->ID, 'clean-journal-featured-content', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$clean_journal_first_image = clean_journal_get_first_image( $post->ID, 'clean-journal-featured-content', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'pngfix' ) );

					if ( '' != $clean_journal_first_image ) {
						$clean_journal_page_content .= '
						<figure class="featured-homepage-image">
							<a href="' . esc_url( get_permalink() ) . '" title="'.the_title( '', '', false ).'">
								'. $clean_journal_first_image .'
							</a>
						</figure>';
					}
				}

				$clean_journal_page_content .= '
					<div class="entry-container">
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h2>
						</header>';
						if ( 'excerpt' == $show_content ) {
							$clean_journal_page_content .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
						}
						elseif ( 'full-content' == $show_content ) {
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$clean_journal_page_content .= '<div class="entry-content">' . wp_kses_post( $content ) . '</div><!-- .entry-content -->';
						}
					$clean_journal_page_content .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_postdata();
	}

	return $clean_journal_page_content;
}
endif; // clean_journal_page_content
