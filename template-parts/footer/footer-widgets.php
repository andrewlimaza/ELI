<?php

if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) :

?>
	<hr/>
	<div class="container">
		<div class="row">

			<?php if( is_active_sidebar( 'footer-1' ) ) { ?>
			<div class="col" id="footer-1">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<?php } ?>

			<?php if( is_active_sidebar( 'footer-2' ) ) { ?>
			<div class="col">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<?php } ?>

			<?php if( is_active_sidebar( 'footer-3' ) ) { ?>
			<div class="col">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<br>
<?php	endif; ?>
<hr>
<!-- Social Media & Copyright Text -->
	<div class="container" id="eli-copyright-footer">
		<div class="row">
      		<div class="col text-center">

      			<div id="eli-footer-social-icons" class="eli-footer-social-icons <?php echo ( get_theme_mod( 'eli_show_social_media_footer' ) != 1 ? 'hidden' : '' ); ?>">
	      			<?php

	      			echo eli_get_social_icons();

	      			?>
	      		</div>

	      		<?php
		      		if( has_nav_menu( 'footer' ) ) :

		       			wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								'container_class' => 'container',
								'container_id'    => 'footer-menu-container',
								'menu_class'      => 'list-inline',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-menu',
								'walker'          => new Eli_WP_Bootstrap_Navwalker(),
							)
						);

	       			endif;
	      		?>
        		<p><small id="eli-copyright-text"><?php echo get_theme_mod( 'eli_footer_copyright_text', '&copy; ' . date("Y") . ' ' . get_bloginfo('name') ); ?></small></p>
     		</div>
    	</div>
	</div>