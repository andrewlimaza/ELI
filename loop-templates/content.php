<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package eli
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<header class="entry-header">

		<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>

		<?php 

		if ( ! is_single() ) {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); 
		} else {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php 

		if( ! is_single() && has_excerpt() ) {
			the_excerpt();
		} else {
			the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eli' ),
			get_the_title()
			) );
		} 
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php eli_get_entry_meta(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
<hr />