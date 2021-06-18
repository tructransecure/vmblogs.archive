<?php
/**
 * The template for displaying the Slider
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


if( !function_exists( 'clean_journal_featured_slider' ) ) :
/**
 * Add slider.
 *
 * @uses action hook clean_journal_before_content.
 *
 * @since Clean Journal 0.1
 */
function clean_journal_featured_slider() {
	global $post, $wp_query;
	//clean_journal_flush_transients();
	// get data value from options
	$options 		= clean_journal_get_theme_options();
	$enableslider 	= $options['featured_slider_option'];
	$sliderselect 	= $options['featured_slider_type'];
	$imageloader	= isset ( $options['featured_slider_image_loader'] ) ? $options['featured_slider_image_loader'] : 'true';

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	if ( 'entire-site' == $enableslider  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enableslider  ) ) {
		if( ( !$clean_journal_featured_slider = get_transient( 'clean_journal_featured_slider' ) ) ) {
			echo '<!-- refreshing cache -->';

			$clean_journal_featured_slider = '
				<section id="feature-slider">
					<div class="wrapper">
						<div class="cycle-slideshow"
						    data-cycle-log="false"
						    data-cycle-pause-on-hover="true"
						    data-cycle-swipe="true"
						    data-cycle-auto-height=container
						    data-cycle-fx="'. esc_attr( $options['featured_slide_transition_effect'] ) .'"
							data-cycle-speed="'. esc_attr( $options['featured_slide_transition_length'] ) * 1000 .'"
							data-cycle-timeout="'. esc_attr( $options['featured_slide_transition_delay'] ) * 1000 .'"
							data-cycle-loader="'. esc_attr( $imageloader ) .'"
							data-cycle-slides="> article"
							>

						    <!-- prev/next links -->
						    <div class="cycle-prev"></div>
						    <div class="cycle-next"></div>

						    <!-- empty element for pager links -->
	    					<div class="cycle-pager"></div>';

							// Select Slider
							if ( 'demo-featured-slider' == $sliderselect  && function_exists( 'clean_journal_demo_slider' ) ) {
								$clean_journal_featured_slider .=  clean_journal_demo_slider( $options );
							}
							elseif ( 'featured-page-slider' == $sliderselect  && function_exists( 'clean_journal_page_slider' ) ) {
								$clean_journal_featured_slider .=  clean_journal_page_slider( $options );
							}

			$clean_journal_featured_slider .= '
						</div><!-- .cycle-slideshow -->
					</div><!-- .wrapper -->
				</section><!-- #feature-slider -->';

			set_transient( 'clean_journal_featured_slider', $clean_journal_featured_slider, 86940 );
		}
		echo $clean_journal_featured_slider;
	}
}
endif;
add_action( 'clean_journal_before_content', 'clean_journal_featured_slider', 10 );


