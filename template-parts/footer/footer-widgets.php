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
<?php	endif;