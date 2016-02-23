<?php
    get_header();
    $led_page_args = array(
        'post_type' =>      'page',
        'numberposts'=>     -1,
        'posts_per_page'=>  -1,
        'post_status'=>     'publish',
        'pagename'=>        'led-technology'
    );
    $led_page = new WP_Query( $led_page_args );
    if ( $led_page->have_posts() ) while ( $led_page->have_posts() ) : $led_page->the_post();
?>


<?php if(get_field('header_video') != "") { ?>
<article class="video-intro led">
    <video muted>
        <source src="<?php the_field('header_video') ?>" type="video/mp4">
    </video>
<?php } else { ?>
<article class="bg-image-wrap led" data-type="background" data-background="<?php the_field('image_alternative'); ?>">
<?php } ?>

  <section class="centerpiece intro-header">
      <h1>LED Technology</h1>
      <?php the_content(); ?>
  </section>

</article>

<article class="led-products">

<?php
    $led_page_ID = get_the_ID();
    $led_sub_page_args = array(
        'post_type' =>      'page',
        'numberposts'=>     -1,
        'posts_per_page'=>  -1,
        'post_status'=>     'publish',
        'post_parent'=>     $led_page_ID,
        'orderby'=>         'title',
        'order'=>           'ASC'
    );
    $led_sub_page = new WP_Query( $led_sub_page_args );
    if ( $led_sub_page->have_posts() ) while ( $led_sub_page->have_posts() ) : $led_sub_page->the_post();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
?>
    <section class="featured col-6-12" data-type="background" data-background="<?php echo $image[0]; ?>">
        <a href="<?php the_permalink(); ?>">
          <img class="icon" src="<?php the_field('icon'); ?>" />
        </a>
        <h2 class="project-title"><?php the_title(); ?></h2>
    </section>
<?php
    endwhile;
    wp_reset_postdata();
?>
    <!--<section class="featured col-6-12" data-type="background" data-background="<?php echo(get_template_directory_uri().'/img/concert-video-wall.jpg'); ?>">
        <a href="/rausch/led-technology/video-walls">
          <img class="icon" src="<?php bloginfo('template_directory'); ?>/img/icon/led-walls.png" />
        </a>
        <h2 class="project-title">Video Walls</h2>
    </section>-->

</article>

<article class="trifecta">
    <section class="centerpiece">
        <h1>Why Choose Rausch?</h1>
    </section>
    <section class="featured col-4-12">
        <h2>Experience</h2>
        <p>With over 15 years of experience in event management,  live event production, video production, special events, and LED technology, Rausch understands the business inside and out.</p>
    </section>
    <section class="featured col-4-12" >
        <h2>Knowledge</h2>
        <p>By staying on top of the newest technology and equipment, our talented crew maintains the experience and knowledge needed to run successful events and productions.</p>
    </section>
    <section class="featured col-4-12" >
        <h2>Commitment</h2>
        <p>Our first priority is helping you create the best live event experience from start to finish. Our commitment to your success is what makes Rausch Productions the best in the business.</p>
    </section>
</article>
<?php
    endwhile;
    get_footer();
?>
