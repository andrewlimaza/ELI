<?php
/**
 * Custom functions for Paid Memberships Pro.
 */

 // Bail from this if PMPro is not enabled.
if ( ! defined( "PMPRO_VERSION" ) ) {
 	return;
}

function my_pmpro_paypal_button_image( $url ) {
	return "https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png";
}
add_filter('pmpro_paypal_button_image', 'my_pmpro_paypal_button_image');