<?php
/**
 * Clean up <head> output and WordPress features this site doesn't use.
 * Each block is independent: comment one out if it causes issues.
 *
 * @package IgnacioTalvi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', function () {
	// Emojis: WordPress loads its own script and CSS; browsers render emojis natively.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'emoji_svg_url', '__return_false' );

	// Unneeded meta tags in <head>.
	remove_action( 'wp_head', 'wp_generator' );          // WordPress version.
	remove_action( 'wp_head', 'rsd_link' );              // Really Simple Discovery.
	remove_action( 'wp_head', 'wlwmanifest_link' );      // Windows Live Writer.
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );  // ?p=123 shortlink.

	// oEmbed discovery for this site (YouTube embeds on your pages still work).
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
} );

// wp-embed script (embeds posts from other WordPress sites; unused).
add_action( 'wp_footer', function () {
	wp_dequeue_script( 'wp-embed' );
} );

// XML-RPC: common attack vector, not used here (no mobile app or Jetpack).
add_filter( 'xmlrpc_enabled', '__return_false' );
