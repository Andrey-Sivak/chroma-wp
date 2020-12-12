<?php
$short_introduce = get_field('short_introduce');
if ( !empty($short_introduce) ) :
    if( $short_introduce['caption'] ) : ?>
      <section class="short-introduce">
        <div class="container">
          <?php if( $short_introduce['photo'] ) : ?>
          <div class="introduce__img">
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
              <figure class="introduce__photo_wrap">
                <img src="<?= $short_introduce['photo'] ?>" alt="img" class="introduce__photo_img">
              </figure>
            </div>
          </div>
          <?php endif; ?>
          <div class="short-introduce__content">
            <?php if( $short_introduce['caption'] ) : ?>
            <h2 class="short-introduce__caption"><?= $short_introduce['caption']; ?></h2>
            <?php endif;
            if( $short_introduce['subcaption'] ) : ?>
            <p class="short-introduce__text"><?= $short_introduce['subcaption']; ?></p>
            <?php endif;
            if( $short_introduce['link_text'] ) : ?>
            <a href="<?= esc_url( get_permalink( get_page_by_title( 'About us' ) ) ); ?>" class="btn short-introduce__btn"><?= $short_introduce['link_text']; ?></a>
            <?php endif; ?>
          </div>
        </div>
      </section>
    <?php endif; ?>
<?php endif; ?>
