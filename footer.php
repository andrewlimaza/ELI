<?php
/**
 * Footer for Eli Theme.
 *
 * @package eli
 */
?>

<div>
	<?php
		
		//$back_to_top = get_theme_mod( 'eli_back_to_top' ) ;
		//if( !empty($back_to_top) )
	    //		$back_to_top = apply_filters('eli_back_to_top', __('<i class="fa fa-chevron-up"></i> Back to Top', 'eli') );					
		if( !empty(get_theme_mod( 'eli_back_to_top' )) )
			echo '<a href="#" class="button-to-top"><i class="fa fa-chevron-up"></i></a>';

	?>
</div>



<?php
	do_action( 'eli_before_body_tag' );

	if ( ! empty( get_theme_mod( 'eli_body_script' ) ) ) {
		echo get_theme_mod( 'eli_body_script' );
	}
?>
</body>
<footer class="footer">
<?php
	
	do_action( 'eli_footer_tag' );

	if ( ! empty( get_theme_mod( 'eli_footer_script' ) ) ) {
		echo get_theme_mod( 'eli_footer_script' );
	}

	if ( ! is_page() ) {

		get_template_part( 'template-parts/footer/footer', 'widgets' );

	} else {

		$hide_footer = get_post_meta( $post->ID, 'eli_hide_page_footer', true );

		if ( '1' != $hide_footer ) {

			get_template_part( 'template-parts/footer/footer', 'widgets' );
		}
	}
?>
 
</footer>
<?php wp_footer(); ?>
</html>
