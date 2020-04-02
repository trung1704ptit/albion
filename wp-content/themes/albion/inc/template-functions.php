<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Albion
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function albion_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'albion_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function albion_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'albion_pingback_header' );

/**
 * Albion RTL
 */
if( ! function_exists( 'albion_rtl' ) ):
	function albion_rtl() {
		global $albion_opt;

		if(	isset( $albion_opt['enable_albion_rtl'])  ):
			$albion_rtl = $albion_opt['enable_albion_rtl'];
		else:
			$albion_rtl = false;	
		endif;
		return $albion_rtl;
	}
endif;