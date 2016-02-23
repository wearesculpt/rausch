</main>

<?php
    $footer_message = get_post_meta($post->ID, 'footer_message');
    $button_message = get_post_meta($post->ID, 'button_message');

    if($post->post_name != 'contact') {
        if($post->post_name == 'video-production') {
?>
<article class="closing-statement">
    <section class="centerpiece">
        <h2><?php if($footer_message) { echo($footer_message[0]); } else { echo('Ready to build your experience?'); }?></h2>
        <a href="https://www.youtube.com/channel/UCBjXl_nA7Sz5eCsMDQCq3GQ" target="_blank"><button><?php if($button_message) { echo($button_message[0]); } else { echo("Let's Do It"); } ?></button></a>
    </section>
</article>
    <?php } else { ?>

<article class="closing-statement">
    <section class="centerpiece">
        <h2><?php if($footer_message) { echo($footer_message[0]); } else { echo('Ready to build your experience?'); }?></h2>
        <a href="/rausch/contact"><button><?php if($button_message) { echo($button_message[0]); } else { echo("Let's Do It"); } ?></button></a>
    </section>
</article>
<?php
        }
    }
?>

<footer>
  <section class="centerpiece">
    <div>
        <em href="tel:3192949410">(319) 294-9410</em>
        <em>2037 North Towne Lane NE
        <br/> Cedar Rapids, Iowa 52402</em>
    </div>
    <div>
        <a class="fa fa-facebook fa-3x" href="http://www.facebook.com/RauschProductions" target="_blank"></a>
        <a class="fa fa-twitter fa-3x" href="https://twitter.com/RauschPros" target="_blank"></a>
        <a class="fa fa-instagram fa-3x" href="https://instagram.com/rauschpros/" target="_blank"></a>
        <a class="fa fa-vimeo-square fa-3x" href="https://vimeo.com/rauschproductions" target="_blank"></a>
    </div>
    <p>Sign Up For Our <a class="newsletter" href="http://eepurl.com/ZqMcb">Newsletter</a>!</p>
    <h1 class="copyright">&copy; 2015 Rausch Productions, Inc. All Rights Reserved.</h1>
  </section>
</footer>

<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- JavaScript Includes -->
<?php wp_footer(); ?>
<script>
    objectFit.polyfill({
        selector: 'img', // this can be any CSS selector
        fittype: 'cover', // either contain, cover, fill or none
        disableCrossDomain: 'true' // either 'true' or 'false' to not parse external CSS files.
    });
</script>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-1B7YFZ8.sharpspring.com/webforms/receivePostback/MzI2NAIA/']);
    __ss_noform.push(['endpoint', '55e22ab4-36f8-4d1c-b8cb-dc38b5f8aa6e']);
</script>
<script type="text/javascript" src="https://koi-1B7YFZ8.sharpspring.com/client/noform.js?ver=1.24" ></script>
</body>
</html>