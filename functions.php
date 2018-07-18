<?php


define( 'ELI_DIR', get_template_directory() );

/**
 * Require TGM Activation Class
 */
require_once( ELI_DIR . '/includes/tgm-plugin-activation/eli-plugin-activation.php' );

/**
 * Automatic updates
 */
require_once( ELI_DIR . '/includes/wp-updates-theme.php');
new WPUpdatesThemeUpdater_2291( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );

/**
 * Load custom WordPress nav walker.
 */
require_once( ELI_DIR . '/includes/bootstrap-wp-navwalker.php' );

/**
 * Customizer additions.
 */
require_once( ELI_DIR . '/includes/customizer.php' );

/**
 * License checker.
 */
// require_once( ELI_DIR . '/includes/updates/license.php' );

/**
 * Update checker.
 */
// require_once( ELI_DIR . '/includes/updates/update-checker.php' );

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

	//let's support different languages.
	load_theme_textdomain( 'eli', ELI_DIR . '/languages' );



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

	do_action("eli_enqueue_script_extender");

}
add_action( 'wp_enqueue_scripts', 'eli_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eli_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'eli' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'eli' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'eli' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'eli' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'eli' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'eli' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'eli' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'eli' ),
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
		$categories_list = get_the_category_list( esc_html__( ', ', 'eli' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'eli' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'eli' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'eli' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'eli' ), esc_html__( '1 Comment', 'eli' ), esc_html__( '% Comments', 'eli' ) );
		echo '</span>';
	}
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'eli' ),
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
	<div class="eli-post-meta entry-meta">
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

    $hide_page_navbar = isset( $_POST['eli_hide_page_navbar'] ) ? (int) $_POST['eli_hide_page_navbar'] : get_post_meta( $post->ID, 'eli_hide_page_navbar', true );
    $hide_page_title = isset( $_POST['eli_hide_page_title'] ) ? (int) $_POST['eli_hide_page_title'] : get_post_meta( $post->ID, 'eli_hide_page_title', true );
    $hide_page_footer = isset( $_POST['eli_hide_page_footer'] ) ? (int) $_POST['eli_hide_page_footer'] : get_post_meta( $post->ID, 'eli_hide_page_footer', true );


	?>
	<table id="eli-page-settings">
		<tr>
			<td>
				<label for="eli_hide_page_navbar"><?php _e( 'Hide Page Navigation:', 'eli' ); ?></label>
				<input type="checkbox" class="form-check-input" id="eli_hide_page_navbar" name="eli_hide_page_navbar" value="1" <?php checked( $hide_page_navbar, "1" ); ?>/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="eli_hide_page_title"><?php _e( 'Hide Page Title:', 'eli' ); ?></label>
				<input type="checkbox" id="eli_hide_page_title" name="eli_hide_page_title" value="1" <?php checked( $hide_page_title, "1" ); ?>/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="eli_hide_page_footer"><?php _e( 'Hide Page Footer:', 'eli' ); ?></label>
				<input type="checkbox" id="eli_hide_page_footer" name="eli_hide_page_footer" value="1" <?php checked( $hide_page_footer, "1" ); ?>/>
			</td>
		</tr>
		<tr>
			<td>
				<br>
				<em><?php _e( 'These settings are only available for pages. Please select an option to activate it and update your page to save the settings.', 'eli' ); ?></em>
			</td>
		</tr>


	</table>
	<?php

}

