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

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

	</header><!-- .entry-header -->



	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'eli' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php eli_get_entry_meta(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
<hr />