<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dizzyskips
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'DIZZYSKIPS_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add theme support for block styles and editor style.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dizzyskips_setup() {
	add_editor_style( './assets/css/style-shared.min.css' );

	/*
	 * Load additional block styles.
	 * See details on how to add more styles in the readme.txt.
	 */
	$styled_blocks = [ 'button', 'quote', 'navigation', 'search' ];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "dizzyskips-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.min.css" ),
			'path'   => get_theme_file_path( "assets/css/blocks/$block_name.min.css" ),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style( "core/$block_name", $args );
	}

}
add_action( 'after_setup_theme', 'dizzyskips_setup' );

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dizzyskips_styles() {
	wp_enqueue_style(
		'dizzyskips-style',
		get_stylesheet_uri(),
		[],
		DIZZYSKIPS_VERSION
	);
	wp_enqueue_style(
		'dizzyskips-shared-styles',
		get_theme_file_uri( 'assets/css/style-shared.min.css' ),
		[],
		DIZZYSKIPS_VERSION
	);

	wp_enqueue_style(
		'flexslider',
		get_theme_file_uri( 'assets/css/flexslider.css' ),
		[],
		DIZZYSKIPS_VERSION
	);
	
}
add_action( 'wp_enqueue_scripts', 'dizzyskips_styles' );


// Filters.
require_once get_theme_file_path( 'inc/filters.php' );

// Block variation example.
require_once get_theme_file_path( 'inc/register-block-variations.php' );

// Block style examples.
require_once get_theme_file_path( 'inc/register-block-styles.php' );

// Block pattern and block category examples.
require_once get_theme_file_path( 'inc/register-block-patterns.php' );


function post_title_shortcode() {
    return get_the_title();
	
}
add_shortcode('post_title', 'post_title_shortcode');



function my_theme_enqueue_scripts() {
    // wp_register_script(
    //     'main-js',
    //     get_template_directory_uri() . '/assets/js/main.js', 
    //     array(), 
    //     '1.0', 
    //     true 
    // );
	// wp_register_script(
    //     'flexslider',
    //     get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', 
    //     array(), 
    //     '1.0', 
    //     true 
    // );


    // wp_enqueue_script('main-js');
	// wp_enqueue_script('flexslider');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');


// Displaying ACF

if( function_exists('acf_register_block_type') ) {
    acf_register_block_type(array(
        'name'              => 'custom-block',
        'title'             => __('Custom Block'),
        'description'       => __('A custom block.'),
        'render_callback'   => 'my_acf_block_render_callback',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'custom', 'block' ),
    ));
}

function my_acf_block_render_callback( $block ) {
    // code to display ACF fields
}


?>




