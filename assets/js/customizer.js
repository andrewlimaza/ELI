/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	wp.customize( 'eli_sticky_header', function( value ) {

	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-top-navbar' ).addClass( 'sticky-top' );
		} else {
			$( '#eli-top-navbar' ).removeClass( 'sticky-top' );
		}

	} );

	} );


	wp.customize( 'eli_footer_copyright_facebook', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-facebook' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-facebook' ).addClass( 'hidden' );
		}

	} );

	} );


	wp.customize( 'eli_footer_copyright_twitter', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-twitter' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-twitter' ).addClass( 'hidden' );
		}

	} );
	
 	} );

 	wp.customize( 'eli_footer_copyright_instagram', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-instagram' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-instagram' ).addClass( 'hidden' );
		}

	} );
	
 	} );

 	wp.customize( 'eli_footer_copyright_google_plus', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-google-plus' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-google-plus' ).addClass( 'hidden' );
		}

	} );
	
 	} );

 	wp.customize( 'eli_footer_copyright_linkedin', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-linkedin' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-linkedin' ).addClass( 'hidden' );
		}

	} );
	
 	} );

 	wp.customize( 'eli_footer_copyright_dribbble', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-dribbble' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-dribbble' ).addClass( 'hidden' );
		}

	} );
	
 	} );

 	wp.customize( 'eli_footer_copyright_github', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-github' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-github' ).addClass( 'hidden' );
		}

	} );
	
 	} );

 	wp.customize( 'eli_footer_copyright_email', function( value ) {
	
	value.bind( function( to ) {

		if ( to ) {
			$( '#eli-footer-copyright-email' ).removeClass( 'hidden' );
		} else {
			$( '#eli-footer-copyright-email' ).addClass( 'hidden' );
		}

	} );
	
 	} );

} )( jQuery );
