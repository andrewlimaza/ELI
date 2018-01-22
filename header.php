<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package eli
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php if ( is_singular() && pings_open() ) { ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php } ?>

   <?php  wp_head(); ?>
  </head>

 <body <?php body_class(); ?>>

  <!-- Navigation -->
  <?php if( has_nav_menu( 'top' ) ) : ?>
    <?php get_template_part( 'template-parts/navigation/navigation-top', 'top' ); ?>
  <?php endif; ?>

