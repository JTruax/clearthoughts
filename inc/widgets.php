<?php
/**
 * Declaring widgets
 *
 * @package clearthoughts
 */

/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
if ( ! function_exists( 'slbd_count_widgets' ) ) {
	function slbd_count_widgets( $sidebar_id ) {
		// If loading from front page, consult $_wp_sidebars_widgets rather than options
		// to see if wp_convert_widget_settings() has made manipulations in memory.
		global $_wp_sidebars_widgets;
		if ( empty( $_wp_sidebars_widgets ) ) :
			$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
		endif;

		$sidebars_widgets_count = $_wp_sidebars_widgets;

	}
}

if ( ! function_exists( 'clearthoughts_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function clearthoughts_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'clearthoughts' ),
			'id'            => 'left-sidebar',
			'description'   => 'Left sidebar for blog posts',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
        
        
        register_sidebar( array(
			'name'          => __( 'Page Sidebar', 'clearthoughts' ),
			'id'            => 'page-sidebar',
			'description'   => 'Page sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Hero Static', 'clearthoughts' ),
			'id'            => 'statichero',
			'description'   => 'Static Hero widget for header',
		    'before_widget'  => '<div id="%1$s" class="static-hero-widget %2$s '. slbd_count_widgets( 'statichero' ) .'">', 
		    'after_widget'   => '</div><!-- .static-hero-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Full', 'clearthoughts' ),
			'id'            => 'footerfull',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s col-md-4'. slbd_count_widgets( 'footerfull' ) .'">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

	}
} // endif function_exists( 'clearthoughts_widgets_init' ).
add_action( 'widgets_init', 'clearthoughts_widgets_init' );

