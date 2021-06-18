<?php
/**
 * The template for displaying the footer
 *
 * @package Catch Themes
 * @subpackage Clean Journal
 * @since Clean Journal 0.1 
 */
?>

<?php 
    /** 
     * clean_journal_after_content hook
     *
     * @hooked clean_journal_content_sidebar_wrap_end - 10
     * @hooked clean_journal_content_end - 30
     * @hooked clean_journal_featured_content_display (move featured content below homepage posts) - 40 
     *
     */
    do_action( 'clean_journal_after_content' ); 
?>
            
<?php                
    /** 
     * clean_journal_footer hook
     *
     * @hooked clean_journal_footer_content_start - 30
     * @hooked clean_journal_footer_sidebar - 40
     * @hooked clean_journal_get_footer_content - 100
     * @hooked clean_journal_footer_content_end - 110
     * @hooked clean_journal_page_end - 200
     *
     */
    do_action( 'clean_journal_footer' );
?>

<?php               
/** 
 * clean_journal_after hook
 *
 * @hooked clean_journal_scrollup - 10
 * @hooked clean_journal_mobile_menus- 20
 *
 */
do_action( 'clean_journal_after' );?>

<?php wp_footer(); ?>

</body>
</html>