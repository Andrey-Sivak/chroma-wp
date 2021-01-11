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
      <a href="<?= esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" class="footer__header_link">blog</a>
    </div>
    <div class="footer__main">
      <address class="footer__address">
        <p><?php the_field('address', 'option'); ?></p>
        <p>Tel: <?php the_field('phone', 'option'); ?></p>
        <div class="footer__address_soc-icons">
          <a href="<?= get_field('facebook', 'option'); ?>">
            <img src="<?= get_template_directory_uri() . '/dist/img/icons/fb.png'; ?>" alt="facebook">
          </a>
          <a href="<?= get_field('instagram', 'option'); ?>">
            <img src="<?= get_template_directory_uri() . '/dist/img/icons/inst.png'; ?>" alt="instagram">
          </a>
          <a href="<?= get_field('linkedin', 'option'); ?>">
            <img src="<?= get_template_directory_uri() . '/dist/img/icons/linked.png'; ?>" alt="LinkedIn">
          </a>
        </div>
      </address>
	    <?php
      $services_parent_page = get_page_by_title('Services');
      $services_pages_query = new WP_Query();
	    $all_wp_pages = $services_pages_query->query([
		    'post_type' => 'page',
	      'posts_per_page' => -1,
	      'post_parent' => $services_parent_page->ID,
	    ]);

	    if($all_wp_pages) : ?>
      <div class="footer__services">
        <p class="footer__services_caption">services:</p>
        <div class="footer__services_wrap">
	        <?php foreach($all_wp_pages as $services_child) : ?>
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
      <a href="<?= get_template_directory_uri() . '/sitemap.xml' ?>" class="footer__links_link">Sitemap XML</a>
    </div>
  </div>
  <?php endif; ?>
</footer>
</div>

<?php wp_footer(); ?>

</body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GLJCS4"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</html>
