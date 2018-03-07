<?php
/**
 * The template for displaying search results pages.
 *
 * @package eli
 */
get_header(); ?>
<div class="container-fluid" style="padding:2rem;">
	<div class="container">
		<h1><?php _e( 'Search Page', 'eli' ); ?></h1>
		<?php 
		get_search_form();
		
		global $wp_query;
		$total_results = $wp_query->found_posts;

		if( ! empty( $total_results ) ){
			echo '<h2 id="eli_s_posts_found">' . $total_results . " " . __( "Posts Found.", "eli" ) . '</h2>';

			foreach( $wp_query->posts as $post ){				
				echo '<li><a href="' .$post->guid . '">' . $post->post_title . '</a></li>';
			}

		}else{
			echo '<h2 id="eli-no-posts-found" style="text-align:center;">';
			_e( 'No posts found, please search with a different keyword.', 'eli' );
			echo '</h2>';
		}
	?>
	</div>
</div>

<?php get_footer();