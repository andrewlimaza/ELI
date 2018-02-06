<?php

if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) :

?>
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

<!-- Social Media & Copyright Text -->
	<div class="container" id="eli_copyright_footer">
		<div class="row">
      		<div class="col text-center">

      			<?php

      			 if( !empty( get_theme_mod( 'eli_footer_copyright_facebook' ) ) ) { 
      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_facebook' ) ).'" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a> ';
      			} 
      			
      			if( !empty( get_theme_mod( 'eli_footer_copyright_twitter' ) ) ) {
      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_twitter' ) ).'" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>';
      			}
      			?>
        		<p><small><?php echo get_theme_mod( 'eli_footer_copyright_text' ); ?></small></p>
     		</div>
    	</div>
	</div>