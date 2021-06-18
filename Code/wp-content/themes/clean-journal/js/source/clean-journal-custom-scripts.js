 /*
 * Custom scripts
 * Description: Custom scripts for journal
 */

jQuery(document).ready(function() {
	var jQueryheader_search = jQuery( '#search-toggle' );
	jQueryheader_search.on( 'click', function() {
		var jQuerythis_el_search = jQuery(this),
			jQueryform_search = jQuerythis_el_search.siblings( '#search-container' );
			
		if ( jQueryform_search.hasClass( 'displaynone' ) ) {
			jQueryform_search.removeClass( 'displaynone' ).addClass( 'displayblock' ).animate( { opacity : 1 }, 300 );
		} else {
			jQueryform_search.removeClass( 'displayblock' ).addClass( 'displaynone' ).animate( { opacity : 0 }, 300 );		
		}
	});

	//Fit vids
	if ( jQuery.isFunction( jQuery.fn.fitVids ) ) {
		jQuery('.hentry, .widget').fitVids();
	}

	//sidr
	if ( jQuery.isFunction( jQuery.fn.sidr ) ) {
		jQuery('#mobile-header-left-menu').sidr({
		   name: 'mobile-header-left-nav',
		   side: 'left' // By default
		});	
		jQuery('#mobile-header-right-menu').sidr({
		   name: 'mobile-header-right-nav',
		   side: 'right' // By default
		});
		jQuery('#mobile-header-top-menu').sidr({
		   name: 'mobile-header-top-nav',
		   side: 'left' // By default
		});	
	}
});
