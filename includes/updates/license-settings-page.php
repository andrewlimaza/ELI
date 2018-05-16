<?php
/**
 * Settings Page for license Handler.
 */
?>
<br/>
<div id="yoohoo-license-wrapper">
	<h2><?php _e( 'License Key', 'eli' ); ?></h2>
	<hr/>
	<?php
	$okay = '';

	// check if form has been submitted.
	if( isset( $_POST['submit'] ) ) {
		if( isset( $_POST['yoohoo-license-key'] ) ){

			// Check if valid and update transient if it's valid or not.
			if ( Yoohoo_License_Handler::is_key_valid( $_POST['yoohoo-license-key'] ) ) {
				$okay = true;
			}
			// Save the license key anyway.
			update_option( 'yoohoo_license_key', $_POST['yoohoo-license-key'] );	
		}

		if ( $okay ) {
	?>
			<div class="notice notice-success is-dismissible">
	    		<p><?php _e( 'Your license key has been validated successfully.', 'eli' ); ?></p>
	    	</div>

	 <?php } else { ?>

			<div class="notice notice-error is-dismissible">
	       		<p><?php _e( 'There was a problem activating your license.', 'eli' ); ?></p>
			</div>

	<?php 
		}
	 }
	?>
	<p><?php _e( sprintf( 'All Yoohoo based products are licensed under %s licensing.', '<a href="https://www.gnu.org/licenses/gpl-2.0.html" target="_blank" rel="nofollow">GPLv2</a>'), 'eli' ); ?> <strong><?php _e( 'A premium license is recommended.', 'eli' ); ?></strong> <a href="https://yoohoothemes.com/membership-account/membership-checkout/?level=2" target="_blank" rel="nofollow"><?php _e( 'View Premium Licenses.', 'eli' ); ?></a></p>

	<form action="" method="POST">
		<input type="password" name="yoohoo-license-key" id="yoohoo-license-key" size="40" value="<?php echo get_option( 'yoohoo_license_key' ); ?>">

		<input type="submit" name="submit" class="button-primary" value="Verify Key">

	</form>
</div>