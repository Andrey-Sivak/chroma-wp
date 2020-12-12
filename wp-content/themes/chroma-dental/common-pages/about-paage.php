<?php
/*
 Template Name: About
 */
get_header();?>

	<main id="primary" class="site-main about">

    <div class="breadcrumbs">
      <div class="container">
        <p>Home</p>
        <p>></p>
        <p><?php the_title(); ?></p>
      </div>
    </div>

    <?php $introduce_block = get_field('introduce_block'); ?>
		<section class="first-section">
      <div class="container">
        <div class="first-section__text-content">
          <h2 class="first-section__text-content_caption"><?= $introduce_block['caption']; ?></h2>
          <p class="first-section__text-content_text"><?= $introduce_block['text']; ?></p>
        </div>
        <div class="first-section__photo">
          <div class="octagon">
          <span class="octagon_item octagon_top">
            <span class="corner"></span>
          </span>
            <span class="octagon_item octagon_rt">
            <span class="corner"></span>
          </span>
            <span class="octagon_item octagon_lt">
            <span class="corner"></span>
          </span>
            <span class="octagon_item octagon_bottom">
            <span class="corner"></span>
          </span>
            <figure class="first-section__photo_wrap">
              <img src="<?= $introduce_block['photo']; ?>" alt="img" class="first-section__photo_img">
            </figure>
          </div>
        </div>
      </div>
		</section>

    <?php $philosophy_block = get_field('our_philosophy'); ?>
		<section class="second-section">
      <div class="container">
        <h2 class="second-section__caption"><?= $philosophy_block['caption']; ?></h2>
        <p class="second-section__text"><?= $philosophy_block['text']; ?></p>
        <blockquote>
          <p>“<?= $philosophy_block['quote']; ?>”</p>
        </blockquote>
        <address rel="author">
          <p><?= $philosophy_block['author']; ?></p>
        </address>
      </div>
		</section>

    <?php $about = get_field('about');
    $diplomas = $about['diplomas']; ?>
		<section class="third-section">
			<div class="third-section__bg1-help"></div>
			<div class="container third-section__wrap">
				<div class="third-section__diplomas">
					<div class="octagon">
          <span class="octagon_item octagon_top">
            <span class="corner"></span>
          </span>
						<span class="octagon_item octagon_rt">
            <span class="corner"></span>
          </span>
						<span class="octagon_item octagon_lt">
            <span class="corner"></span>
          </span>
						<span class="octagon_item octagon_bottom">
            <span class="corner"></span>
          </span>
          <?php foreach ($diplomas as $diploma) : ?>
          <figure class="third-section__diplomas_item">
            <a href="<?= $diploma['diploma_large']; ?>" data-fancybox>
              <img src="<?= $diploma['diploma_min']; ?>" alt="img" class="third-section__diplomas_img">
            </a>
          </figure>
          <?php endforeach; ?>
					</div>
				</div>
				<div class="third-section__text-content">
					<h2 class="third-section__text-content_caption"><?= $about['caption']; ?></h2>
					<p class="third-section__text-content_text"><?= $about['text']; ?></p>
				</div>
			</div>
		</section>

	  <?php $partners = get_field('partners');
	  if( !empty( $partners ) ) : ?>
        <section class="partners container">
          <div class="partners__wrap">
			  <?php foreach ( $partners as $partner ) : ?>
                <figure class="partners__image">
                  <img src="<?= $partner['image']; ?>" alt="img">
                </figure>
			  <?php endforeach; ?>
          </div>
        </section>
	  <?php endif; ?>

	</main>

<?php get_footer();
