<?php

define('LOCAL_DOMAIN', 'elevatum.local');
define('THEME_VERSION', '0.0.1');

//includes
array_map(
    function ($file) {
        $filepath = "/includes/{$file}.php";
        require_once get_stylesheet_directory() . $filepath;
    },
    [
        'blocks',
        'icons',
        'options-pages',
        'post-types',
        'taxonomies',
        'user-roles',
        'utilities'
    ]
);

foreach (glob(get_stylesheet_directory() . '/src/blocks/*/') as $block_dir) {
	$block_name = basename($block_dir);
	$block_dist_path = get_stylesheet_directory() . '/assets/blocks/';
	// $block_dist_uri = trailingslashit(
	//     get_template_directory_uri() . '/src/blocks/' . $block_name . '/build/'
	// );

	if (file_exists($block_dir . $block_name . '.php')) {
		include $block_dir . $block_name . '.php';
	}
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );
}


// color palette
// add_theme_support('editor-color-palette', [
//     [
//         'name' => 'White',
//         'slug' => 'white',
//         'color' => '#ffffff',
//     ],
// ]);

add_action('after_setup_theme', function () {
    add_post_type_support('page', 'excerpt');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
    ]);

    remove_theme_support('core-block-patterns');

    add_theme_support('editor-styles');
    add_editor_style(asset_path('styles/editor.css'));
});

add_action('widgets_init', function () {
    register_sidebar([
        'name' => 'Site Logo',
        'id' => 'site-logo',
        'description' =>
            'Place a site logo block or image block here to display the logo in the header.',
        'before_widget' => '<div class="site-logo__wrap">',
        'after_widget' => '</div>',
    ]);
});



add_action(
    'wp_enqueue_scripts',
    function () {
        wp_enqueue_style(
            'main-css',
            asset_path('/css/main.css'),
            [],
            THEME_VERSION,
            'all'
        );
        wp_enqueue_script(
            'main-js',
            asset_path('scripts/main.js'),
            [],
            THEME_VERSION,
            true
        );
    },
    15
);



register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'elevatum'),
    'footer_navigation' => __('Footer Navigation', 'elevatum'),
]);
