/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementsByClassName( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	var k;
	for (k = 0; k < container.length; k++) {
		menu = container[k].getElementsByTagName( 'ul' )[0];
		if ( menu ) {
			menu.setAttribute( 'aria-expanded', 'false' );
			if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
				menu.className += ' nav-menu';
			}

			// Get all the link elements within the menu.
			links    = menu.getElementsByTagName( 'a' );

			// Each time a menu link is focused or blurred, toggle focus.
			for ( i = 0, len = links.length; i < len; i++ ) {
				links[i].addEventListener( 'focus', toggleFocus, true );
				links[i].addEventListener( 'blur', toggleFocus, true );
			}
		}
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var j;
		for (j = 0; j < container.length; j++) {
			var touchStartFn, i,
				parentLink = container[j].querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

			if ( 'ontouchstart' in window ) {
				touchStartFn = function( e ) {
					var menuItem = this.parentNode, i;

					if ( ! menuItem.classList.contains( 'focus' ) ) {
						e.preventDefault();
						for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
							if ( menuItem === menuItem.parentNode.children[i] ) {
								continue;
							}
							menuItem.parentNode.children[i].classList.remove( 'focus' );
						}
						menuItem.classList.add( 'focus' );
					} else {
						menuItem.classList.remove( 'focus' );
					}
				};

				for ( i = 0; i < parentLink.length; ++i ) {
					parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
				}
			}
		}
	}( container ) );
} )();
