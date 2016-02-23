<?php
    /* Template Name: Team Page */
    get_header();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    $team_args = array(
        'post_type' =>      'team',
        'numberposts'=>     -1,
        'posts_per_page'=>  -1,
        'post_status'=>     'publish',
        'meta_key'          => 'grid_order',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC'
    );

    $team_members = new WP_Query( $team_args );
?>
<article class="team bg-image-wrap" data-type="background" data-background="<?php echo($image[0]); ?>">

  <section class="centerpiece intro-header">
      <h1>Team</h1>
      <p><?php echo($post->post_content); ?></p>
  </section>

</article>

<article class="team-profiles">
    <?php
        if ( $team_members->have_posts() ) while ( $team_members->have_posts() ) : $team_members->the_post();
    ?>
    <style>
        .<?php echo the_slug(); ?> {
          background: url("<?php the_field('profile_picture'); ?>") no-repeat center center;
          background-size: cover; }
          .<?php echo the_slug(); ?>:hover {
            background: url("<?php the_field('picture_alt'); ?>") no-repeat center center;
            background-size: cover; }
    </style>
    <section class="featured col-4-12">
        <a href="<?php the_permalink(); ?>">
            <div class="<?php echo the_slug(); ?> profile-contain">
                <img data-alternate="<?php the_field('picture_alt'); ?>" src="<?php the_field('profile_picture'); ?>"/>
            </div>
            <h2><?php the_title(); ?></h2>
        </a>
    </section>
    <?php
        endwhile;
        wp_reset_postdata();
    ?>

</article>
<script type="text/javascript">
    $('.profile-contain').children('img').hover(function() {
        $(this).attr('src', $(this).attr('alt')).stop(true, true);
    }, function() {
        $(this).attr('src', $(this).attr('rel')).stop(true, true);
    });
</script>

<?php get_footer(); ?>