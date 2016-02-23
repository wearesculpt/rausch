<?php
    /* Template Name: Work Sub Page */
    get_header();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

    $case_args = array(
        'post_type' =>      'post',
        'numberposts'=>     -1,
        'posts_per_page'=>  -1,
        'post_status'=>     'publish',
        'category_name'=>   $post->post_name,
    );

    $case_studies = new WP_Query( $case_args );
?>
<article class="work bg-image-wrap" data-type="background" data-background="<?php echo($image[0]); ?>">

    <section class="centerpiece intro-header">
        <h1><?php the_title(); ?></h1>
        <p><?php echo($post->post_content); ?></p>
    </section>

</article>

<article class="case-studies">
    <?php
        if ( $case_studies->have_posts() ) while ( $case_studies->have_posts() ) : $case_studies->the_post();
    ?>
    <section>
        <div class="case-info col-6-12">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
        <div class="vid-contain col-6-12">
        <?php if(get_field('video') != '') { ?>
            <video poster="<?php the_field('screenshot'); ?>" loop muted>
                <source src="<?php the_field('video') ?>" type="video/mp4">
            </video>
        <?php } else { ?>
            <img src="<?php the_field('image_alternative'); ?>"/>
        <?php } ?>
        </div>
    </section>
    <?php
        endwhile;
        wp_reset_postdata();
    ?>
</article>

<article class="testimonial" data-type="background" data-background="<?php $bg = get_post_meta($post->ID, 'background_image'); echo(wp_get_attachment_url($bg[0])); ?>">
    <section class="centerpiece">
        <blockquote class="blockquote"><?php $quo = get_post_meta($post->ID, 'testimonial'); echo($quo[0]); ?></blockquote>
        <p>-<?php $testif = get_post_meta($post->ID, 'testifier'); echo($testif[0]); ?></p>
        <p><?php $jobtit = get_post_meta($post->ID, 'job_title'); echo($jobtit[0]); ?></p>
    </section>
</article>

<?php get_footer(); ?>
