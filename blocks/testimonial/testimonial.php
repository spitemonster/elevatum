<?php

	extract(wp_parse_args($args, [
		"post" => $post,
		"block" => null,
		"is_preview" => null,
		"class_name" => null,
		"style" => ''
	]));

	$class = implode(" ", array_filter([
		"testimonial",
		$class_name
	]));

	$style = get_block_styles($block);

	$atts = array_filter(["class" => $class, "id" => $id, "style" => $style]);
	$att_string = implode(" ", array_map(function ($key, $value) {
		return "$key='$value'";
	}, array_keys($atts), $atts));

	// Add a condition here for the block to render; this is just a placeholder
	if(!empty($att_string) && function_exists("get_field")):

		$body = get_field("body");
		$image = get_field("image");
		$source = get_field("source_name");
		$org = get_field("source_org");

?>

<div class="testimonial">
	<?= apply_filters('the_content', $body); ?>
	<div class="source">
		<img src="<?= wp_get_attachment_url( $image, '54'); ?>" />
		<div>
		<strong><?= $source; ?></strong> <br/>
		<?= $org; ?>
		</div>
	</div>
</div>

<?php elseif ($is_preview): ?>
	<p class="d-inline-block p-2 border border-danger text-danger">Please populate all required fields to preview.</p>
<?php endif; ?>