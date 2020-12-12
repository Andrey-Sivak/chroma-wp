<?php
/*
 Template Name: Result
 */
get_header();

?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<main id="primary" class="site-main result container">

	<div class="result__content">
		<p class="result__content_caption"><?= get_field('caption'); ?></p>
		<p class="result__content_text"><?= get_field('text'); ?></p>

		<?php get_template_part('template-parts/components/order-free-consultation'); ?>
	</div>

</main>

<?php endwhile; wp_reset_query(); ?>
<?php get_footer();?>