<?php
/*
 Template Name: Service
 */
get_header();

?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<main id="primary" class="site-main service">

    <div class="breadcrumbs">
      <div class="container">
        <p>Services</p>
        <p>></p>
        <p><?php the_title(); ?></p>
      </div>
    </div>

    <?php

    $page_title = get_the_title();

    switch ( $page_title ) {
        case 'Dental Bonding':
          get_template_part('template-parts/pages/dental-bonding');
          break;
        case 'Headaches and tmj/tmd relief':
          get_template_part('template-parts/pages/headaches-and-tmd-relief');
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
        case 'Invisible Braces':
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
        case 'Children`s Dentistry':
          get_template_part('template-parts/pages/children-dentistry');
          break;
	      default:
	        get_template_part('template-parts/pages/service-base-template');
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
<?php get_footer();?>
<script src="https://unpkg.com/imask"></script>


