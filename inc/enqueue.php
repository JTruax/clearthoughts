<?php
/**
 * Clear Thoughts enqueue scripts
 *
 * @package clearthoughts
 */

if ( ! function_exists( 'clearthoughts_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function clearthoughts_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'clearthoughts-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $the_theme->get( 'Version' ) );
        wp_enqueue_style( 'main-styles', get_stylesheet_directory_uri() . '/css/main.css', array() );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
		wp_enqueue_script( 'clearthoughts-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'clearthoughts_scripts' ).

add_action( 'wp_enqueue_scripts', 'clearthoughts_scripts' );
