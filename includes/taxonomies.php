<?php

// Custom Taxonomies

function register_categories()
{
  register_taxonomy(
    "manuals-tax",
    ["manual"],
    [
      "hierarchical" => true,
      "show_in_rest" => true,
      "show_admin_column" => true,
      "rewrite" => [
        "slug" => "type",
        "with_front" => false,
      ],
    ]
  );

  register_taxonomy(
    "product-sheets-tax",
    ["product-sheet"],
    [
      "hierarchical" => true,
      "show_in_rest" => true,
      "show_admin_column" => true,
      "rewrite" => [
        "slug" => "type",
        "with_front" => true,
      ],
    ]
  );
}

add_action("init", "register_categories");
