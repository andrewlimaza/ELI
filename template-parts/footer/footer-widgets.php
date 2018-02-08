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
<hr>
<!-- Social Media & Copyright Text -->
	<div class="container" id="eli-copyright-footer">
		<div class="row">
      		<div class="col text-center">

      			<div class="eli-footer-social-icons">
	      			<?php

	      			if( !empty( get_theme_mod( 'eli_footer_copyright_facebook' ) ) ) { 
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_facebook' ) ).'" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a> ';
	      			} 
	      			
	      			if( !empty( get_theme_mod( 'eli_footer_copyright_twitter' ) ) ) {
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_twitter' ) ).'" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>';
	      			}

	      			if( !empty( get_theme_mod( 'eli_footer_copyright_instagram' ) ) ) { 
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_instagram' ) ).'" target="_blank" rel="noopener"><i class="fa fa-instagram"></i></a> ';
	      			} 

	      			if( !empty( get_theme_mod( 'eli_footer_copyright_google_plus' ) ) ) { 
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_google_plus' ) ).'" target="_blank" rel="noopener"><i class="fa fa-google-plus"></i></a> ';
	      			} 

	      			if( !empty( get_theme_mod( 'eli_footer_copyright_linked_in' ) ) ) { 
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_linked_in' ) ).'" target="_blank" rel="noopener"><i class="fa fa-linkedin"></i></a> ';
	      			} 

	      			if( !empty( get_theme_mod( 'eli_footer_copyright_dribbble' ) ) ) { 
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_dribbble' ) ).'" target="_blank" rel="noopener"><i class="fa fa-dribbble"></i></a> ';
	      			}

	      			if( !empty( get_theme_mod( 'eli_footer_copyright_github' ) ) ) { 
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_github' ) ).'" target="_blank" rel="noopener"><i class="fa fa-github-alt"></i></a> ';
	      			} 

	      			if( !empty( get_theme_mod( 'eli_footer_copyright_email' ) ) ) { 
	      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_email' ) ).'" target="_blank" rel="noopener"><i class="fa fa-envelope"></i></a> ';
	      			}  
	      			?>
	      		</div>
        		<p><small><?php echo get_theme_mod( 'eli_footer_copyright_text' ); ?></small></p>
     		</div>
    	</div>
	</div>