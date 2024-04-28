<?php

// auto register blocks
add_action('init', function () {
    foreach (glob(get_stylesheet_directory() . '/src/blocks/*/') as $block_dir) {
        $block_name = basename($block_dir);
        $block_dist_path = trailingslashit(
            $block_dir . 'build/'
        );
        $block_dist_uri = trailingslashit(
            get_template_directory_uri() . '/src/blocks/' . $block_name . '/build/'
        );

        register_block_type($block_dir, [
            'render_callback' => 'carney_render_block',
        ]);

        if (file_exists($block_dist_path . 'index.js')) {
			wp_enqueue_script(
				'my-custom-block-script',
				$block_dist_uri . 'index.js',
				array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'), // Ensure all necessary dependencies.
				filemtime($block_dist_path . 'index.js')
			);
        }
    }
});