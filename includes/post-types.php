<?php

/**
 * Custom Post Types
 */

function register_custom_post_types()
{
    // posts label override
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = 'Library';
    $labels->singular_name = 'Post';
    $labels->add_new = 'Add Post';
    $labels->add_new_item = 'Add Post';
    $labels->edit_item = 'Edit Post';
    $labels->new_item = 'Post';
    $labels->view_item = 'View Library';
    $labels->search_items = 'Search Library';
    $labels->not_found = 'No posts found.';
    $labels->not_found_in_trash = 'No posts found in Trash';
    $labels->all_items = 'All Posts';
    $labels->menu_name = 'Library';
    $labels->name_admin_bar = 'Library';
}

add_action('init', 'register_custom_post_types');
