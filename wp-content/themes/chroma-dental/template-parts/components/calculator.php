<?php $calculator = get_field('calculator');
$calculator_items = $calculator['problems_list'];
$calculator_items_img_arr = array();
foreach ($calculator_items as $calculator_item) {
  array_push($calculator_items_img_arr, $calculator_item['image'] );
}
$calculator_items_filter = array_filter($calculator_items_img_arr);

if ($calculator) : ?>

<section id="calculator" class="calculator <?php if(empty($calculator_items_filter)) echo 'no-image'; ?>">
	<div class="calculator__wrap">
		<h2 class="calculator__caption"><?= $calculator['title']; ?></h2>
		<p class="calculator__subcaption"><?= $calculator['note']; ?></p>
		<div class="calculator__select-age calculator__list" id="select-age">
			<p class="calculator__block-note">I am: * (Select one)</p>
			<span class="calculator__select-age_item" data-age="teen">Teen</span>
			<span class="calculator__select-age_item" data-age="parent">Parent</span>
			<span class="calculator__select-age_item" data-age="adult">Adult</span>
		</div>
		<div class="calculator__main calculator__list" id="select-problem">
			<p class="calculator__block-note">How many tooth missed?</p>
      <?php $problems = $calculator['problems_list'];
      foreach ($problems as $problem) : ?>
			<div class="calculator__main_item" data-problem="<?= $problem['text']; ?>">
        <?php if ( $problem['image'] != '' ) : ?>
				<figure class="calculator__main_item-img">
					<img src="<?= $problem['image']; ?>" alt="img">
				</figure>
        <?php endif; ?>
				<p class="calculator__main_item-caption"><?= $problem['text']; ?></p>
			</div>
      <?php endforeach; ?>
		</div>
		<a href="<?= get_permalink( get_page_by_title( 'Form page' ) ); ?>" class="btn calculator__btn">Check</a>
	</div>
</section>
<?php endif;