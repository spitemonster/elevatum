<?php

/**
 * register custom post types
 */


add_action('init', function()
{

	register_post_type("case-study", [
		"labels" => [
		  "name" => __("Case Studies"),
		  "singular_name" => __("Case Study"),
		  "add_new" => __("Add Case Study"),
		  "add_new_item" => __("Add New Case Study"),
		  "edit" => __("Edit"),
		  "edit_item" => __("Edit Case Study"),
		  "view" => __("View"),
		  "view_item" => __("View Case Study"),
		  "search_items" => __("Search Case Studies"),
		  "all_items" => __("Case Studies"),
		  "not_found" => __("No Case Studies found."),
		  "not_found_in_trash" => __("No Case Studies found in Trash."),
		],
		"has_archive" => false,
		"supports" => ["title", "thumbnail", "excerpt", "editor"],
		"public" => true,
		"menu_icon" => "dashicons-media-document",
		"menu_position" => 6,
		"show_in_rest" => true,
		"rewrite" => ["slug" => "case-studies", "with_front" => false],
	]);

	register_post_type("testimonial", [
		"labels" => [
		  "name" => __("Testimonials"),
		  "singular_name" => __("Testimonial"),
		  "add_new" => __("Add Testimonial"),
		  "add_new_item" => __("Add New Testimonial"),
		  "edit" => __("Edit"),
		  "edit_item" => __("Edit Testimonial"),
		  "view" => __("View"),
		  "view_item" => __("View Testimonial"),
		  "search_items" => __("Search Testimonials"),
		  "all_items" => __("Testimonials"),
		  "not_found" => __("No Testimonials found."),
		  "not_found_in_trash" => __("No Testimonials found in Trash."),
		],
		"has_archive" => false,
		"supports" => ["title", "thumbnail", "excerpt", "editor"],
		"public" => true,
		"menu_icon" => "dashicons-star-filled",
		"menu_position" => 6,
		"show_in_rest" => true,
		"rewrite" => ["slug" => "testimonials", "with_front" => false],
	]);

	register_post_type("faq", [
		"labels" => [
		  "name" => __("Frequently Asked Questions"),
		  "singular_name" => __("Frequently Asked Question"),
		  "add_new" => __("Add Frequently Asked Question"),
		  "add_new_item" => __("Add New Frequently Asked Question"),
		  "edit" => __("Edit"),
		  "edit_item" => __("Edit Frequently Asked Question"),
		  "view" => __("View"),
		  "view_item" => __("View Frequently Asked Question"),
		  "search_items" => __("Search Frequently Asked Questions"),
		  "all_items" => __("Frequently Asked Questions"),
		  "not_found" => __("No Frequently Asked Questions found."),
		  "not_found_in_trash" => __("No Frequently Asked Questions found in Trash."),
		],
		"has_archive" => false,
		"supports" => ["title", "thumbnail", "excerpt", "editor"],
		"public" => true,
		"menu_icon" => "dashicons-editor-ul",
		"menu_position" => 6,
		"show_in_rest" => true,
		"rewrite" => ["slug" => "faqs", "with_front" => false],
	]);
});
