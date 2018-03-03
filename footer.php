<?php
/**
 * Footer for Eli Theme.
 *
 * @package eli
 */
?>

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
