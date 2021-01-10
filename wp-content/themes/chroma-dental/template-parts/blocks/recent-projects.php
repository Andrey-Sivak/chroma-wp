<aside class="recent-posts">
	<p class="recent-posts__header">Recent posts</p>
	<?php $params = ['posts_per_page' => 5, 'tax_query' => [
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => 'post-format-aside',
			'operator' => 'NOT IN'
		),
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => 'post-format-image',
			'operator' => 'NOT IN'
		)
	]];

	$recent_posts = wp_get_recent_posts( $params );

	foreach ($recent_posts as $recent_post) :
//    get the post ID
		$recent_post_ID = $recent_post["ID"];
//    get post title
		$trimmed_post = wp_trim_words( $recent_post["post_title"], 12, '...' );
//    get post recent modified date
		$post_recent_modified = strtotime($post->post_modified);
		$post_recent_modified_value = date( 'F j, Y', $post_recent_modified );
//    get post link
		$recent_post_link = get_permalink($recent_post_ID);
//	  get post image
		$recent_post_img = get_the_post_thumbnail_url($recent_post_ID); ?>

		<div class="recent-posts__item">
			<div class="recent-posts__item_content">
				<?php if ( $recent_post_img ) : ?>
					<a href="<?= $recent_post_link; ?>" class="recent-posts__item_image">
						<img src="<?= $recent_post_img; ?>" alt="img">
					</a>
				<?php endif; ?>
				<a href="<?= $recent_post_link; ?>" class="recent-posts__item_title"><?= $trimmed_post; ?></a>
			</div>
			<p class="recent-posts__item_metadata"><?= $post_recent_modified_value ?></p>
		</div>
	<?php endforeach; ?>

</aside>