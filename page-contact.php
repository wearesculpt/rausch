<?php
  get_header();
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
  $contact_page_args = array(
      'post_type' =>      'page',
      'numberposts'=>     -1,
      'posts_per_page'=>  -1,
      'post_status'=>     'publish',
      'pagename'=>        'contact'
  );
  $contact_page = new WP_Query( $contact_page_args );
  if ( $contact_page->have_posts() ) while ( $contact_page->have_posts() ) : $contact_page->the_post();
?>

<article class="contact bg-image-wrap" data-type="background" data-background="<?php echo($image[0]); ?>">

  <section class="centerpiece intro-header">
      <h1>Contact Us</h1>
      <?php the_field('contact_desc'); ?>
  </section>

</article>

<article>
    <section class="col-6-12 contact-col">
        <h1><?php the_field('column_heading'); ?></h1>
        <?php the_field('column_paragraph'); ?>
    </section>
    <section class="col-6-12 contact-form">
        <?php the_content(); ?>
    </section>
</article>
<?php 
  endwhile;
  get_footer(); 
?>