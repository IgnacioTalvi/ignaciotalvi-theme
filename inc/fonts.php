<?php
/**
 * Self-hosted fonts: Clash Display (headings) and Satoshi (text), variable versions.
 *
 * The font files are NOT part of this repository. The ITF Free Font License
 * (Fontshare) forbids redistributing them through public repositories, so they
 * live only on the server, in wp-content/uploads/fonts/, outside the theme folder.
 *
 * @package IgnacioTalvi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Font files, relative to the fonts folder.
 */
const IGNACIOTALVI_FONT_FILES = [
	'clash'   => 'ClashDisplay-Variable.woff2',
	'satoshi' => 'Satoshi-Variable.woff2',
];

/**
 * Public URL of wp-content/uploads/fonts/.
 */
function ignaciotalvi_fonts_url( $file ) {
	$uploads = wp_upload_dir( null, false );
	return trailingslashit( set_url_scheme( $uploads['baseurl'] ) ) . 'fonts/' . $file;
}

/**
 * @font-face rules. Weight ranges match the variable fonts' axes.
 */
function ignaciotalvi_font_face_css() {
	$clash   = esc_url( ignaciotalvi_fonts_url( IGNACIOTALVI_FONT_FILES['clash'] ) );
	$satoshi = esc_url( ignaciotalvi_fonts_url( IGNACIOTALVI_FONT_FILES['satoshi'] ) );

	return "@font-face{font-family:'Clash Display';src:url('{$clash}') format('woff2');font-weight:200 700;font-style:normal;font-display:swap;}"
		. "@font-face{font-family:'Satoshi';src:url('{$satoshi}') format('woff2');font-weight:300 900;font-style:normal;font-display:swap;}";
}

/**
 * Print the @font-face rules on the front end (this includes the Elementor preview).
 */
add_action( 'wp_enqueue_scripts', function () {
	wp_register_style( 'ignaciotalvi-fonts', false, [], null );
	wp_enqueue_style( 'ignaciotalvi-fonts' );
	wp_add_inline_style( 'ignaciotalvi-fonts', ignaciotalvi_font_face_css() );
}, 5 );

/**
 * Preload both fonts so text renders with them from the first paint.
 */
add_action( 'wp_head', function () {
	foreach ( IGNACIOTALVI_FONT_FILES as $file ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( ignaciotalvi_fonts_url( $file ) )
		);
	}
}, 1 );

/**
 * Make both families selectable in Elementor's typography controls.
 * The "system" group tells Elementor not to load them from Google Fonts.
 */
add_filter( 'elementor/fonts/additional_fonts', function ( $fonts ) {
	$fonts['Clash Display'] = 'system';
	$fonts['Satoshi']       = 'system';
	return $fonts;
} );