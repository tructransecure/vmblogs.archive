/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.
 */
( function( api ) {
    wp.customize( 'clean_journal_theme_options[reset_all_settings]', function( setting ) {
        setting.bind( function( value ) {
            var code = 'needs_refresh';
            if ( value ) {
                setting.notifications.add( code, new wp.customize.Notification(
                    code,
                    {
                        type: 'info',
                        message: clean_journal_misc_links.reset_message
                    }
                ) );
            } else {
                setting.notifications.remove( code );
            }
        } );
    } );

    api.controlConstructor.radio = api.Control.extend( {
        ready: function() {
            if ( 'clean_journal_theme_options[color_scheme]' === this.id ) {
                this.setting.bind( 'change', function( color_scheme ) {
                    jQuery.each( clean_journal_misc_links.color_list, function( index, value ) {
                        if ( 'light' == color_scheme ) {
                            api( index ).set( value.light );
                            api.control( index ).container.find( '.color-picker-hex' )
                            .data( 'data-default-color', value.light )
                            .wpColorPicker( 'defaultColor', value.light );
                        }
                        else if ( 'dark' == color_scheme ) {
                            api( index ).set( value.dark );
                            api.control( index ).container.find( '.color-picker-hex' )
                            .data( 'data-default-color', value.dark )
                            .wpColorPicker( 'defaultColor', value.dark );
                        }
                    });
                });
            }
        }
    });
} )( wp.customize );