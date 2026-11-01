<?php
/**
 * Hello Elementor child theme for ignaciotalvi.com.
 *
 * @package IgnacioTalvi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue the child theme stylesheet after Hello's styles.
 *
 * The version is the file's modification time, so every deploy
 * busts the cache (LiteSpeed/CDN) without bumping numbers by hand.
 */
function ignaciotalvi_enqueue_styles() {
	$file = get_stylesheet_directory() . '/style.css';
	$deps = wp_style_is( 'hello-elementor-theme-style', 'registered' )
		? [ 'hello-elementor-theme-style' ]
		: [];

	wp_enqueue_style(
		'ignaciotalvi-style',
		get_stylesheet_uri(),
		$deps,
		file_exists( $file ) ? (string) filemtime( $file ) : null
	);
}
add_action( 'wp_enqueue_scripts', 'ignaciotalvi_enqueue_styles', 20 );

require_once get_stylesheet_directory() . '/inc/cleanup.php';
require_once get_stylesheet_directory() . '/inc/fonts.php';