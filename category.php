<?php
  get_header();
  $categ = get_queried_object();
  $taxonomy = $categ->taxonomy;
  $term_id = $categ->term_id;
  $catcolor = get_field("series_color", $taxonomy . '_' . $term_id);
  $catheadimg = get_field("header_image", $taxonomy . '_' . $term_id);

?>

<article class="series-archive" style="background: transparent no-repeat url('<?php echo($catheadimg["url"]); ?>'); background-size:cover;">

  <div class="gradient-overlay"></div>

  <section class="col-6-12 series-intro">

    <h1 class="series-title" style="color:<?php echo($catcolor); ?>;"><?php echo($categ->name); ?></h1>

    <p><?php echo($categ->description); ?></p>

  </section>

</article>


<article class="series-screenings col-5-12 no-float">

  <h1 class="section-title">Upcoming Screenings</h1>

    <?php
        $filmargs = array(
          'post_type' =>      'film',
          'numberposts'=>     -1,
          'posts_per_page'=>  -1,
          'category__in' =>   array($categ->term_id),
          'post_status'=>     'publish'
        );
        $films = new WP_Query( $filmargs );

        if ( $films->have_posts() ) while ( $films->have_posts() ) : $films->the_post();
          $agileid = get_post_meta(get_the_ID(), 'agileid')[0];
          $prod_countries = explode(",", get_post_meta(get_the_ID(), 'production_country')[0]);
          $directors = explode(",", get_post_meta(get_the_ID(), 'director')[0]);

          $showargs = array(
            'post_type' =>      'showing',
            'orderby' =>        'meta_value',
            'meta_key' =>       'startdate',
            'order' => 'ASC',
            'meta_query'  => array(
              'relation' => 'AND',
              array(
                'key'   => 'filmid',
                'value'     => $agileid,
                'compare'   => '=',
              ),
              array(
                'key'   => 'startdate',
                'value'     => date('n/j/Y h:ia'),
                'compare'   => '>=',
                'type' => 'NUMERIC,'
              ),
            ),
            'numberposts'=>     -1,
            'posts_per_page'=>  -1,
            'post_status'=>     'publish'
          );
          $shows = new WP_Query( $showargs );
          if ( $shows->have_posts() ) {
      ?>
       <section>
        <figure>
          <img src="<?php the_field('event_image'); ?>" />
          <figcaption style="background:<?php echo($catcolor); ?>;">
            <h3 class="film-title"><?php the_title(); ?></h3>
            <h4 class="film-meta"><?php the_field('year_released'); echo(' / '); echo($prod_countries[0]); if( count($prod_countries) > 1 ) { echo(" +"); } echo(' / '); echo($directors[0]); if( count($directors) > 1 ) { echo(" +"); } ?></h4>
          </figcaption>
        </figure>
        <?php
          $dateholder = array();
          while ( $shows->have_posts() ) : $shows->the_post();
            $dateday = date('l, M j', strtotime(get_field('startdate')));
            $datetime = date('h:ia', strtotime(get_field('startdate')));
            if( array_key_exists($dateday, $dateholder) ) {
              $dateholder[$dateday][$datetime][] = get_field('buylink');
            } else {
              $dateholder[$dateday] = array();
              $dateholder[$dateday][$datetime] = array();
              $dateholder[$dateday][$datetime][] = get_field('buylink');
            }
          endwhile;
          $films->reset_postdata();

          foreach($dateholder as $date => $time){
            echo("<date style='color:".$catcolor.";' class='show-date'>".$date);
            foreach($time as $showtime => $buylink) {
              echo("<a class='show-time' href='".$buylink[0]."'>".$showtime."</a>");
            }
            echo("</date>");
          }
        ?>
        <?php the_content(); ?>
      </section>
      <?php
        }
        endwhile;
      ?>

</article>