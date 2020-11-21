<?php
/*
 Template Name: Contact
 */
get_header();?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<main id="primary" class="site-main">

    <div class="breadcrumbs">
      <div class="container">
        <p>Home</p>
        <p>></p>
        <p><?php the_title(); ?></p>
      </div>
    </div>

		<section class="container second-section">
			<div class="description-block">
		    <?php $contact_page_caption_block = get_field('caption_block'); ?>
        <h2 class="second-section__main-caption"><?= $contact_page_caption_block['caption']; ?></h2>
		    <?php $contact_page_text_block = get_field('text_block'); ?>
				<h2 class="description-block__caption"><?= $contact_page_text_block['caption']; ?></h2>
				<p class="description-block__text"><?= $contact_page_text_block['text']; ?></p>
        <?php get_template_part('template-parts/components/order-free-consultation'); ?>
          <?php
          $services_parent_page = get_page_by_title('Services');
          $services_pages_query = new WP_Query();
          $all_wp_pages = $services_pages_query->query([
            'post_type' => 'page',
            'posts_per_page' => -1,
            'post_parent' => $services_parent_page->ID,
          ]);

        if($all_wp_pages) : ?>
				<ul class="description-block__services">
					<li class="description-block__services_caption">Our Services</li>
	        <?php foreach($all_wp_pages as $services_child) : ?>
            <li class="description-block__services_item">
              <figure>
                <img src="<?= get_the_post_thumbnail_url($services_child->ID, 'thumbnail'); ?>" alt="icon">
              </figure>
              <a href="<?= $services_child->guid; ?>"><?= $services_child->post_title; ?></a>
            </li>
          <?php endforeach; ?>
				</ul>

        <?php endif; ?>
			</div>
			<div class="info-block">
				<address class="info-block__caption">ADDRESS: <?php the_field('address', 'option'); ?></address>
				<address class="info-block__numbers">
					<p class="info-block__numbers_number">Call: <a href="tel:<?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a></p>
					<p class="info-block__numbers_number">Fax: <a href="fax:<?php the_field('fax', 'option'); ?>"><?php the_field('fax', 'option'); ?></a></p>
				</address>

				<div class="info-block__map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2881.2656754737127!2d-79.38591397100674!3d43.76734362994252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b2d4c7f5fd9bb%3A0x1769d2f59ba6dcfc!2s595%20Sheppard%20Ave%20E%2C%20North%20York%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1602691137167!5m2!1sen!2s" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>

        <?php $schedule = get_field('schedule');
        if ( !empty($schedule) ) : ?>
				<ul class="info-block__schedule">
					<li class="info-block__schedule_caption">Hours of operation</li>
          <?php foreach ($schedule as $schedule_item) :
              if ( !$schedule_item['closed'] ) : ?>
					      <li class="info-block__schedule_item"><?= $schedule_item['day'] . ' ' . $schedule_item['from'] . ' a.m. - ' . $schedule_item['until'] . ' p.m.' ?></li>
              <?php else : ?>
                <li class="info-block__schedule_item info-block__schedule_item-close"><?= $schedule_item['day']; ?> Closed</li>
              <?php endif; ?>
			    <?php endforeach; ?>
				</ul>
        <?php endif; ?>

        <?php $contact_page_external_links = get_field('external_links');
        foreach ($contact_page_external_links as $contact_page_external_link) : ?>
				<div class="info-block__external-links">
					<p class="info-block__external-links_caption"><?= $contact_page_external_link['links_block_title']; ?></p>

          <?php $links = $contact_page_external_link['link']; ?>
			    <?php foreach($links as $link) : ?>
					  <a href="<?= $link['url']; ?>" class="info-block__external-links_link"><?= $link['title']; ?></a>
		      <?php endforeach; ?>

				</div>
		    <?php endforeach; ?>
		    <?php ?>
			</div>
		</section>

		<section class="form-section">
      <div class="container">
        <div class="form-section__wrap">
          <h2 class="form-section__caption">Contact Us</h2>
          <p class="form-section__note">Make sure you fill in all required fields.</p>
          <form action="#" class="form">
            <label for="name" class="form__label">
              First Name*
              <input type="text"
                     name="name"
                     id="name"
                     class="form__input">
            </label>
            <label for="email" class="form__label">
              Email*
              <input type="text"
                     name="email"
                     id="email"
                     class="form__input">
            </label>
            <label for="phone" class="form__label">
              Phone*
              <input type="text"
                     name="phone"
                     id="phone"
                     class="form__input">
            </label>
            <label for="message" class="form__label">
              Message
              <textarea name="message" id="message" class="form__input"> </textarea>
            </label>
            <button class="btn form__btn" type="submit">submit</button>
          </form>
        </div>
      </div>
		</section>

	</main>



<?php endwhile; wp_reset_query(); ?>
<?php get_footer();
