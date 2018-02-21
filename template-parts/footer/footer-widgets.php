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

      			<div class="eli-footer-social-icons">
	      			<?php

	      			//make this global somewhere.
	      			$eli_footer_social_elements = array(
				        'facebook' => 'facebook',
				        'twitter' => 'twitter',
				        'instagram' => 'instagram',
				        'google_plus' => 'google-plus',     
				        'linkedin' => 'linkedin',
				        'dribbble' => 'dribbble',
				        'github' => 'github',
				        'email' => 'envelope',
				    );


	      			// loop through customizer settings and display these fields.
	      			foreach( $eli_footer_social_elements as $setting_name => $fa ){

	      				$show_social_element = ( !get_theme_mod( "eli_footer_copyright_$setting_name" ) ) ? 'hidden' : '';

	      				echo '<a id="eli-footer-copyright-' . $setting_name . '" href="'. esc_url( get_theme_mod( 'eli_footer_copyright_$setting_name' ) ).'" target="_blank" rel="noopener" class="' . $show_social_element . '"><i class="fa fa-'.$fa.'"></i></a> ';
	      			}
 
	      			?>
	      		</div>

	      		<div class="container" id="footer-menu-container">
	      		<?php 
		      		if( has_nav_menu( 'footer' ) ) :

		       			wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'list-inline',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-menu',
								'walker'          => new Eli_WP_Bootstrap_Navwalker(),
							)
						);

	       			endif;
	      		?>
	      	</div>
        		<p><small><?php echo get_theme_mod( 'eli_footer_copyright_text' ); ?></small></p>
     		</div>
    	</div>
	</div>