<?php $covid = get_field('covid_block', 'option'); ?>
    <section class="covid">
      <div class="container">
          <h2 class="covid__caption"><?= $covid['caption']; ?></h2>
          <p class="covid__subcaption"><?= $covid['subcaption']; ?></p>
          <div class="covid__content">
            <?php $list = $covid['list'];
            foreach ($list as $list_item) : ?>
              <div class="covid__item">
                  <p class="covid__item_caption"><?= $list_item['caption']; ?></p>
                  <p class="covid__item_text"><?= $list_item['text']; ?></p>
              </div>
            <?php endforeach; ?>
          </div>
      </div>
    </section>