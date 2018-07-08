<?php
  global $current_page;  

  $template_name = basename(get_page_template()); 
  
  if ( is_front_page() ):
    $current_page = "page-home";
  elseif ( $template_name == 'page-about.php' ):
    $current_page = "page-about";
  elseif ( $template_name == 'page-careers.php' ):
    $current_page = "page-careers";
  elseif ( $template_name == 'page-products.php' ):
    $current_page = "page-products";
  elseif ( $template_name == 'page-contact.php' ):
    $current_page = "page-contact";
  elseif ( $template_name == 'page-news.php' ):
    $current_page = "page-news";
  elseif ( is_search() ):
    $current_page = "page-plain min-height-version min-height-mobile-version";
  elseif ( is_tax() ):
    $current_page = "page-plain min-height-version min-height-mobile-version";
  elseif ( is_404() ):
    $current_page = "page-plain min-height-version min-height-mobile-version";
  elseif ( is_singular() ):
    $current_page = "page-article";
  else:
    $current_page = "page-home";
  endif; 
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link rel="shortcut icon" href="<?php echo THEMEROOT; ?>/transmedic_assets/images/icons/favicon-final.png?v=2" type="image/x-icon" />

  <title>Transmedic</title>
  <!-- <meta name="description" content="Leading medical equipment specialists in Southeast Asia."> -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui"/>
  
  <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->

  <style type="text/css">
    <?php require_once('transmedic_assets/css/critical_style.css'); ?>
  </style>

  <?php wp_head(); ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-669565-66"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-669565-66');
  </script>

</head>

<body class="<?php echo $current_page; ?>"> <!-- home-expand-header-version -->

  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '121760891830821',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

  <!-- only the home page has the class home-expand-header-version by default -->

  <div id="page-preloader">
    <div id="page-preloader-bg"></div>
    <div id="page-preloader-center"></div>
  </div>


  <header id="header-desktop">
    <div class="white-bg"></div>

    <div id="header-desktop-content-container">
      <div id="header-desktop-logo-container">
        <a id="header-desktop-logo" href="<?php echo home_url(); ?>" title="Transmedic - Advancing Medical Technologies"></a>
        <!-- <a id="header-desktop-logo-expanded" href="index.php" title="Transmedic - Advancing Medical Technologies"></a> -->
      </div>

      <div id="header-desktop-menu">
        <nav>
          <?php
            $defaults = array(
              'echo' => true,
              'container' => false,
              'theme_location'  => 'main-menu',
              'menu_class'      => 'main-menu',
              'walker' => new Microdot_Walker_Nav_Menu()
            );


            wp_nav_menu($defaults);
          ?>          
        </nav>
      </div> <!-- header-desktop-menu -->

      <div id="header-desktop-search-container" class="expand-version">
        <div class="search-grey-bg"></div>
        <form id="header-desktop-search-form" class="searchform" action="<?php echo home_url(); ?>" role="search" method="get">
          <input type="text" value="" name="s" id="s">
          <input type="submit" id="searchsubmit" value="">
        </form>
        <div class="search-expand-btn"></div>


      </div> <!-- header-desktop-search-container -->
    </div>
  </header> <!-- header-desktop -->


  <header id="header-mobile">
    <div class="white-bg"></div>

    <div id="header-mobile-content-container">
      <div id="header-mobile-logo-container">
        <!-- <a id="header-mobile-logo" href="index.php" title="Transmedic - Advancing Medical Technologies"></a> -->
        <a id="header-mobile-logo" href="index.php" title="Transmedic - Advancing Medical Technologies"></a>
      </div>

      <div id="header-mobile-menu-opener-container">
        <a id="header-mobile-menu-opener" href="javascript:void(0);">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
    </div>

  </header> <!-- header-mobile -->

  <div id="header-mobile-expand">

    <div class="header-mobile-spacer"></div>

    <div id="header-search-mobile">
      <form id="header-search-mobile-form" class="searchform" action="<?php echo home_url(); ?>" role="search" method="GET">
        <input type="text" name="s" id="s">
        <input type="submit" value="">
      </form>
    </div>
        
    <div class="container-fluid">
      <div class="col-sm-10 col-sm-push-1 col-xs-12 col-xs-push-0">

        <div id="header-menu-mobile">
          <nav>
            <?php
              $defaults = array(
                'echo' => true,
                'container' => false,
                'theme_location'  => 'mobile-menu',
                'menu_class'      => 'mobile-menu'
              );


              wp_nav_menu($defaults);
            ?>
            <div class="sub-menu-bg"></div>
            <ul class="sub-mobile-menu">
              <?php 
              $menu_items = wp_get_nav_menu_items( 'Mobile Menu' );
              foreach ($menu_items as $key => $value) { ?>
                <?php if($value->classes[0]=="staff-login-menu"): ?>
                  <li><a href="<?php echo $value->url; ?>" target="_blank" class="<?php echo join(' ', $value->classes); ?>"><?php echo $value->title; ?></a></li>
                <?php endif; ?>
              <?php }
              ?>
            </ul>
            <!-- <ul class="sub-mobile-menu">
              <li><a href="#">E-Portal</a></li>
              <li><a href="#">Email</a></li>
              <li><a href="#" class="cloud">Cloud</a></li>
            </ul> -->       
          </nav>
        </div>

        <div id="header-menu-cloud">
          <h5>Cloud Access</h5>
          <p>Please select your country:</p>

          <ul>
            <?php 
            $menu_items = wp_get_nav_menu_items( 'Mobile Menu' );
            // print_r($menu_items);            
            foreach ($menu_items as $key => $value) { ?>
              <?php if($value->classes[0]=="cloud-menu"): ?>
                <?php
                if($value->title=="Singapore") $flag = 'sg';
                elseif($value->title=="Hong Kong") $flag = 'hk';
                elseif($value->title=="Malaysia") $flag = 'my';
                elseif($value->title=="Indonesia") $flag = 'id';
                elseif($value->title=="Thailand") $flag = 'th';
                else $flag = 'sg';
                ?>
                <li><a href="<?php echo $value->url; ?>" target="_blank"><div class="iti-flag <?php echo $flag; ?>"></div><?php echo $value->title; ?></a></li>
              <?php endif; ?>
            <?php }
            ?>
            <!-- <li><a href="#"><div class="iti-flag sg"></div>Singapore</a></li>
            <li><a href="#"><div class="iti-flag hk"></div>Hong Kong</a></li>
            <li><a href="#"><div class="iti-flag my"></div>Malaysia</a></li>
            <li><a href="#"><div class="iti-flag id"></div>Indonesia</a></li>
            <li><a href="#"><div class="iti-flag th"></div>Thailand</a></li> -->
          </ul>
        </div>

      </div>
    </div>

  </div> <!-- header-mobile-expand -->
