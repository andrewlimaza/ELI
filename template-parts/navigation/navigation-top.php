<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	<a class="navbar-brand" href="<?php echo home_url(); ?>"> <?php echo bloginfo( 'sitename' ); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
        </button>
      	
        <?php wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			'menu_class'	=> 'navbar-nav ml-auto',
			'container_class' => 'navbar-collapse collapse',
			'container_id' => 'navbarResponsive'
		) ); ?>

	</div>
</nav>