<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container" id="single-post-container">
	<div class="row">
		<div class="col-lg-8 col-md-auto col-sm-auto">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'loop-templates/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => __( 'Previous Post', 'eli' ),	
					'next_text' => __( 'Next Post', 'eli' )
				) );

			endwhile; // End of the loop.
			?>

	</div>
		<div class="col-lg-4 col-md-auto col-sm-auto">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer();
