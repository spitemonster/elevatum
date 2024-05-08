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
	add_theme_support( 'wp-block-styles' );
	add_editor_style('assets/css/main.css');
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


// die(var_dump(asset_path('css/main.css')));

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
            asset_path('/scripts/main.js'),
            [],
            THEME_VERSION,
            true
        );
    },
    15
);

register_block_style(
	'core/group',
	array(
		'name'  => 'breakout',
		'label' => __( 'Breakout', 'textdomain' ),
	)
);

register_block_style(
	'core/image',
	array(
		'name'  => 'grayscale',
		'label' => __( 'Grayscale', 'textdomain' ),
	)
);


register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'textdomain'),
    'footer_navigation' => __('Footer Navigation', 'textdomain'),
]);
