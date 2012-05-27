<?php

if ( ! function_exists( 'yoko' ) ):

/**
 * Create Yoko Theme Options Page
 */
require_once ( get_template_directory() . '/includes/theme-options.php' );

/**
 * Sets up theme defaults and registers support for WordPress features. 
 */
function yoko() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'yoko' ),
	) );

	// Add support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'image', 'quote' ) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', 'http://kumanowarouda.jp/wp-content/themes/warouda/images/header.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to yoko_header_image_width and yoko_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'yoko_header_image_width', 1102 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'yoko_header_image_height', 350 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 350 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See yoko_admin_header_style(), below.
	add_custom_image_header( '', 'yoko_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
			'Default' => array(
			'url' => 'http://kumanowarouda.jp/wp-content/themes/warouda/images/header.jpg',
			'thumbnail_url' => 'http://kumanowarouda.jp/wp-content/themes/warouda/images/header-300x95.jpg',
			/* translators: header image description */
			'description' => 'ヘッダー'
			),
	) );
}
endif;

