<?php
/*
 Template Name: Main
 */
get_header();?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<main id="primary" class="site-main home">

    <section class="slider">
      <div class="slider__wrap owl-carousel">
        <div class="slider__item first">
          <div class="container">
            <div class="slider__item_content">
              <h2 class="slider__item_caption">Smile!</h2>
              <p class="slider__item_subcaption">It suits you</p>
              <p class="slider__item_text">1000+ happy smiles in Canada</p>
            </div>
          </div>
        </div>
        <div class="slider__item second">
          <?php get_template_part('template-parts/blocks/covid'); ?>
        </div>
        <div class="slider__item third">
          <div class="slider__item_content">
            <h2 class="slider__item_caption">Transform your smile with Invisalign® for 125 $ a month</h2>
            <p class="slider__item_text">How does Invisalign® treatment work?</p>
            <p class="slider__item_text">3 easy steps can put you on the path to your brand-new smile.</p>
            <a href="#" class="btn slider__item_btn">Book an appointment today</a>
          </div>
        </div>
        <div class="slider__item four">
          <div class="map">
            <address>595 Sheppard Ave E, North York, ON Unit #206,207 and 208</address>
            <div class="subway">
              <p class="subway__caption">Bayview subway station</p>
              <p class="subway__icon">m</p>
            </div>
          </div>
          <div class="places">
            <div class="place">
              <p class="place__caption">595 Sheppard Ave E, North York, ON Unit #206,207 and 208</p>
            </div>
            <div class="place">
              <p class="place__caption">We are just across from Bayview Village Shopping Centre</p>
            </div>
            <div class="place">
              <p class="place__caption">FREE Visitor Parking Easy access to 401, DVP</p>
            </div>
          </div>
        </div>
      </div>
      <div class="slider__offer">
        <p class="slider__offer_text">Plan Your Visit Now</p>
        <a href="#" class="btn slider__offer_btn">book an appointment</a>
      </div>
      <div class="slider__dots"></div>
    </section>

    <?php $covid_section = get_field('covid_block', 'option');
    if ($covid_section) {
	    get_template_part('template-parts/blocks/covid');
    } ?>

    <?php $first_text_block = get_field('home-first-text_block'); ?>
    <section class="third-section">
      <div class="container">
        <div class="banner">
          <div class="banner__wrap">
            <span class="banner__rt-top corner"></span>
            <span class="banner__lt-top corner"></span>
            <span class="banner__rt-bottom corner"></span>
            <span class="banner__lt-bottom corner"></span>
            <h2 class="banner__caption"><?= $first_text_block['caption']; ?></h2>
            <p class="banner__text"><?= $first_text_block['text']; ?></p>
            <a href="<?= $first_text_block['link']; ?>" class="banner__link"><?= $first_text_block['button_text']; ?></a>
          </div>
        </div>
      </div>
    </section>

    <?php $services_pages_query = new WP_Query();
      $all_wp_pages = $services_pages_query->query([
         'post_type' => 'page',
         'posts_per_page' => -1,
      ]);

      $services_parent_page = get_page_by_title('Services');
      
      $services_children = get_page_children($services_parent_page->ID, $all_wp_pages);

      if($services_children) : ?>
      <section class="four-section">
        <div class="container">
          <div class="banner">
            <div class="banner__wrap">
              <span class="banner__rt-top corner"></span>
              <span class="banner__lt-top corner"></span>
              <span class="banner__rt-bottom corner"></span>
              <span class="banner__lt-bottom corner"></span>
              <h2 class="banner__caption">Our Services</h2>
              <div class="four-section__list">
		          <?php foreach($services_children as $services_child) : ?>

                    <div class="four-section__list_item">
                      <figure class="four-section__list_item-img-wrap">
                        <img src="<?= get_the_post_thumbnail_url($services_child->ID, 'thumbnail'); ?>" alt="icon" class="four-section__list_item-img">
                      </figure>
                      <p class="four-section__list_item-text"><?= $services_child->post_title; ?></p>
                    </div>

		          <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php $image_block = get_field('image_block'); ?>
    <section class="five-section">
      <div class="container">
        <h2 class="five-section__caption"><?= $image_block['caption']; ?></h2>
        <p class="sale-block">LIMITED 50% OFF November SALE! <span>Regularly $499</span> NOW $199 !!!</p>
        <div class="five-section__wrap-img">
          <span class="five-section__circle"></span>
          <p class="five-section__img-text">slide and see</p>
          <img src="<?= get_template_directory_uri() . '/dist/img/home-page/five-section-img.png'; ?>" alt="img" class="five-section__img">
        </div>
      </div>
    </section>

    <section class="six-section container">
      <h2 class="six-section__caption">Hours of Operation</h2>
      <div class="six-section__text-wrap">
        <?php $schedule = get_field('schedule');
        foreach ($schedule as $schedule_item) : ?>
        <p class="six-section__text"><?= $schedule_item['days'] . ' ' . $schedule_item['from'] . 'a.m. - ' . $schedule_item['until'] . 'p.m.'; ?></p>
        <?php endforeach; ?>
      </div>
      <h2 class="six-section__caption">Address</h2>
      <div class="six-section__text-wrap">
        <p class="six-section__text"><?php the_field('address', 'option'); ?></p>
      </div>
      <div class="six-section__text-wrap">
        <p class="six-section__text">Phone</p>
      </div>
      <div class="six-section__text-wrap">
        <p class="six-section__text">Tel: <?php the_field('phone', 'option'); ?></p>
      </div>
      <a href="#" class="btn six-section__btn">Book and appointment today</a>
    </section>

    <div class="seven-section">
      <iframe class="seven-section__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2881.2656754737127!2d-79.38591397100674!3d43.76734362994252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b2d4c7f5fd9bb%3A0x1769d2f59ba6dcfc!2s595%20Sheppard%20Ave%20E%2C%20North%20York%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1602691137167!5m2!1sen!2s" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

	</main><!-- #main -->

<?php endwhile; wp_reset_query(); ?>
<?php get_footer();
