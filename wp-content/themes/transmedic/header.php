<?php
  global $current_page;
  $current_page = "page-home";

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link rel="shortcut icon" href="transmedic_assets/images/icons/favicon.ico" type="image/x-icon" />

  <title>Transmedic</title>
  <meta name="description" content="Leading medical equipment specialists in Southeast Asia.">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui"/>
  
  <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->

  <?php wp_head(); ?>

</head>

<body class="<?php echo $current_page; ?>"> <!-- home-expand-header-version -->
  <!-- only the home page has the class home-expand-header-version by default -->

  <!--
     ____  ____  _____ _     ___    _    ____  _____ ____
    |  _ \|  _ \| ____| |   / _ \  / \  |  _ \| ____|  _ \
    | |_) | |_) |  _| | |  | | | |/ _ \ | | | |  _| | |_) |
    |  __/|  _ <| |___| |__| |_| / ___ \| |_| | |___|  _ <
    |_|   |_| \_\_____|_____\___/_/   \_\____/|_____|_| \_\

  -->

  <div id="page-preloader">
    <div id="page-preloader-bg"></div>
    <div id="page-preloader-center"></div>
  </div>


  <!--
     ____  _____ ____  _  _______ ___  ____    _   _ _____    _    ____  _____ ____
    |  _ \| ____/ ___|| |/ /_   _/ _ \|  _ \  | | | | ____|  / \  |  _ \| ____|  _ \
    | | | |  _| \___ \| ' /  | || | | | |_) | | |_| |  _|   / _ \ | | | |  _| | |_) |
    | |_| | |___ ___) | . \  | || |_| |  __/  |  _  | |___ / ___ \| |_| | |___|  _ <
    |____/|_____|____/|_|\_\ |_| \___/|_|     |_| |_|_____/_/   \_\____/|_____|_| \_\

  -->


  <header id="header-desktop" class="visible-lg hidden-md hidden-sm hidden-xs">
    <div class="white-bg"></div>

    <div id="header-desktop-content-container">
      <div id="header-desktop-logo-container">
        <a id="header-desktop-logo" href="<?php echo home_url(); ?>" title="Transmedic - Advancing Medical Technologies"></a>
        <!-- <a id="header-desktop-logo-expanded" href="index.php" title="Transmedic - Advancing Medical Technologies"></a> -->
      </div>

      <!--
         __  __ _____ _   _ _   _
        |  \/  | ____| \ | | | | |
        | |\/| |  _| |  \| | | | |
        | |  | | |___| |\  | |_| |
        |_|  |_|_____|_| \_|\___/

      -->

      <div id="header-desktop-menu">
        <nav>
          <?php
            $defaults = array(
              'echo' => true,
              'container' => false,
              'theme_location'  => 'main-menu',
              'menu_class'      => 'main-menu'
            );


            wp_nav_menu($defaults);
          ?>          
        </nav>
      </div> <!-- header-desktop-menu -->

      <!--
         ____  _____    _    ____   ____ _   _
        / ___|| ____|  / \  |  _ \ / ___| | | |
        \___ \|  _|   / _ \ | |_) | |   | |_| |
         ___) | |___ / ___ \|  _ <| |___|  _  |
        |____/|_____/_/   \_\_| \_\\____|_| |_|

      -->

      <div id="header-desktop-search-container" class="expand-version">
        <div class="search-grey-bg"></div>
        <form id="header-desktop-search-form" action="" method="GET">
          <input type="text" name="search-param">
          <input type="submit" value="">
        </form>
        <div class="search-expand-btn"></div>
      </div> <!-- header-desktop-search-container -->
    </div>


    
    
  </header> <!-- header-desktop -->


  <!--
     __  __  ___  ____ ___ _     _____   _   _ _____    _    ____  _____ ____
    |  \/  |/ _ \| __ )_ _| |   | ____| | | | | ____|  / \  |  _ \| ____|  _ \
    | |\/| | | | |  _ \| || |   |  _|   | |_| |  _|   / _ \ | | | |  _| | |_) |
    | |  | | |_| | |_) | || |___| |___  |  _  | |___ / ___ \| |_| | |___|  _ <
    |_|  |_|\___/|____/___|_____|_____| |_| |_|_____/_/   \_\____/|_____|_| \_\

  -->


  <header id="header-mobile" class="visible-md visible-sm visible-xs">
    <div class="white-bg"></div>

    <div id="header-mobile-content-container">
      <div id="header-mobile-logo-container">
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
    

  </div> <!-- header-mobile-expand -->