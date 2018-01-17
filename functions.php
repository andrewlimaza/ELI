<?php


function eli_setup() {
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

}
add_action( 'after_setup_theme', 'eli_setup' );

/**
 * Enqueue scripts and styles.
 */
function eli_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'eli_style', get_stylesheet_uri() );

	// Load Bootstrap
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme dependent js.
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ) );

	// Custom JQuery file
	wp_enqueue_script( 'eli_jquery', get_theme_file_uri( '/assets/js/eli-jquery.js'), array( 'jquery' ) );

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
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'eli_widgets_init' );

/**
 * Add Custom classes to menu.
 */

function eli_nav_menu_css( $classes, $item, $args ) {
 	
 	if( 'top' === $args->theme_location ) {
 		$classes[] = 'nav-item';

 		if( in_array( 'current-menu-item', $classes ) ) {
 			$classes[] = 'active';
 		}
 	}
    
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'eli_nav_menu_css' , 10, 3 );