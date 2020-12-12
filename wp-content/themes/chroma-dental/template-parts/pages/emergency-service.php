<?php
$result_link = get_permalink( get_the_ID() ) . 'result';
?>

<div class="emergency">

	<section class="second-section">
		<h2 class="second-section__caption">DENTAL EMERGENCY SERVICE</h2>
		<p class="second-section__subcaption">Emergency Dentist Toronto, North York</p>
		<p class="second-section__subcaption">Immediate Appointment </p>
		<span class="second-section__call">CALL: <a href="tel:324-234-4545">(324) 234-4545</a></span>

		<form action="<?= get_template_directory_uri() . '/mail.php'; ?>" method="post" class="second-section__form">
			<p class="second-section__form_head">Or submit your personal details and we will Immediately contact you</p>
      <div class="form-page__form_formgroup hidden">
        <label for="mail"></label>
        <input type="hidden"
               name="mail"
               id="mail"
               value="<?= get_field('email_for_feedback', 'option') ?>">
      </div>

      <div class="form-page__form_formgroup hidden">
        <label for="page"></label>
        <input type="hidden"
               name="page"
               id="page"
               value="<?= get_permalink( get_the_ID() ); ?>">
      </div>

			<div class="second-section__form_formgroup">
				<label for="first-name" class="second-section__form_label">First Name*</label>
				<input type="text"
				       class="second-section__form_input"
				       id="first-name"
               name="first-name"
				       placeholder="First Name*">
			</div>
			<div class="second-section__form_formgroup">
				<label for="last-name" class="second-section__form_label">Last Name*</label>
				<input type="text"
				       class="second-section__form_input"
				       id="last-name"
               name="last-name"
				       placeholder="Last Name*">
			</div>
			<div class="second-section__form_formgroup">
				<label for="phone" class="second-section__form_label">Phone*</label>
				<input type="text"
				       class="second-section__form_input"
				       id="phone"
               name="phone"
				       placeholder="Phone*">
			</div>
			<div class="second-section__form_formgroup">
				<label for="check" class="second-section__form_label checkbox">
					<input type="checkbox"
					       class="second-section__form_input"
					       id="check">
					<span class="second-section__form_input checkbox"></span>
					<span class="req">*Required</span>
					<span class="text">Your personal data will be processed in accordance with our <a href="#">Privace Statement</a></span>
				</label>
			</div>
			<button class="second-section__form_btn" type="submit" id="emergency__form_btn" data-link="<?= $result_link; ?>">submit</button>
		</form>
	</section>

	<?php
	get_template_part('template-parts/blocks/covid');
	?>

	<section class="third-section container">
		<h2 class="service__section-caption">Emergency dentist near you at North York, Toronto</h2>
		<div class="third-section__content">
			<div class="third-section__left">
				<?php get_template_part('template-parts/blocks/about-service-with-img'); ?>
			</div>
			<div class="third-section__right">
				<address class="third-section__right_address">
					<p>ADDRESS: 4773 Yonge St Unit 3B, North York, ON M2N 5M5, North York, Toronto, Ontario</p>
				</address>
				<div class="third-section__right_map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2881.2656754737127!2d-79.38591397100674!3d43.76734362994252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b2d4c7f5fd9bb%3A0x1769d2f59ba6dcfc!2s595%20Sheppard%20Ave%20E%2C%20North%20York%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1602691137167!5m2!1sen!2s" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
        <div class="map-img"></div>
        <div class="places">
          <div class="place">
            <p class="place__caption">595 Sheppard Ave E, North York, ON Unit #206,207 and 208</p>
          </div>
          <div class="place">
            <p class="place__caption">We are just across from Bayview Village Shopping Centre</p>
          </div>
          <div class="place">
            <p class="place__caption">FREE Visitor Parking Easy access to 401, DVP</p>
          </div>
        </div>
			</div>
		</div>
	</section>

	<?php get_template_part('template-parts/blocks/about-service'); ?>
</div>
