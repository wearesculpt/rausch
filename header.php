<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package filmscene
 */
?>

<!DOCTYPE html>
<html <?php language_attributes();
 ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?>Rausch Productions</title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/icon/favicon.png" />
    <?php
    wp_head();
    global $post;
    ?>
    <script src="//use.typekit.net/mhx0ocv.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  </head>

  <body>

    <header class="global-header push-menu-right">
      <a href="/" class="logotype"></a>

      <nav class="nav-primary">
        <?php
          $defaults = array(
            'theme_location'  => '',
            'menu'            => 'main-menu',
            'container'       => false,
            'container_class' => '',
            'menu_class'      => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          wp_nav_menu( $defaults );
        ?>
      </nav>

      <?php
        if(is_page('Work') || $post->post_parent == 5) {
      ?>
      <nav class="nav-secondary">
        <?php
          $defaults = array(
            'theme_location'  => '',
            'menu'            => 'work-menu',
            'container'       => false,
            'container_class' => '',
            'menu_class'      => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          wp_nav_menu( $defaults );
        ?>
      </nav>
      <?php
        }
      ?>

      <?php
        if(is_page('Services') || $post->post_parent == 7) {
      ?>
      <nav class="nav-secondary">
        <?php
          $defaults = array(
            'theme_location'  => '',
            'menu'            => 'service-menu',
            'container'       => false,
            'container_class' => '',
            'menu_class'      => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          wp_nav_menu( $defaults );
        ?>
      </nav>
      <?php
        }
      ?>

      <?php
        if(is_page('LED Technology') || $post->post_parent == 9) {
      ?>
      <nav class="nav-secondary">
        <?php
          $defaults = array(
            'theme_location'  => '',
            'menu'            => 'led-menu',
            'container'       => false,
            'container_class' => '',
            'menu_class'      => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          wp_nav_menu( $defaults );
        ?>
      </nav>
      <?php
        }
      ?>
	<script type="text/javascript">
	$(document).ready(function(){
		var $sharpspring = $('body').children('img').last();
		$sharpspring.css('height', '1px');
	});
	</script>
    </header>

    <button type="button" role="button" class="lines-button toggle-push-right"><span class="lines"></span></button>

   <main>