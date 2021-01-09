<?php
/*
Template Name: Post template
Template Post Type: post, page, product
*/

// get post
$post_id = get_the_ID();
$post = get_post($post_id);

// get author
$recent_author = get_user_by('ID', $post->post_author);
$author_name = $recent_author->display_name;

// get date
$recent_modified = strtotime($post->post_modified);
$recent_modified_value = date( 'F j, Y', $recent_modified );

// get post title
$title = $post->post_title;

// get post content
$content = $post->post_content;

// get post image
$post_image = get_attached_media('image', $post_id);

// trim text content
$trimmed_content = wp_trim_words( $content, 40, '<a href="'. get_permalink() .'"> ...Read More</a>' );

get_header(); ?>

<main class="post-page container">

  <div class="breadcrumbs">
    <div class="container">
      <p>
        <a href="#">Blog</a>
      </p>
      <p>></p>
      <p>Post</p>
    </div>
  </div>

	<div class="post-content">
		<h1 class="post-content__title"><?= $title; ?></h1>
		<p class="post-content__metadata">By <?= $author_name . ' | ' . $recent_modified_value; ?> | <a href="#">Blog</a></p>
		<?= $content; ?>
	</div>

  <?php get_template_part('/template-parts/blocks/recent-projects'); ?>

	<h1></h1>
</main>

<?php get_footer(); ?>