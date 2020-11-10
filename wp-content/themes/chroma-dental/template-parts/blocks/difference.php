<?php $difference = get_field('difference'); ?>

<section class="difference container">
    <h2 class="difference__caption"><?= $difference['caption']; ?></h2>
    <div class="difference__wrap">
      <?php $difference_images = $difference['images'];
      foreach ($difference_images as $difference_image) : ?>
      <figure class="difference__img">
        <img src="<?= $difference_image['img']; ?>" alt="img">
      </figure>
      <?php endforeach; ?>
    </div>
	<?php get_template_part('template-parts/components/order-free-consultation'); ?>
  </section>