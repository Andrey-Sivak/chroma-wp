<?php
/*
 Template Name: Form
 */
get_header();

$previous_page = $_SESSION['page'];
$result_link = get_permalink( $previous_page ) . 'result';
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<main id="primary" class="site-main form-page">

	<h1 class="form-page__caption">We’v got your result, introduce yourself!</h1>
	<form action="<?= get_template_directory_uri() . '/mail.php'; ?>"
        method="post"
        class="form-page__form"
        id="form-page__form">

    <div class="form-page__form_formgroup hidden">
      <label for="mail"></label>
      <input type="hidden"
             name="mail"
             id="mail"
             value="<?= get_field('email_for_feedback', 'option') ?>">
    </div>

    <div class="form-page__form_formgroup hidden">
      <label for="age"></label>
      <input type="hidden"
             name="age"
             id="age"
             value="">
    </div>

    <div class="form-page__form_formgroup hidden">
      <label for="page"></label>
      <input type="hidden"
             name="page"
             id="page"
             value="<?= get_permalink( $previous_page ); ?>">
    </div>

    <div class="form-page__form_formgroup hidden">
      <label for="problem"></label>
      <input type="hidden"
             name="problem"
             id="problem"
             value="">
    </div>

		<div class="form-page__form_formgroup">
			<label for="first-name" class="form-page__form_label">First Name*</label>
			<input type="text"
			       name="first-name"
			       id="first-name"
			       class="form-page__form_input"
			       placeholder="First Name*">
		</div>
		<div class="form-page__form_formgroup">
			<label for="last-name" class="form-page__form_label">Last Name*</label>
			<input type="text"
			       name="last-name"
			       id="last-name"
			       class="form-page__form_input"
			       placeholder="Last Name*">
		</div>
		<div class="form-page__form_formgroup">
			<label for="phone" class="form-page__form_label">Phone*</label>
			<input type="text"
			       name="phone"
			       id="phone"
			       class="form-page__form_input"
			       placeholder="Phone*">
		</div>
		<div class="form-page__form_formgroup">
			<label for="check" class="form-page__form_label checkbox">
				<input type="checkbox"
				       class="form-page__form_input"
				       id="check">
				<span class="form-page__form_input checkbox"></span>
				<span class="req">*Required</span>
				<span class="text">Your personal data will be processed in accordance with our <a href="#">Privace Statement</a></span>
			</label>
		</div>
		<input type="submit" class="form-page__form_btn" id="form-page__form_btn" data-link="<?= $result_link; ?>" value="Get your results">
	</form>

</main>

<?php endwhile; wp_reset_query(); ?>
<?php get_footer();?>
<script src="https://unpkg.com/imask"></script>
