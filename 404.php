<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package eli
 */
get_header(); ?>

<div class="container eli-content-container">
	<div class="row">
		<div class="col-lg-8 col-md-12 col-sm-12">
			<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'eli' ); ?></h1>
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'eli' ); ?></p>
			<?php get_search_form(); ?>				
		</div>
	</div>
</div>
<?php get_footer(); ?>