<?php
/**
 * The template for displaying custom menus
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


if ( ! function_exists( 'clean_journal_primary_menu' ) ) :
/**
 * Shows the Primary Menu
 *
 * default load in sidebar-header-right.php
 */
function clean_journal_primary_menu() {
    ?>
	<nav class="site-navigation nav-primary search-enabled" role="navigation">
        <div class="wrapper">
            <h3 class="assistive-text"><?php esc_html_e( 'Primary Menu', 'clean-journal' ); ?></h3>
            <?php
                if ( has_nav_menu( 'primary' ) ) {
                    $clean_journal_primary_menu_args = array(
                        'theme_location'    => 'primary',
                        'menu_class'        => 'menu clean-journal-nav-menu',
                        'container'         => false
                    );
                    wp_nav_menu( $clean_journal_primary_menu_args );
                }
                else {
                    wp_page_menu( array( 'menu_class'  => 'menu clean-journal-nav-menu' ) );
                }

                ?>
                <div id="search-toggle" class="genericon">
                    <a class="screen-reader-text" href="#search-container"><?php esc_html_e( 'Search', 'clean-journal' ); ?></a>
                </div>

                <div id="search-container" class="displaynone">
                    <?php get_Search_form(); ?>
                </div>
    	</div><!-- .wrapper -->
    </nav><!-- .nav-primary -->
    <?php
}
endif; //clean_journal_primary_menu
add_action( 'clean_journal_after_header', 'clean_journal_primary_menu', 20 );


if ( ! function_exists( 'clean_journal_secondary_menu' ) ) :
/**
 * Shows the Secondary Menu
 *
 * default load in sidebar-header-right.php
 */
function clean_journal_secondary_menu() {
    if ( has_nav_menu( 'secondary' ) ) {
	?>
    	<nav class="site-navigation nav-secondary" role="navigation">
            <div class="wrapper">
                <h3 class="assistive-text"><?php esc_html_e( 'Secondary Menu', 'clean-journal' ); ?></h3>
                <?php
                    $clean_journal_secondary_menu_args = array(
                        'theme_location'    => 'secondary',
                        'menu_class' => 'menu clean-journal-nav-menu'
                    );
                    wp_nav_menu( $clean_journal_secondary_menu_args );
                ?>
        	</div><!-- .wrapper -->
        </nav><!-- .nav-secondary -->

<?php
    }
}
endif; //clean_journal_secondary_menu
add_action( 'clean_journal_after_header', 'clean_journal_secondary_menu', 30 );


if ( ! function_exists( 'clean_journal_mobile_menus' ) ) :
/**
 * This function loads Mobile Menus
 *
 * @uses clean_journal_after action to add the code in the footer
 */
function clean_journal_mobile_menus() {
    //For primary menu, check if primary menu exists, if not, page menu
    echo '<nav id="mobile-header-left-nav" class="mobile-menu" role="navigation">';
        if ( has_nav_menu( 'primary' ) ) {
            $args = array(
                'theme_location'    => 'primary',
                'container'         => false,
                'items_wrap'        => '<ul id="header-left-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        }
        else {
            wp_page_menu( array( 'menu_class'  => 'menu' ) );
        }
    echo '</nav><!-- #mobile-header-left-nav -->';

    //For Secondary Menu
    if ( has_nav_menu( 'secondary' ) ) {
        echo '<nav id="mobile-header-right-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => 'secondary',
                'container'         => false,
                'items_wrap'        => '<ul id="header-right-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-header-right-nav -->';
    }

    // Check Header Top Menu
    if ( has_nav_menu( 'header-top' ) ) :
        echo '<nav id="mobile-header-top-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => 'header-top',
                'container'         => false,
                'items_wrap'        => '<ul id="header-top-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-header-top-nav" -->';
    endif;

}
endif; //clean_journal_mobile_menus

add_action( 'clean_journal_after', 'clean_journal_mobile_menus', 20 );


if ( ! function_exists( 'clean_journal_mobile_header_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Left Anchor
 *
 * @uses clean_journal_header action to add in the Header
 */
function clean_journal_mobile_header_nav_anchor() {

    // Header Left Mobile Menu Anchor
    if ( has_nav_menu( 'primary' ) ) {
        $classes = "mobile-menu-anchor primary-menu";
    }
    else {
        $classes = "mobile-menu-anchor page-menu";
    }
    ?>

    <div id="mobile-header-left-menu" class="<?php echo $classes; ?>">
        <a href="#mobile-header-left-nav" id="header-left-menu" class="genericon genericon-menu">
            <span class="mobile-menu-text"><?php esc_html_e( 'Menu', 'clean-journal' );?></span>
        </a>
    </div><!-- #mobile-header-menu -->
    <?php
}
endif; //clean_journal_mobile_menus
add_action( 'clean_journal_header', 'clean_journal_mobile_header_nav_anchor', 40 );


if ( ! function_exists( 'clean_journal_mobile_secondary_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Footer Anchor
 * @uses clean_journal_header action to add in the Header
 */
function clean_journal_mobile_secondary_nav_anchor() {
    if ( has_nav_menu( 'secondary' ) ) {
        ?>
        <div id="mobile-header-right-menu" class="mobile-menu-anchor secondary-menu">
            <a href="#mobile-header-right-menu" id="secondary-menu" class="genericon genericon-menu">
                <span class="mobile-menu-text"><?php esc_html_e( 'Menu', 'clean-journal' );?></span>
            </a>
        </div><!-- #mobile-header-menu -->
    <?php
    }
}
endif; //clean_journal_mobile_secondary_nav_anchor
add_action( 'clean_journal_header', 'clean_journal_mobile_secondary_nav_anchor', 50 );


if ( ! function_exists( 'clean_journal_header_top_menu' ) ) :
/**
 * Shows the Secondary Menu
 *
 * default load in sidebar-header-right.php
 */
function clean_journal_header_top_menu() {
    if ( has_nav_menu( 'header-top' ) ) {
    ?>
    <section id="header-top-menu" class="widget widget_nav_menu">
        <div class="widget-wrap">
            <div class="mobile-menu-anchor header-top-menu" id="mobile-header-top-menu">
                <a class="genericon genericon-menu" id="header-top-menu" href="#mobile-header-top-nav">
                    <span class="mobile-menu-text">Menu</span>
                </a>
            </div>
            <nav class="site-navigation nav-header-top" role="navigation">
                <div class="wrapper">
                    <h3 class="assistive-text"><?php esc_html_e( 'Header Top Menu', 'clean-journal' ); ?></h3>
                    <?php
                        $clean_journal_header_top_menu_args = array(
                            'theme_location'    => 'header-top',
                            'menu_class'        => 'menu clean-journal-nav-menu'
                        );
                        wp_nav_menu( $clean_journal_header_top_menu_args );
                    ?>
                </div><!-- .wrapper -->
            </nav><!-- .nav-header-top -->
        </div><!-- .widget-wrap -->
    </section>
<?php
    }
}
endif; //clean_journal_header_top_menu
