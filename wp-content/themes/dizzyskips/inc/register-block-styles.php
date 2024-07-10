<?php
/**
 * Block styles.
 *
 * @package dizzyskips
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function dizzyskips_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'dizzyskips-flat-button',
			'label' => __( 'Flat button', 'dizzyskips' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/list',
		array(
			'name'  => 'dizzyskips-list-underline',
			'label' => __( 'Underlined list items', 'dizzyskips' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/group',
		array(
			'name'  => 'dizzyskips-box-shadow',
			'label' => __( 'Box shadow', 'dizzyskips' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'  => 'dizzyskips-box-shadow',
			'label' => __( 'Box shadow', 'dizzyskips' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/columns',
		array(
			'name'  => 'dizzyskips-box-shadow',
			'label' => __( 'Box shadow', 'dizzyskips' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/details',
		array(
			'name'  => 'dizzyskips-plus',
			'label' => __( 'Plus & minus', 'dizzyskips' ),
		)
	);
}
add_action( 'init', 'dizzyskips_register_block_styles' );

/**
 * This is an example of how to unregister a core block style.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 * @see https://github.com/WordPress/gutenberg/pull/37580
 *
 * @since 1.0.0
 *
 * @return void
 */
function dizzyskips_unregister_block_style() {
	wp_enqueue_script(
		'dizzyskips-unregister',
		get_stylesheet_directory_uri() . '/assets/js/unregister.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		DIZZYSKIPS_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'dizzyskips_unregister_block_style' );
