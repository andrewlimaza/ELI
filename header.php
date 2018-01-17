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
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

   <?php  wp_head(); ?>
  </head>

  <body>

  <!-- Navigation -->
  <?php if( has_nav_menu( 'top' ) ) : ?>
    <?php get_template_part( 'template-parts/navigation/navigation-top', 'top' ); ?>
  <?php endif; ?>