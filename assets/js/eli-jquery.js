jQuery( document ).ready( function($){

	/**
	 * @todo Convert this to CSS or adjust the CSS for menu links preferably.
	 */

	// Adds a class to top-menu links.
	$('ul#top-menu > li.nav-item > a').addClass('nav-link');

	// Adds the dropdown menu stuff data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
	jQuery('ul#top-menu > li.menu-item-has-children').addClass('dropdown').attr('id', 'navbarDropdownMenuLink').attr( 'data-toggle', 'dropdown');
	jQuery('ul#top-menu > li.dropdown > a').addClass('dropdown-toggle');

	jQuery('ul.sub-menu').addClass('dropdown-menu');
	$( 'ul.sub-menu > li').addClass('dropdown-item')
});