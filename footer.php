<?php

/**
 *
 *
 * @package eli
 */

?>

</body>
<?php 
?>
<footer class="footer">
<?php if( ! is_page() ) {

  get_template_part( 'template-parts/footer/footer', 'widgets' );  

}else{

  $hide_footer = get_post_meta( $post->ID, 'eli_hide_page_footer', true );

  if( '1' != $hide_footer ) {
  	
    get_template_part( 'template-parts/footer/footer', 'widgets' );
  }

} ?>
 
</footer>
<?php wp_footer(); ?>
</html>