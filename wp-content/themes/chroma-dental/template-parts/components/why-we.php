<?php
$why_we = get_field('why_we', 'option');
?>

<section class="why-we container">
	<figure class="why-we__logo">
		<img src="<?= $why_we['logo']; ?>" alt="chroma dental" class="why-we__logo_img">
	</figure>
	<h2 class="why-we__caption"><?= $why_we['caption']; ?></h2>
	<p class="why-we__description"><?= $why_we['description']; ?></p>
	<div class="why-we__reasons">
		<?php $why_we_list = $why_we['benefits_list'];
		foreach ($why_we_list as $why_we_list_item) : ?>
		<div class="why-we__reason">
			<figure class="why-we__reason_img">
				<img src="<?= $why_we_list_item['icon']; ?>" alt="icon">
			</figure>
			<p class="why-we__reason_caption"><?= $why_we_list_item['caption']; ?></p>
			<p class="why-we__reason_text"><?= $why_we_list_item['text']; ?></p>
		</div>
		<?php endforeach; ?>
	</div>
	<p class="why-we__text"><?= $why_we['note']; ?></p>
	<?php get_template_part('template-parts/components/order-free-consultation'); ?>
</section>
