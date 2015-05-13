<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package asu_s
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function asu_s_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'asu_s_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function asu_s_jetpack_setup
add_action( 'after_setup_theme', 'asu_s_jetpack_setup' );

function asu_s_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function asu_s_infinite_scroll_render