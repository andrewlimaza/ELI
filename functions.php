<?php


/**
 * Load custom WordPress nav walker.
 */
require_once( get_template_directory() . '/includes/bootstrap-wp-navwalker.php' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';


function eli_setup() {
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'eli' ),
		'footer' => __( 'Footer Menu', 'eli' ),
	) );


	// Add theme support here.
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'eli_setup' );

/**
 * Enqueue scripts and styles.
 */
function eli_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'eli_style', get_stylesheet_uri(), array('bootstrap') );

	// Load Bootstrap
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	wp_enqueue_style( 'eli-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );

	wp_enqueue_style( 'eli-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,600italic,700italic,800italic,200,400,300,600,700,800' );



	// Theme dependent js.
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ) );

	// Custom JQuery file
	// wp_enqueue_script( 'eli_jquery', get_theme_file_uri( '/assets/js/eli-jquery.js'), array( 'jquery' ) );

	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/includes/font-awesome/css/font-awesome.min.css' ) );

}
add_action( 'wp_enqueue_scripts', 'eli_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eli_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'twentyseventeen' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'eli_widgets_init' );

if ( ! function_exists( 'eli_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function eli_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'understrap' ), esc_html__( '1 Comment', 'understrap' ), esc_html__( '% Comments', 'understrap' ) );
		echo '</span>';
	}
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'understrap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


/**
 * This retrives post meta and displays it in a cool format.
 * @param $post Object.
 */
function eli_get_entry_meta(){
	?>
	<div class="eli-post-meta">
		<i class="fa fa-user"></i> <?php echo get_the_author_posts_link(); ?>
		<i class="fa fa-tags"></i> <?php echo get_the_category_list( ', ' ); ?>
		<i class="fa fa-comments"></i><a href="<?php echo get_comments_link(); ?>"> <?php echo comments_number( __( 'Leave a Comment', 'eli' ) ); ?></a>
		<i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
	</div>
	<?php
}


/**
 * Page Settings
 */

function eli_add_page_settings( $post ) {
    add_meta_box( 
        'my-meta-box',
        __( 'ELI Page Settings', 'eli' ),
        'eli_page_metabox',
        'page',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes_page', 'eli_add_page_settings' );

// Call back for eli_add_page_settings
function eli_page_metabox( $post ) {

	wp_nonce_field( 'eli_page_settings', 'eli_page_settings_nonce' );

	$hide_page_navbar = get_post_meta( $post->ID, 'eli_hide_page_navbar', true );
	$hide_page_title = get_post_meta( $post->ID, 'eli_hide_page_title', true );
	$hide_page_footer = get_post_meta( $post->ID, 'eli_hide_page_footer', true );


	?>
		
		<label for="eli_hide_page_navbar"><?php _e( 'Hide Page Navigation:', 'eli' ); ?></label>
		<input type="checkbox" class="form-check-input" id="eli_hide_page_navbar" name="eli_hide_page_navbar" value="1" <?php checked( $hide_page_title, "1" ); ?>/>
		<label for="eli_hide_page_title"><?php _e( 'Hide Page Title:', 'eli' ); ?></label>
		<input type="checkbox" id="eli_hide_page_title" name="eli_hide_page_title" value="1" <?php checked( $hide_page_title, "1" ); ?>/>
		<label for="eli_hide_page_footer"><?php _e( 'Hide Page Footer:', 'eli' ); ?></label>
		<input type="checkbox" id="eli_hide_page_footer" name="eli_hide_page_footer" value="1" <?php checked( $hide_page_footer, "1" ); ?>/>
	<?php

}

function eli_save_page_meta( $post_id ) {

	// Check if the user can edit a page.
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

	// Check if nonce is set.
	if( ! isset( $_POST['eli_page_settings_nonce'] ) ) {
		return $post_id;
	}

	$nonce = $_POST['eli_page_settings_nonce'];

	// Verify the nonce that is valid
	if( ! wp_verify_nonce( $nonce, 'eli_page_settings' ) ) {
		return $post_id;
	}

	// Ignore if autosave is happening.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
       return $post_id;
    }

    //Sanitize the data
    $hide_page_navbar = (int) $_POST['eli_hide_page_navbar'];
    $hide_page_title = (int) $_POST['eli_hide_page_title'];
    $hide_page_footer = (int) $_POST['eli_hide_page_footer'];

    // Let's save all the data now.
    update_post_meta( $post_id, 'eli_hide_page_navbar', $hide_page_navbar );
    update_post_meta( $post_id, 'eli_hide_page_title', $hide_page_title );
    update_post_meta( $post_id, 'eli_hide_page_footer', $hide_page_footer );
}
add_action( 'save_post', 'eli_save_page_meta' );

function eli_css_for_sticky_header_admin() {

	if( get_theme_mod( 'eli_sticky_header' ) && is_admin_bar_showing() ) {
	?>
	<style type="text/css">
		@media all and ( min-width: 800px ) {
			.sticky-top{ top:28px; }
		}
	</style>
	<?php
	}

}
add_action( 'wp_footer', 'eli_css_for_sticky_header_admin' );

if( class_exists( 'WooCommerce' ) ) {

	function eli_additional_links_for_woo_confirmation() {
		echo '<a href="' . home_url( 'my-account/orders' ) . '" id="eli-view-orders">'. __( '&larr; View Order History', 'eli' ) . '</a>';
		echo '<a href="' . home_url( 'my-account' ) . '" id="eli-view-account">' . __( 'View My Account &rarr;', 'eli' ) . '</a>';
	}
	add_action( 'woocommerce_order_details_after_order_table', 'eli_additional_links_for_woo_confirmation' );
}

/**
 * @todo We should localize the $eli_footer_social_elements global so if that array changes it will allow developers ease of use yo! Also refer to customizer.php to improve it!
 */
function eli_customizer_preview() {
	wp_register_script('eli-customizer', get_template_directory_uri() . '/assets/js/customizer.js',	array(  'jquery', 'customize-preview' ),'20180215',	true );
	wp_enqueue_script('eli-customizer');
}

add_action( 'customize_preview_init' , 'eli_customizer_preview' );

