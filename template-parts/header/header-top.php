<?php 
/**
 * Displays top bar for header section.
 *
 * @package eli
 */
?>
<?php
	if( has_nav_menu( 'top-bar' ) ) :
		wp_nav_menu(
		array(
			'theme_location'  => 'top-bar',
			'container_class' => '',
			'container_id'    => 'top-bar-menu-container',
			'menu_class'      => 'list-inline d-flex justify-content-lg-end',
			'fallback_cb'     => '',
			'menu_id'         => 'top-bar-menu',
			'walker'          => new Eli_WP_Bootstrap_Navwalker(),
		)
	);

	endif;
?>
