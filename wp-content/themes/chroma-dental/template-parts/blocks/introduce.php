<?php

$block_content = get_field('introduce_block');
?>
<?php if ( have_rows( 'introduce_block' ) ): ?>
<?php while ( have_rows( 'introduce_block' ) ) : the_row(); ?>
<?php if($block_content['main_caption']) : ?>
  <section id="<?php echo esc_attr( $id ); ?>" class="container introduce">
			<h2 class="introduce__caption"><?= $block_content['main_caption']; ?></h2>
			<div class="introduce__content">
		  <?php if($block_content['photo']) : ?>
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
							  <img src="<?= $block_content['photo']; ?>" alt="img" class="introduce__photo_img">
						</figure>
					</div>
				</div>
	      <?php endif; ?>
				<div class="introduce__text-content">
					<p class="introduce__text-content_caption"><?= $block_content['list_title']; ?></p>
					<ul class="bull-list">
						<?php $list = $block_content['list'];
						if( !empty($list) ) :
              foreach ($list as $list_item) : ?>
              <li class="bull-list_item"><?= $list_item['list_item']; ?></li>
              <?php endforeach;
            endif; ?>
					</ul>

					<?php get_template_part('template-parts/components/order-free-consultation'); ?>
				</div>
			</div>
    </section>
		<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
