<?php
/*
 Template Name: Service
 */
get_header();

?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();

	/*$fields = get_field_objects();

	if( $fields )
	{
		foreach( $fields as $field_name => $field )
		{
		  switch ($field) {
          case $fields['introduce_block']:
	          get_template_part('template-parts/blocks/introduce');
	          break;
          case $fields['calculator']:
	          get_template_part('template-parts/components/calculator');
	          break;
          case $fields['difference']:
            $section = get_field('difference');
            if ( $section['caption'] ) {
	            get_template_part('template-parts/blocks/difference');
            }
	          break;
          case $fields['cov']:
            if ( $fields['cov']['value']) {
	            $covid_section = get_field('covid_block', 'option');
	            if ($covid_section) {
		            get_template_part('template-parts/blocks/covid');
	            }
            }
            break;
          case $fields['about_service_img']:
            $about_with_img = get_field('about_service_img');
            if ($about_with_img[0]['section_caption_text'] != '') {
              get_template_part('template-parts/blocks/about-service-with-img');
            }
            break;

      }
		}
	}*/?>

	<main id="primary" class="site-main service">

    <?php

    $page_title = get_the_title();

    switch ( $page_title ) {
        case 'Dental Bonding':
          get_template_part('template-parts/pages/dental-bonding');
          break;
        case 'Headaches and tmd relief':
          get_template_part('template-parts/pages/headaches-and-tmd-relief');
          break;
        case 'Sedation during dentistry':
          get_template_part('template-parts/pages/sedation-during-dentistry');
          break;
        case 'Tooth extraction without sedation':
          get_template_part('template-parts/pages/tooth-extraction');
          break;
        case 'Emergency service':
          get_template_part('template-parts/pages/emergency-service');
          break;
        case 'Veneers':
          get_template_part('template-parts/pages/veneers');
          break;
        case 'Dental bridge':
          get_template_part('template-parts/pages/dental-bridges');
          break;
        case 'Gum disease control and therapy':
          get_template_part('template-parts/pages/gum-disease-control-and-therapy');
          break;
        case 'Dental implants':
          get_template_part('template-parts/pages/dental-implants');
          break;
        case 'Orthodontics':
          get_template_part('template-parts/pages/orthodontics');
          break;
        case 'Root canals':
          get_template_part('template-parts/pages/root-canals');
          break;
        case 'Teeth whitening':
          get_template_part('template-parts/pages/teeth-whitening');
          break;
        case 'Cosmetic dentistry':
          get_template_part('template-parts/pages/сosmetic-dentistry');
          break;
    }
    ?>

    <?php $why_we_section = get_field('why_we', 'option');
    if ($why_we_section) {
	    get_template_part('template-parts/components/why-we');
    }
    ?>
    <?php $about_team_section = get_field('about_team', 'option');
    if ($about_team_section) {
	    get_template_part('template-parts/components/our-team');
    }
    ?>

	</main>

<?php endwhile; wp_reset_query(); ?>
<?php get_footer();

