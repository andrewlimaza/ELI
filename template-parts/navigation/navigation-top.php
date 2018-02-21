<?php
/**
 * Displays top navigation
 *
 * @package eli
 */

?>
<nav id="eli-top-navbar" class="navbar navbar-expand-lg navbar-light navbar-custom <?php echo ( get_theme_mod( 'eli_sticky_header' ) == 1 ? 'sticky-top' : '' ); ?>">

	<div class="container">

		<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
      	
       <?php 
       if( has_nav_menu( 'top' ) ) :

       wp_nav_menu(
			array(
				'theme_location'  => 'top',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ml-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'top-menu',
				'walker'          => new Eli_WP_Bootstrap_Navwalker(),
			)
		);

       	endif; ?>
	</div>
</nav>