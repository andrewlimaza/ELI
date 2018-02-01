<?php

/**
 *
 *
 * @package eli
 */

?>

</body>
<hr>
<footer class="footer">
	<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
	<br>
	<!-- Social Media & Copyright Text -->
	<div class="container-responsive" id="eli_copyright_footer">
		<div class="row pt-3">
      		<div class="col text-center">

      			<?php

      			 if( !empty( get_theme_mod( 'eli_footer_copyright_facebook' ) ) ) { 
      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_facebook' ) ).'" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>';
      			} 
      			
      			if( !empty( get_theme_mod( 'eli_footer_copyright_twitter' ) ) ) {
      				echo '<a href="'. esc_url( get_theme_mod( 'eli_footer_copyright_twitter' ) ).'" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>';
      			}
      			?>
        		<p><?php echo get_theme_mod( 'eli_footer_copyright_text' ); ?></p>
     		</div>
    	</div>
	</div>
	
</footer>
<?php wp_footer(); ?>
</html>