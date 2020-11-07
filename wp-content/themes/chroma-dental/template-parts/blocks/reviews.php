<?php $reviews_block = get_field('reviews');
$reviews = $reviews_block['review'];
if ( !empty($reviews) ) : ?>
    <div class="reviews">
      <?php foreach ($reviews as $review) : ?>
      <div class="review">
        <?php if ($review['caption']) : ?>
        <p class="review__caption"><?= $review['caption']; ?></p>
        <?php endif; ?>
        <div class="review__content">
          <div class="review__img">
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
              <figure>
                <img src="<?= $review['img']; ?>" alt="img">
              </figure>
            </div>
          </div>
          <div class="review__text-block">
	          <?php if ($review['service']) :?>
            <?php $service_ID = url_to_postid( $review['service'] ); ?>
            <p class="review__text-block_caption"><a href="<?= $review['service']; ?>"><?= get_the_title( $service_ID ); ?></a> Downtown Toronto | Liberty Village Dentistry</p>
            <?php endif; ?>
            <p class="review__text"><?= $review['text']; ?></p>
            <?php get_template_part('template-parts/components/order-free-consultation'); ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
<?php endif; ?>