function eli_save_page_meta( $post_id ) {

	// Check if the user can edit a page.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
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
    $hide_page_navbar = isset( $_POST['eli_hide_page_navbar'] ) ? (int) $_POST['eli_hide_page_navbar'] : '';
    $hide_page_title = isset( $_POST['eli_hide_page_title'] ) ? (int) $_POST['eli_hide_page_title'] : '';
    $hide_page_footer = isset( $_POST['eli_hide_page_footer'] ) ? (int) $_POST['eli_hide_page_footer'] : '';

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


/**
 * Function to output a 'menu' for social icons.
 * @param string $color_scheme This takes either 'light' or 'dark'.
 */
function eli_get_social_icons( $color_scheme = NULL ) {

	$eli_footer_social_elements = array(
		'facebook' => 'facebook',
		'twitter' => 'twitter',
		'instagram' => 'instagram',
		'google_plus' => 'google-plus',
		'linkedin' => 'linkedin',
		'dribbble' => 'dribbble',
		'github' => 'github',
		'email' => 'envelope',
	);

	if ( empty( $color_scheme ) || 'light' != $color_scheme ) {
		$color_scheme = 'dark';
	}

	$output = '';

	// loop through customizer settings and display these fields.
	foreach( $eli_footer_social_elements as $setting_name => $fa ){

		$show_social_element = ( !get_theme_mod( "eli_social_$setting_name" ) ) ? 'hidden' : '';

		$url = esc_url( get_theme_mod( "eli_social_$setting_name" ) );

		$output .= '<a id="eli-footer-copyright-' . $setting_name . '" href="'. $url .'" target="_blank" rel="noopener" class="eli-social-icon ' . $show_social_element . ' ' . $color_scheme . '"><i class="fa fa-' . $fa . '"></i></a> ';
	}

	return $output;

}


/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
function eli_woocommerce_cart_menu( $menu, $args ) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'top' !== $args->theme_location ) {
		return $menu;
	}

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'eli');
		$start_shopping = __('Start shopping', 'eli');
		$cart_url = wc_get_cart_url();
		$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'eli'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();

			if ($cart_contents_count == 0) {
				$menu_item = '<li class="right nav-item"><a class="wcmenucart-contents nav-link" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="right nav-item"><a class="wcmenucart-contents nav-link" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$icon = apply_filters( 'eli_menu_cart_icon', 'fa-shopping-cart' );

			$menu_item .= '<i class="fa ' . $icon . '"></i> ';

			$menu_item .= $cart_contents.' - '. $cart_total;
			$menu_item .= '</a></li>';
		echo $menu_item;
	$social = ob_get_clean();

	return $menu . $social;

}
if( class_exists( 'WooCommerce' ) ){
	add_filter( 'wp_nav_menu_items','eli_woocommerce_cart_menu', 10, 2 );
}


function woocommerce_header_add_to_cart_fragment( $fragments ) {

	$icon = apply_filters( 'eli_menu_cart_icon', 'fa-shopping-cart' );

    ob_start();
    ?>
    	<a class="wcmenucart-contents nav-link" href="<?php echo wc_get_cart_url(); ?>">
    	<i class="fa <?php echo $icon; ?>"></i> <?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
    <?php

    $fragments['a.wcmenucart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

/**
 * Adds all inline CSS from the customizer
*/
function eli_customizer_inline_head_generator(){
	$output_css = "";

	$nav_bg_color = get_theme_mod('eli_nav_bg_color', false);
	if($nav_bg_color !== false){
		$output_css .= "#eli-top-navbar,.dropdown-menu { background-color: " . $nav_bg_color . "; }";
	}

	$nav_link_color = get_theme_mod('eli_nav_a_link_color', false);
	if($nav_link_color !== false){
		$output_css .= "#eli-top-navbar .navbar-nav li:not(.active) .nav-link { color: " . $nav_link_color . "; }";
	}

	$nav_link_hover_color = get_theme_mod('eli_nav_hover_a_link_color', false);
	if($nav_link_hover_color !== false){
		$output_css .= "#eli-top-navbar .navbar-nav li .nav-link:hover { color: " . $nav_link_hover_color . "; }";
	}

	$nav_active_link_color = get_theme_mod('eli_nav_active_a_link_color', false);
	if($nav_active_link_color !== false){
		$output_css .= "#eli-top-navbar .navbar-nav .active .nav-link { color: " . $nav_active_link_color . "; }";
	}

	$link_color = get_theme_mod('eli_a_link_color', false);
	if($link_color !== false){
		$output_css .= ".eli-content-container a, .footer a { color: " . $link_color . "; }";
	}

	$link_hover_color = get_theme_mod('eli_hover_a_link_color', false);
	if($link_hover_color !== false){
		$output_css .= ".eli-content-container a:hover, .footer a:hover { color: " . $link_hover_color . "; }";
	}

	$body_bg_color = get_theme_mod('eli_body_bg_color', false);
	if($body_bg_color !== false){
		$output_css .= "body { background-color: " . $body_bg_color . "; }";
	}

	$footer_bg_color = get_theme_mod('eli_footer_bg_color', false);
	$footer_color = get_theme_mod('eli_footer_color', false);
	if($footer_bg_color !== false || $footer_color !== false){
		$footer_bg_color = $footer_bg_color == false ? "#fff" : $footer_bg_color;
		$footer_color = $footer_color == false ? "#000" : $footer_color;
		$output_css .= ".footer { background-color: " . $footer_bg_color . "; color: " . $footer_color . "; }";
	}

	if(!empty($output_css)){
		wp_add_inline_style('eli_style', $output_css);
	}
}
add_action( "eli_enqueue_script_extender", "eli_customizer_inline_head_generator" );

function manual_excerpt_more( $excerpt ) {
	$excerpt_more = '';
	if( has_excerpt() ) {
    	$excerpt_more = '<br/><a href="' . get_permalink() . '" rel="nofollow" class="more-link">' .
	sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eli' ),
			get_the_title()
			). '</a>';
	}

	return $excerpt . $excerpt_more;
}
add_filter( 'get_the_excerpt', 'manual_excerpt_more' );
