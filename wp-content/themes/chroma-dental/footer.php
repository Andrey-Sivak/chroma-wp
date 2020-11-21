<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chroma_Dental
 */

?>

  <footer class="footer">
  <div class="container">
    <div class="footer__header">
      <a href="<?= get_home_url(); ?>">
        <figure class="footer__header_logo">
          <img src="<?php the_field('footer_logo', 'option'); ?>" alt="chroma dental" class="footer__header_logo-img">
        </figure>
      </a>
      <a href="<?= get_home_url(); ?>" class="footer__header_link">home</a>
      <a href="<?= esc_url( get_permalink( get_page_by_title( 'About us' ) ) ); ?>" class="footer__header_link">about us</a>
      <a href="<?= esc_url( get_permalink( get_page_by_title( 'Contact us' ) ) ); ?>" class="footer__header_link">contact us</a>
    </div>
    <div class="footer__main">
      <address class="footer__address">
        <p><?php the_field('address', 'option'); ?></p>
        <p>Tel: <?php the_field('phone', 'option'); ?></p>
      </address>
	    <?php $services_pages_query = new WP_Query();
	    $all_wp_pages = $services_pages_query->query([
		    'post_type' => 'page',
	      'posts_per_page' => -1,
	    ]);

	    $services_parent_page = get_page_by_title('Services');
	    $services_children = get_page_children($services_parent_page->ID, $all_wp_pages);

	    if($services_children) : ?>
      <div class="footer__services">
        <p class="footer__services_caption">services:</p>
        <div class="footer__services_wrap">
	        <?php foreach($services_children as $services_child) : ?>
          <a href="<?= $services_child->guid; ?>" class="footer__services_item"><?= $services_child->post_title; ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php  if( have_rows('footer_links', 'option') ): ?>
  <div class="footer__links">
    <div class="footer__links_wrap">
      <?php while( have_rows('footer_links', 'option') ): the_row(); ?>
        <a href="<?php the_sub_field('link') ?>" class="footer__links_link"><?php the_sub_field('link_text') ?></a>
      <?php endwhile; ?>
      <a href="<?= get_home_url() . '/wp-sitemap.xml' ?>" class="footer__links_link">Sitemap XML</a>
    </div>
  </div>
  <?php endif; ?>
</footer>

	<!--<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php /*echo esc_url( __( 'https://wordpress.org/', 'chroma-dental' ) ); */?>">
				<?php
/*				printf( esc_html__( 'Proudly powered by %s', 'chroma-dental' ), 'WordPress' );
				*/?>
			</a>
			<span class="sep"> | </span>
				<?php
/*				printf( esc_html__( 'Theme: %1$s by %2$s.', 'chroma-dental' ), 'chroma-dental', '<a href="http://underscores.me/">Underscores.me</a>' );
				*/?>
		</div>
	</footer>-->
</div>

<?php wp_footer(); ?>

</body>
</html>
