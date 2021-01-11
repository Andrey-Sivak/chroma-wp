<?php
/*
 Template Name: Blog
 */
get_header(); ?>

<main class="blog-page">

  <div class="breadcrumbs">
    <div class="container">
      <p>Home</p>
      <p>></p>
      <p>Blog</p>
    </div>
  </div>

	<div class="container">
		<div class="blog-page__wrap">
			<div class="blog-page__content">
        <?php $params = ['posts_per_page' => -1, 'tax_query' => [
          array(
            'taxonomy' => 'post_format',
            'field'    => 'slug',
            'terms'    => 'post-format-aside',
            'operator' => 'NOT IN'
          ),
          array(
            'taxonomy' => 'post_format',
            'field'    => 'slug',
            'terms'    => 'post-format-image',
            'operator' => 'NOT IN'
          )
        ]];

        $recent_posts = wp_get_recent_posts( $params );
//        var_dump($recent_posts[0]["post_author"]);

        $recent_posts_length = count($recent_posts);
        $first_half_posts = $recent_posts_length / 2;

        if ( $recent_posts_length % 2 != 0 ) {
          $first_half_posts = floor( $first_half_posts );
        }

        $second_half_posts = $recent_posts_length - $first_half_posts;

        function show_posts( $posts_quantity, $posts_list ) {

          for ($i = 0; $i < $posts_quantity; $i++) {
            $recent_post = $posts_list[$i];
            //    get the post ID
            $recent_post_ID = $recent_post["ID"];

            //    get post title
            $post_title = $recent_post["post_title"];

            //	  get post image
            $recent_post_img = get_the_post_thumbnail_url($recent_post_ID);

            //    get post content
            $content = $recent_post["post_content"];

            //    get trim content
            $trim_post_content = wp_trim_words( $content, 45, '<a class="blog-page__item_text-link" href="'. get_permalink( $recent_post_ID ) .'"> Read More</a>' );

            //    get post author
            $recent_author = get_user_by('ID', $recent_post["post_author"]);

            $author_name = $recent_author->display_name;
            //    get date
            $recent_modified = strtotime($recent_post["post_modified"]);
            $recent_modified_value = date( 'F j, Y', $recent_modified );

            echo "<div class='blog-page__item'>";
              if ( $recent_post_img ) {
                  echo "<a href='" . get_permalink( $recent_post_ID ) . "' class='blog-page__item_image'>";
                    echo "<img src='" . $recent_post_img . "' alt='" . $post_title . "'>";
                  echo "</a>";
              }
              echo "<div class='blog-page__item_content'>";
                echo "<a href='" . get_permalink( $recent_post_ID ) . "' class='blog-page__item_title'>" . $post_title . "</a>";
                echo "<p class='blog-page__item_meta'>By " . $author_name . ' | ' . $recent_modified_value . " | <a href='" . get_permalink($recent_post_ID) . "'>Post</a></p>";
                echo "<p class='blog-page__item_text'>" . $trim_post_content . "</p>";
              echo "</div>";
            echo "</div>";
          }
        }
        ?>


        <div class="blog-page__content_column">
          <?php
          $first_posts_list = [];
          for ($i = 0; $i < $first_half_posts; $i++) {
	          array_push( $first_posts_list, $recent_posts[$i] );
          }
          show_posts($first_half_posts, $first_posts_list);
          ?>
        </div>
        <div class="blog-page__content_column">
			    <?php
          $second_posts_list = [];
          for ($i = $first_half_posts; $i < count($recent_posts); $i++) {
            array_push( $second_posts_list, $recent_posts[$i] );
          }
          show_posts($second_half_posts, $second_posts_list);
          ?>
        </div>
      </div>

			<?php get_template_part('/template-parts/blocks/recent-projects'); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>