/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	wp.customize( 'eli_footer_copyright_facebook', function( value ) {
	
	value.bind( function( to ) {

	if ( to ) {
		$( '#eli-footer-copyright-facebook' ).removeClass( 'hidden' );
	} else {
		$( '#eli-footer-copyright-facebook' ).addClass( 'hidden' );
	}

	});
	
});

} )( jQuery );
