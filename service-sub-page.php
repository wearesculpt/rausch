<?php
    /* Template Name: Service Sub Page */
    get_header();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
<article class="services bg-image-wrap" data-type="background" data-background="<?php echo($image[0]); ?>">

    <section class="centerpiece intro-header">
        <h1><?php the_title(); ?></h1>
        <p><?php echo($post->post_content); ?></p>
    </section>

</article>

<article class="trifecta">
    <section class="featured col-4-12">
        <h2><?php $ben = get_post_meta($post->ID, 'benefit_a_title'); echo($ben[0]); ?></h2>
        <p><?php $ben = get_post_meta($post->ID, 'benefit_a_text'); echo($ben[0]); ?></p>
    </section>
    <section class="featured col-4-12" >
        <h2><?php $ben = get_post_meta($post->ID, 'benefit_b_title'); echo($ben[0]); ?></h2>
        <p><?php $ben = get_post_meta($post->ID, 'benefit_b_text'); echo($ben[0]); ?></p>
    </section>
    <section class="featured col-4-12" >
        <h2><?php $ben = get_post_meta($post->ID, 'benefit_c_title'); echo($ben[0]); ?></h2>
        <p><?php $ben = get_post_meta($post->ID, 'benefit_c_text'); echo($ben[0]); ?></p>
    </section>
</article>

<?php
    if(get_the_title() == 'Equipment Rental') {
?>

<article class="list">
    <section class="centerpiece">
        <h1><?php the_title(); ?></h1>
        <p><?php the_field('description'); ?> </p>
    </section>
    <div class="rental-box">
        <h3 class="col-6-12"><?php the_field('specialty_1'); ?></h3>
        <div class="col-6-12"><?php the_field('specialty_1_text'); ?></div>
    </div>
    <div class="rental-box">
        <h3 class="col-6-12"><?php the_field('specialty_2'); ?></h3>
        <div class="col-6-12"><?php the_field('specialty_2_text'); ?></div>
    </div>
    <div class="rental-box">
        <h3 class="col-6-12"><?php the_field('specialty_3'); ?></h3>
        <div class="col-6-12"><?php the_field('specialty_3_text'); ?></div>
    </div>
    <div class="rental-box">
        <h3 class="col-6-12"><?php the_field('specialty_4'); ?></h3>
        <div class="col-6-12"><?php the_field('specialty_4_text'); ?></div>
    </div>
</article>

<?php
    }
?>

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
