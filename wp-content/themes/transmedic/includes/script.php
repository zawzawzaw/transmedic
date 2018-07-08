  <!-- Google Font -->
  <!-- Source Sans Pro Light, Regular, Semibold -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">


  <?php $is_debug = false; ?>

  <?php if ($is_debug == true): ?>

    <!--
       ____  _______     _______ _     ___  ____  __  __ _____ _   _ _____   __  __  ___  ____  _____
      |  _ \| ____\ \   / / ____| |   / _ \|  _ \|  \/  | ____| \ | |_   _| |  \/  |/ _ \|  _ \| ____|
      | | | |  _|  \ \ / /|  _| | |  | | | | |_) | |\/| |  _| |  \| | | |   | |\/| | | | | | | |  _|
      | |_| | |___  \ V / | |___| |__| |_| |  __/| |  | | |___| |\  | | |   | |  | | |_| | |_| | |___
      |____/|_____|  \_/  |_____|_____\___/|_|   |_|  |_|_____|_| \_| |_|   |_|  |_|\___/|____/|_____|

    -->


    <!-- INSERT CSS HERE -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/style.css">

    <!-- INSERT JS HERE -->
    <script type="text/javascript" src="<?php echo JS; ?>/manic-polyfill.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/jquery-other/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/jquery-other/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/misc-js/mobile-detect.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/misc-js/preloadjs-0.4.0.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/gsap/src/minified/TweenMax.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/gsap/src/minified/jquery.gsap.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/gsap/src/minified/easing/EasePack.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/scrollmagic/scrollmagic/minified/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
    <script type="text/javascript" src="<?php echo LIBS; ?>/slick-carousel/slick/slick.min.js"></script>
    
    <!-- Google Closure -->
    <script type="text/javascript" src="<?php echo LIBS; ?>/google-closure/closure-library/closure/goog/base.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>/google-closure-dependency-list.js"></script>
    <script type="text/javascript">
      goog.require('transmedic.page.Default');
    </script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        page = new transmedic.page.Default({});    
      });
    </script>

  <?php else: ?>

    <!-- <script type="text/javascript" src="<?php echo JS; ?>/minified/head.load.min.js"></script> -->
    <script type="text/javascript">
      <?php require_once( __DIR__ . '/../transmedic_assets/js/minified/head.load.min.js'); ?>
    </script>
    <script type="text/javascript">

      var PAGE_LIBRARY        = "<?php echo JS; ?>/minified/libraries-default.min.js";
      var PAGE_JS             = "<?php echo JS; ?>/minified/page-default.min.js";
      var PAGE_CSS            = "<?php echo CSS; ?>/style.css";
      var FONT_CSS            = "<?php echo CSS; ?>/MyFontsWebfontsKit.css";
      
      window.head_js = head;
      
      window.head_js.load(FONT_CSS);
      window.head_js.load(PAGE_CSS);
      window.head_js.load(PAGE_LIBRARY, function() {
        window.head_js.load(PAGE_JS, function() {
          window.page = new transmedic.page.Default({});
        });
      });
    </script>

  <?php endif; ?>
