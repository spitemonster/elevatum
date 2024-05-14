<?php 
extract(
	wp_parse_args($args, [
	  "post" => null,
	  "atts" => null
	])
  );

  if (empty($atts)) {
	$atts = ["class" => "post-card"];
  } else {
	$atts["class"] = $atts["class"] . " post-card";
  }

  $att_string = implode(" ", array_map(function ($key, $value) {
	return "$key='$value'";
}, array_keys($atts), $atts));

  if (!empty($post)) :

	$tags = get_the_terms($post->id, "tag");
?>
<a <?= $att_string; ?> href="<?= get_permalink( $post ); ?>">
	<figure>
		<img width="100%" style="aspect-ratio: 3/2;" src="https://picsum.photos/300/200" alt="placeholder image!" />
		<figcaption>
			<?php if (!empty($tags)): ?>
				<ul class="tags">
					<?php foreach ($tags as $tag): ?>
						<li><?= $tag->name; ?></li>
					<?php endforeach ?>
				</ul>
			<?php endif; ?>
			<p class="has-h-5-font-size">
				<?= $post->post_title ?>
			</p>
		</figcaption>
	</figure>
</a>
<?php else: ?>
	<p>There has been an error.</p>
<?php endif; ?>