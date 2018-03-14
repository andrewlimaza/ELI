<?php
/**
 * Template Name: Full Width
 *
 */
get_header();
?>
<div class="row">
	<div class="container-fluid">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'fullwidth' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
	</div>

<?php get_footer();