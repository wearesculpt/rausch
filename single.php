<?php get_header(); ?>

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
  <article class="team-mem-head" data-speed="15" data-type="background" data-background="<?php echo(wp_get_attachment_url(440)); ?>">
      <section class="centerpiece">
          <h1><?php the_title(); ?></h1>
          <h2><?php $pos = get_post_meta($post->ID, 'position'); echo $pos[0]; ?></h2>
      </section>
  </article>

  <article class="team-mem-body">

    <section class="col-4-12 team-mem-img">

      <img src="<?php $prof = get_post_meta($post->ID, 'profile_picture'); echo(wp_get_attachment_url($prof[0])); ?>" />

    </section>

    <section class="col-8-12 team-mem-story">

      <?php the_content(); ?>

    </section>

  </article>

    <?php endwhile; ?>


    <?php else : ?>


  <?php endif; ?>

<?php get_footer(); ?>