if ( ! function_exists( 'clean_journal_demo_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @get the data value from customizer options
 *
 * @since Clean Journal 0.1
 *
 */
function clean_journal_demo_slider( $options ) {
	$clean_journal_demo_slider ='
								<article class="post demo-image-1 hentry slides displayblock">
									<figure class="slider-image">
										<a title="Slider Image 1" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'.esc_url( get_template_directory_uri() ).'/images/gallery/slider1-1920x800.jpg" class="wp-post-image" alt="Slider Image 1" title="Slider Image 1">
										</a>
									</figure>
									<div class="entry-container">
										<header class="entry-header">
											<h2 class="entry-title">
												<a title="Slider Image 1" href="#"><span>Slider Image 1</span></a>
											</h2>
											<div class="assistive-text"><span class="post-time">Posted on <time pubdate="" datetime="2014-08-16T10:56:23+00:00" class="entry-date updated">16 August, 2014</time></span><span class="post-author">By <span class="author vcard"><a rel="author" title="View all posts by Catch Themes" href="https://catchthemes.com/blog/" class="url fn n">Catch Themes</a></span></span></div>
										</header>
										<div class="entry-content">
											<p>Slider Image 1 Content</p>
										</div>
									</div>
								</article><!-- .slides -->

								<article class="post demo-image-2 hentry slides displaynone">
									<figure class="Slider Image 2">
										<a title="Slider Image 2" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'. trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/slider2-1920x800.jpg" class="wp-post-image" alt="Slider Image 2" title="Slider Image 2">
										</a>
									</figure>
									<div class="entry-container">
										<header class="entry-header">
											<h2 class="entry-title">
												<a title="Slider Image 2" href="#"><span>Slider Image 2</span></a>
											</h2>
											<div class="assistive-text"><span class="post-time">Posted on <time pubdate="" datetime="2014-08-16T10:56:23+00:00" class="entry-date updated">16 August, 2014</time></span><span class="post-author">By <span class="author vcard"><a rel="author" title="View all posts by Catch Themes" href="https://catchthemes.com/blog/" class="url fn n">Catch Themes</a></span></span></div>
										</header>
										<div class="entry-content">
											<p>Slider Image 2 Content</p>
										</div>
									</div>
								</article><!-- .slides --> ';
	return $clean_journal_demo_slider;
}
endif; // clean_journal_demo_slider


if ( ! function_exists( 'clean_journal_page_slider' ) ) :
/**
 * This function to display featured page slider
 *
 * @param $options: clean_journal_theme_options from customizer
 *
 * @since Clean Journal 0.1
 */
function clean_journal_page_slider( $options ) {
	$quantity		= $options['featured_slide_number'];
	$more_link_text	=	$options['excerpt_more_text'];

    global $post;

    $clean_journal_page_slider = '';
    $number_of_page 		= 0; 		// for number of pages
	$page_list				= array();	// list of valid page ids

	//Get number of valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_slider_page_' . $i] ) && $options['featured_slider_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_slider_page_' . $i] ) );
		}

	}

	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$loop = new WP_Query( array(
			'posts_per_page'	=> $quantity,
			'post_type'			=> 'page',
			'post__in'			=> $page_list,
			'orderby' 			=> 'post__in'
		));
		$i=0;

		while ( $loop->have_posts()) : $loop->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => esc_html__( 'Permalink to: ', 'clean-journal' ), 'echo' => false ) );
			$excerpt = get_the_excerpt();
			if ( $i == 1 ) { $classes = 'page pageid-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'page pageid-'.$post->ID.' hentry slides displaynone'; }
			$clean_journal_page_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
				if ( has_post_thumbnail() ) {
					$clean_journal_page_slider .= '<a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">
						'. get_the_post_thumbnail( $post->ID, 'clean-journal-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'attached-page-image', 'loading' => false ) ).'
					</a>';
				}
				else {
					//Default value if there is no first image
					$clean_journal_image = '<img class="pngfix wp-post-image" src="'.esc_url( get_template_directory_uri() ).'/images/gallery/no-featured-image-1200x514.jpg" >';

					//Get the first image in page, returns false if there is no image
					$clean_journal_first_image = clean_journal_get_first_image( $post->ID, 'clean-journal-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'attached-page-image' ) );

					//Set value of image as first image if there is an image present in the page
					if ( '' != $clean_journal_first_image ) {
						$clean_journal_image =	$clean_journal_first_image;
					}

					$clean_journal_page_slider .= '<a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">
						'. $clean_journal_image .'
					</a>';
				}

				$clean_journal_page_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">'.the_title( '<span>','</span>', false ).'</a>
						</h2>
						<div class="assistive-text">'.clean_journal_page_post_meta().'</div>
					</header>';
					if( $excerpt !='') {
						$clean_journal_page_slider .= '<div class="entry-content"><p>'. $excerpt.'</p></div>';
					}
					$clean_journal_page_slider .= '
				</div><!-- .entry-container -->
			</article><!-- .slides -->';
		endwhile;

		wp_reset_postdata();
  	}
	return $clean_journal_page_slider;
}
endif; // clean_journal_page_slider
