<?php

// register custom taxonomies

add_action("init", function()
{
  register_taxonomy(
    "tag",
    ["case-study"],
    [
		"labels" => array(
			"name" => _x( "Tags", "taxonomy general name" ),
			"singular_name" => _x( "Tag", "taxonomy singular name" ),
			"search_items" =>  __( "Search Tags" ),
			"all_items" => __( "All Tags" ),
			"parent_item" => __( "Parent Tag" ),
			"parent_item_colon" => __( "Parent Tag:" ),
			"edit_item" => __( "Edit Tag" ),
			"update_item" => __( "Update Tag" ),
			"add_new_item" => __( "Add New Tag" ),
			"new_item_name" => __( "New Tag Name" ),
			"menu_name" => __( "Tags" ),
		  ),
      "hierarchical" => false,
      "show_in_rest" => true,
      "show_admin_column" => true,
      "rewrite" => [
        "slug" => "type",
        "with_front" => true,
      ],
    ]
  );
});
