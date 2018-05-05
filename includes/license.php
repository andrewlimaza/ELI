<?php
/**
 * License handler for Yoohoo Plugins/Themes
 */

class Yoohoo_License_Handler{


	public function __construct() {

		// Admin hooks.
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

	}

	public function admin_menu() {

		add_submenu_page( 
			'options-general.php', 
			__( 'Licensing', 'eli' ), 
			__( 'Licensing', 'eli' ),
			'manage_options', 
			'yoohoo-license', 
			array( $this, 'some_function' ) 
		);
	}

	public function some_function() {
		require_once( ELI_DIR . '/includes/license-settings-page.php' );
	}

	public static function is_key_valid( $license_key ){

		$r = false;

		$response = wp_remote_get( 'https://license.yoohoothemes.com?validate_key=' . esc_attr( $license_key ) );
		if ( is_array( $response ) && ! is_wp_error( $response ) ) {
		  $body = json_decode( $response['body'] ); // use the content

		  //check body stuff now if okay, show everything okay and store a transient.
			if ( ! empty( $body ) ) {
		  		if ( ( $body->used < $body->uses ) && 'active' == $body->status && $license_key === $body->license_key && date('Y-m-d') < $body->end_date ) {
		  			$r = true;
		  		} else {
		  			$r = false;
		  		}
		  	} else {
		  		$r = false;
		  	}	  	
		}

		return $r;
	}



}
$yoohoo_license_handler = new Yoohoo_License_Handler();
