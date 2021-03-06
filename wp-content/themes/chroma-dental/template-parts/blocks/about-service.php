<?php if ( have_rows( 'about_service' ) ): ?>
  <section id="<?php echo esc_attr( $id ); ?>" class="about-service container">
	  <?php while ( have_rows( 'about_service' ) ) : the_row(); ?>
      <?php if ( get_row_layout() == 'section_caption' ) : ?>
	      <h2 class="about-service__section-caption"><?php the_sub_field( 'section_caption_text' ); ?></h2>
		  <?php elseif ( get_row_layout() == 'simple_text_block' ) : ?>
        <div class="about-service__text-content">
          <p class="about-service__caption"><?php the_sub_field( 'block_caption' ); ?></p>
          <p class="about-service__text"><?php the_sub_field( 'text' ); ?></p>
        </div>
      <?php elseif ( get_row_layout() == 'simple_list' ) : ?>
        <div class="about-service__text-content">
          <p class="about-service__caption"><?php the_sub_field( 'list_caption' ); ?></p>
          <ul class="about-service__list">
            <li class="about-service__text"><?php the_sub_field( 'a_little_description' ); ?></li>
            <?php if ( have_rows( 'list' ) ) : ?>
              <?php while ( have_rows( 'list' ) ) : the_row(); ?>
            <li class="about-service__list_item about-service__text"><span class="bold"><?php the_sub_field( 'item_text_caption' ); ?></span> <?php the_sub_field( 'item_text' ); ?></li>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
		  <?php elseif ( get_row_layout() == 'decor_list' ) : ?>
        <div class="service__text-block">
        <?php if ( get_sub_field( 'caption' ) ) : ?>
                <p class="service__caption"><?php the_sub_field( 'caption' ); ?></p>
        <?php endif; ?>
        <?php if ( have_rows( 'list' ) ) : ?>
                <ul class="bull-list">
            <?php while ( have_rows( 'list' ) ) : the_row(); ?>
                      <li class="bull-list_item"><?php the_sub_field( 'list_item' ); ?></li>
            <?php endwhile; ?>
                </ul>
        <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>

    <?php get_template_part('template-parts/components/order-free-consultation'); ?>
  </section>
<?php endif; ?>