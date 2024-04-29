<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function(){
	if (file_exists(get_stylesheet_directory() . '/assets/blocks/css/test-block.css')) {
		wp_register_style(
			'test-block',
			get_stylesheet_directory_uri() . '/assets/blocks/css/test-block.css'
		);
	}

	Block::make( __( 'Test Block' ) )
	->add_fields( array(
		Field::make( 'text', 'heading', __( 'Block Heading' ) ),
		Field::make( 'image', 'image', __( 'Block Image' ) ),
		Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
		Field::make('complex', 'list-items', __('List Items'))
			->add_fields(array(
				Field::make('image', 'icon', __('Icon')),
				Field::make('rich_text', 'content', __('Content'))
			))
	) )
	->set_style('test-block')
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		include(get_stylesheet_directory() . '/src/blocks/test-block/render.php');
	} ); 	
});