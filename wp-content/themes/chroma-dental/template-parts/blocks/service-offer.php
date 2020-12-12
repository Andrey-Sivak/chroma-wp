<?php $service_offer = get_field('service_offer');
$reviews = $service_offer['service_offer'];
if ( !empty($service_offer) ) :
    if( $service_offer['section_caption'] ) : ?>
      <section class="service-offer">
        <div class="container">
          <?php if( $service_offer['section_caption'] ) : ?>
          <h2 class="service-offer__caption"><?= $service_offer['section_caption']; ?></h2>
          <?php endif; ?>
          <div class="service-offer__content">
            <?php if( $service_offer['text'] ) : ?>
            <div class="service-offer__content_text-block">
              <p><?= $service_offer['text']; ?></p>
              <?php get_template_part('template-parts/components/order-free-consultation'); ?>
            </div>
            <?php endif; ?>
            <div class="service-offer__content_btns-block">
              <?php $service_offer_btns = $service_offer['buttons'];
              if( $service_offer_btns ) :
              foreach( $service_offer_btns as $service_offer_btn ) : ?>
              <div class="service-offer__content_btn">
                <a href="<?= get_field('external_link', 'option'); ?>"><?= $service_offer_btn['link_text']; ?></a>
                <p><?= $service_offer_btn['few_description']; ?></p>
              </div>
              <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
<?php endif; ?>
