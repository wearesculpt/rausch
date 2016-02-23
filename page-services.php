<?php
    get_header();
    global $post;
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
<article class="services bg-image-wrap" data-type="background" data-background="<?php echo($image[0]); ?>">

  <section class="centerpiece intro-header">
      <h1>Services</h1>
      <p><?php echo($post->post_content); ?></p>

  <ul class="icon-display">
      <li class='col-2-12'>
          <a class="event-management" href="/rausch/services/event-management">
              <img class="icon" src="<?php bloginfo('template_directory'); ?>/img/icon/event-management.png" />
          </a>
      </li>
      <li class='col-2-12'>
          <a class="live-event-production" href="/rausch/services/live-event-production">
              <img class="icon" src="<?php bloginfo('template_directory'); ?>/img/icon/live-event-production.png" />
          </a>
      </li>
      <li class='col-2-12'>
          <a class="video-production" href="/rausch/services/video-production">
              <img class="icon" src="<?php bloginfo('template_directory'); ?>/img/icon/video-production.png" />
          </a>
      </li>
      <li class='col-2-12'>
          <a class="special-events" href="/rausch/services/special-events">
              <img class="icon" src="<?php bloginfo('template_directory'); ?>/img/icon/special-events.png" />
          </a>
      </li>
      <li class='col-2-12'>
          <a class="rentals" href="/rausch/services/rentals">
              <img class="icon" src="<?php bloginfo('template_directory'); ?>/img/icon/mobile-led-screens.png" />
          </a>
      </li>
  </ul>

</article>

<article class="approach">

    <section class="centerpiece">
      <h1 class="secondary-heading">Our Strategic Approach</h1>
      <p><?php $strat = get_post_meta($post->ID, 'strategic_approach'); echo($strat[0]); ?></p>
    </section>

    <section class="featured col-4-12" >
        <h2>Enhance</h2>
        <p><?php $enhance = get_post_meta($post->ID, 'enhance'); echo($enhance[0]); ?></p>
    </section>
    <section class="featured col-4-12" >
        <h2>Engage</h2>
        <p><?php $engage = get_post_meta($post->ID, 'engage'); echo($engage[0]); ?></p>
    </section>
    <section class="featured col-4-12" >
        <h2>Entertain</h2>
        <p><?php $enter = get_post_meta($post->ID, 'entertain'); echo($enter[0]); ?></p>
    </section>
    <div class="col-12-12" >
        <a href="/rausch/contact"><button><?php $app = get_post_meta($post->ID, 'approach_button'); echo($app[0]); ?></button></a>
    </div>
</article>

<article class="testimonial" data-type="background" data-background="<?php $bg = get_post_meta($post->ID, 'background_image'); echo(wp_get_attachment_url($bg[0])); ?>">
    <section class="centerpiece">
        <blockquote class="blockquote"><?php $quo = get_post_meta($post->ID, 'testimonial'); echo($quo[0]); ?></blockquote>
        <p>-<?php $testif = get_post_meta($post->ID, 'testifier'); echo($testif[0]); ?></p>
        <p><?php $jobtit = get_post_meta($post->ID, 'job_title'); echo($jobtit[0]); ?></p>
    </section>
</article>

<article class="trifecta">
    <section class="centerpiece">
        <h1 class="secondary-heading">Why Choose Rausch?</h1>
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
<?php get_footer(); ?>
