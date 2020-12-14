<?php
/*
 Template Name: Main
 */
get_header();?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<main id="primary" class="site-main home">

    <section class="slider-section">
      <div class="slider">
        <div class="slider__wrap">
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
            <div class="container">
              <div class="slider__item_content">
                <h2 class="slider__item_caption">Transform your smile with Invisible Braces for 199 $ a month</h2>
                <p class="slider__item_text">How does invisible bracelets treatment work?</p>
                <p class="slider__item_text">3 easy steps can put you on the path to your brand-new smile.</p>
                <a href="<?= esc_url( get_permalink( get_page_by_title( 'Dental Bonding' ) ) ); ?>" class="btn slider__item_btn">see more</a>
              </div>
            </div>
          </div>
          <div class="slider__item four">
            <div class="map">
              <address>595 Sheppard Ave E, North York, ON Unit #206,207 and 208</address>
              <div class="subway">
                <p class="subway__icon">m</p>
                <p class="subway__caption">Bayview subway station</p>
                <span>(Steps from the new Bayview Subway Station)</span>
              </div>
              <div class="location">
                <p>Bayview Village <br>Shopping Center</p>
                <img src="<?= get_template_directory_uri() . '/dist/img/home-page/slider/location.png'; ?>" alt="img">
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
          <div class="slider__item five">
            <div class="container">
              <h2 class="slider__item_caption">Our children smile in the same language</h2>
              <p class="slider__item_text">Children-Friendly Dentists - Comfortable & Anxiety-Free</p>
              <a href="<?= esc_url( get_permalink( get_page_by_title( 'Children`s Dentistry' ) ) ); ?>" class="btn slider__item_btn">see more</a>
            </div>
          </div>
        </div>
        <div class="slider__dots" id="dots"></div>
      </div>
      <div class="slider__offer wow animate__fadeInRightBig" data-wow-offset="10" data-wow-duration="1s">
        <p class="slider__offer_text">Plan Your Visit Now</p>
        <a href="<?= get_field('external_link', 'option'); ?>" class="btn slider__offer_btn">book an appointment</a>
        <p class="slider__offer_phone">Call us: &nbsp;&nbsp;&nbsp;<a href="tel:<?= get_field('phone', 'option') ?>"><?= get_field('phone', 'option') ?></a></p>
      </div>
    </section>

    <?php $covid_section = get_field('covid_block', 'option');
    if ($covid_section) {
	    get_template_part('template-parts/blocks/covid');
    } ?>

    <?php $first_text_block = get_field('home-first-text_block'); ?>
    <section class="third-section">
      <div class="container">
        <div class="banner wow animate__fadeInLeftBig" data-wow-offset="10" data-wow-duration="1s">
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

    <?php
      $services_parent_page = get_page_by_title('Services');
      $services_pages_query = new WP_Query();
      $all_wp_pages = $services_pages_query->query([
         'post_type' => 'page',
         'posts_per_page' => -1,
         'post_parent' => $services_parent_page->ID,
      ]);

      if($all_wp_pages) : ?>
      <section class="four-section">
        <div class="container">
          <div class="banner wow animate__fadeInRightBig" data-wow-offset="10" data-wow-duration="1s">
            <div class="banner__wrap">
              <span class="banner__rt-top corner"></span>
              <span class="banner__lt-top corner"></span>
              <span class="banner__rt-bottom corner"></span>
              <span class="banner__lt-bottom corner"></span>
              <h2 class="banner__caption">Our Services</h2>
              <div class="four-section__list">
		          <?php foreach($all_wp_pages as $services_child) : ?>

                    <div class="four-section__list_item">
                      <figure class="four-section__list_item-img-wrap">
                        <img src="<?= get_the_post_thumbnail_url($services_child->ID, 'thumbnail'); ?>" type="image/png" alt="icon" class="four-section__list_item-img">
                      </figure>
                      <a href="<?= $services_child->guid; ?>" class="four-section__list_item-text"><?= $services_child->post_title; ?></a>
                    </div>

		          <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php $image_block = get_field('image_block'); ?>

    <section class="five-section"></section>

    <script>
        const fiveSectionContent = `
      <div class="container">

        <h2 class="five-section__caption"><?= $image_block['caption']; ?></h2>
        <div class="beer-slider" id="beer-slider" data-beer-label="before">
          <img src="<?= get_template_directory_uri() . '/dist/img/home-page/five-section-img-before.jpg'; ?>" alt="img" class="five-section__img beer-slider__img">
          <div class="beer-reveal" data-beer-label="after">
            <img src="<?= get_template_directory_uri() . '/dist/img/home-page/five-section-img.png'; ?>" alt="img" class="five-section__img beer-slider__img">
          </div>
        </div>

        <div class="beer-slider" id="beer-slider-mob" data-beer-label="before">
          <img src="<?= get_template_directory_uri() . '/dist/img/home-page/five-section-img-before-mob.jpg'; ?>" alt="img" class="five-section__img mob beer-slider__img">
          <div class="beer-reveal" data-beer-label="after">
            <img src="<?= get_template_directory_uri() . '/dist/img/home-page/five-section-img-mob.jpg'; ?>" alt="img" class="five-section__img mob beer-slider__img">
          </div>
        </div>
\t      <?php get_template_part( 'template-parts/components/order-free-consultation' ); ?>
      </div>`;
        const fiveSectionWrap = document.querySelector('.five-section');

        let scrollCheckFiveSec = true;
        window.addEventListener('scroll', function (e) {
            let scroll = document.documentElement.scrollTop;
            if( scrollCheckFiveSec ) {
                if( scroll >= 1000 ) {
                    fiveSectionWrap.insertAdjacentHTML('afterbegin', fiveSectionContent );

                    setTimeout(function () {
                        new BeerSlider(document.getElementById('beer-slider'));
                        new BeerSlider(document.getElementById('beer-slider-mob'));
                    } ,500);
                    scrollCheckFiveSec = false;
                }
            }
        })
    </script>

    <section class="six-section container">
      <div class="six-section__text-wrap">
        <img src="<?= get_template_directory_uri() . '/dist/img/home-page/schedule-icon.png' ?>" alt="img" class="six-section__img">
        <?php $schedule = get_field('schedule');
        foreach ($schedule as $schedule_item) : ?>
        <p class="six-section__text"><?= $schedule_item['days'] . ' ' . $schedule_item['from'] . 'a.m. - ' . $schedule_item['until'] . 'p.m.'; ?></p>
        <?php endforeach; ?>
      </div>
      <div class="six-section__text-wrap">
        <img src="<?= get_template_directory_uri() . '/dist/img/home-page/location-icon.png' ?>" alt="img" class="six-section__img">
        <p class="six-section__text"><?php the_field('address', 'option'); ?></p>
      </div>
      <div class="six-section__text-wrap ">
        <img src="<?= get_template_directory_uri() . '/dist/img/home-page/phone-icon.png' ?>" alt="img" class="six-section__img">
        <a href="tel:<?php the_field('phone', 'option'); ?>" class="six-section__caption" style="color: #000"><?php the_field('phone', 'option'); ?></a>
      </div>
      <a href="<?= get_field('external_link', 'option'); ?>" class="btn six-section__btn">Book an appointment today</a>
    </section>

    <div class="seven-section"></div>

	</main><!-- #main -->

<?php endwhile; wp_reset_query(); ?>
<?php get_footer();?>
<script src=" <?= get_template_directory_uri() . '/dist/libs/BeerSlider.js'; ?>"></script>
