<?php $our_team = get_field('about_team', 'option'); ?>

<section class="our-team container">

  <div class="our-team__photo">
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
      <figure class="our-team__photo_wrap">
        <img src="<?= $our_team['photo']; ?>" alt="img" class="our-team__photo_img">
      </figure>
    </div>
  </div>
  <div class="our-team__content">
    <h2 class="our-team__caption"><?= $our_team['caption']; ?></h2>
    <p class="our-team__text"><?= $our_team['text']; ?></p>

    <?php get_template_part('template-parts/components/order-free-consultation'); ?>
		</div>
</section>