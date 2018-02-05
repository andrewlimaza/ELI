<?php
/**
 * Basic WooCommerce support
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

	<div class="container eli-content-container">
		<div class="row">
			<div class="col-lg-8 col-md-auto col-sm-auto" id="eli-woo-main">
				<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php woocommerce_content(); ?>
			</div>
		</article>
		</div>
	
		<div class="col-lg-4 col-md-auto col-sm-auto" id="eli-woo-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer();