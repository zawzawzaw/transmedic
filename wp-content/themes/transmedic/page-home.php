  <?php get_header(); ?>

  <?php 
  $pageParent =  $post->post_parent;
  $banner_H2 = get_post_meta($post->ID, 'page_banner_H2', true);
  $banner_H3 = get_post_meta($post->ID, 'page_banner_H3', true);
  $banner_caption = get_post_meta($post->ID, 'page_banner_caption', true);
  $banner_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'page_banner_image_id', true ), 'full' );


  if($post->post_parent !== 0) {
    $post_data = get_post($post->post_parent);
    $parent_slug = $post_data->post_name;
  }
  $current_slug = get_post( $post )->post_name;
  ?>

  <div id="page-wrapper">
    <div id="page-wrapper-content">


      <div id="page-home-nav-trigger"></div>


      <div class="header-desktop-spacer"></div>


      <!--
         ____    _    _   _ _   _ _____ ____
        | __ )  / \  | \ | | \ | | ____|  _ \
        |  _ \ / _ \ |  \| |  \| |  _| | |_) |
        | |_) / ___ \| |\  | |\  | |___|  _ <
        |____/_/   \_\_| \_|_| \_|_____|_| \_\

      -->

      <article id="page-default-banner-section">
        <div id="page-default-banner-image">
          <div class="manic-image-container">
            <img src="" data-image-desktop="<?php echo $banner_image[0]; ?>"
                        data-image-tablet="<?php echo IMG_CMS; ?>/home/home-banner-tablet.jpg"
                        data-image-mobile="<?php echo IMG_CMS; ?>/home/home-banner-mobile.jpg">
          </div>
        </div>

        <div id="page-default-banner-copy-container">
          <div class="container-fluid has-breakpoint">
            <div class="row">
              <div class="col-md-6">

                <div id="page-default-banner-copy">
                  <h1><?php echo $banner_H2; ?></h1>
                </div> <!-- page-default-banner-copy -->

              </div>
            </div>
          </div>
        </div> <!-- page-default-banner-copy-container -->

      </article> <!-- page-default-banner-section -->





      <!--
        __        ___   _    _  _____  __        _______   ____   ___
        \ \      / / | | |  / \|_   _| \ \      / / ____| |  _ \ / _ \
         \ \ /\ / /| |_| | / _ \ | |    \ \ /\ / /|  _|   | | | | | | |
          \ V  V / |  _  |/ ___ \| |     \ V  V / | |___  | |_| | |_| |
           \_/\_/  |_| |_/_/   \_\_|      \_/\_/  |_____| |____/ \___/

      -->

      <?php 
      $page_home_wwd_sec_title = get_post_meta($post->ID, 'home_page_wwd_sec_title', true);            
      ?>

      <article id="page-home-whatwedo-section">
        <div class="container-fluid has-breakpoint">

          <div class="row">
            <div class="col-md-12">

              <div id="page-home-whatwedo-title">
                <h2><?php echo $page_home_wwd_sec_title; ?></h2>
              </div> <!-- page-home-whatwedo-title -->

            </div>
          </div> <!-- row -->

          <div class="row">
            <div class="col-md-12">

              <div id="page-home-whatwedo-item-container">
                <div class="row">
                  <div id="page-home-whatwedo-item-slider" class="transmedic-slick-slider">
                    <?php
                    $page_home_what_we_do_entries = get_post_meta( $post->ID, 'home_page_what_we_do', true ); 

                    foreach ( (array) $page_home_what_we_do_entries as $key => $entry ):
                      $img_url = $entry['home_page_wwd_sec_image'];                       
                    ?>
                      <div class="col-md-4">
                        <div class="item-column <?php if($key==0): ?>first-version<?php endif; ?>">

                          <!--
                              ___  _
                             / _ \/ |
                            | | | | |
                            | |_| | |
                             \___/|_|

                          -->

                          <div class="page-home-whatwedo-item hover-sync-item">
                            <a href="about.php#medical" class="item-image hover-sync">
                              <div class="manic-image-container">
                                <img src=""
                                  data-image-desktop="<?php echo $img_url; ?>"
                                  data-image-tablet="<?php echo IMG_CMS; ?>/home/home-whatwedo-0<?php echo $key+1; ?>-tablet.jpg"
                                  data-image-mobile="<?php echo IMG_CMS; ?>/home/home-whatwedo-0<?php echo $key+1; ?>-mobile.jpg">
                              </div>
                            </a>
                            <div class="item-copy">
                              <h5><a href="about.php#medical" class="hover-sync"><?php echo $entry['home_page_wwd_sec_image_title'] ?></a></h5>
                              <p><?php echo $entry['home_page_wwd_sec_image_text'] ?></p>
                            </div>
                          </div> <!-- page-home-whatwedo-item -->

                        </div> <!-- item-column -->
                      </div>
                    <?php
                    endforeach;    
                    ?>                                    
                  </div>
                </div>
              </div> <!-- page-home-whatwedo-item-container -->

            </div>
          </div> <!-- row -->

        </div>
      </article> <!-- page-home-whatwedo-section -->





      <!--
         _        _  _____ _____ ____ _____
        | |      / \|_   _| ____/ ___|_   _|
        | |     / _ \ | | |  _| \___ \ | |
        | |___ / ___ \| | | |___ ___) || |
        |_____/_/   \_\_| |_____|____/ |_|

      -->

      <article id="page-home-latest-section">
        <div class="container-fluid has-breakpoint">

          <div class="row">
            <div class="col-md-12">

              <div id="page-home-latest-title">
                <?php 
                $page_home_lt_sec_title = get_post_meta($post->ID, 'home_page_lt_sec_title', true);            
                ?>
                <h2><?php echo $page_home_lt_sec_title; ?></h2>
              </div> <!-- page-home-latest-title -->

            </div>
          </div> <!-- row -->

          <div class="row">
            <div class="col-md-12">

              <div id="page-home-latest-item-container">
                <?php 
                  $section_query = new WP_Query('post_type=post&tag=latest-technologies&order=ASC');

                  $post_title = [];
                  $post_categories = [];
                  $post_linkes = [];

                  while ($section_query->have_posts()) : $section_query->the_post();

                    $post_title[] = get_the_title();
                    $post_categories[] = get_the_category();
                    $post_linkes[] = get_the_permalink();

                  endwhile;
                ?>
                <div class="row">
                  <div class="col-md-7">
                    <div id="page-home-latest-column-01-width"></div>

                    <!--
                        ___  _
                       / _ \/ |
                      | | | | |
                      | |_| | |
                       \___/|_|

                    -->

                    <div id="page-home-latest-item-01" class="page-home-latest-item hover-sync-item">

                      <div class="item-image-container">
                        <div class="item-image">
                          <div class="manic-image-container full-width-version-mobile">
                            <img src="" data-image-desktop="<?php echo IMG_CMS; ?>/home/home-latest-01.jpg"
                            data-image-tablet="<?php echo IMG_CMS; ?>/home/home-latest-01.jpg"
                            data-image-mobile="<?php echo IMG_CMS; ?>/home/home-latest-01.jpg">
                          </div>
                        </div>
                      </div>
                      <div class="item-copy">
                        <div class="item-tag"><?php echo $post_categories[0][0]->name; ?></div>
                        <h3><a href="<?php echo $post_linkes[0]; ?>" class="hover-sync"><?php echo $post_title[0]; ?></a></h3>
                        <a href="<?php echo $post_linkes[0]; ?>" class="plain-arrow-cta hover-sync">Read More</a>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-5">
                    <div id="page-home-latest-column-02-width"></div>

                    <!--
                        ___ ____
                       / _ \___ \
                      | | | |__) |
                      | |_| / __/
                       \___/_____|

                    -->

                    <div id="page-home-latest-item-02" class="page-home-latest-item hover-sync-item">
                      <div class="item-image-container">
                        <div class="item-image">
                          <div class="manic-image-container full-width-version-mobile">
                            <img src="" data-image-desktop="<?php echo IMG_CMS; ?>/home/home-latest-02.jpg"
                            data-image-tablet="<?php echo IMG_CMS; ?>/home/home-latest-02.jpg"
                            data-image-mobile="<?php echo IMG_CMS; ?>/home/home-latest-02.jpg">
                          </div>
                        </div>
                      </div>
                      <div class="item-copy">
                        <div class="item-tag"><?php echo $post_categories[1][0]->name; ?></div>
                        <h3><a href="<?php echo $post_linkes[1]; ?>" class="hover-sync"><?php echo $post_title[1]; ?></a></h3>
                        <a href="<?php echo $post_linkes[1]; ?>" class="plain-arrow-cta hover-sync">Read More</a>                        
                      </div>
                    </div>

                    <!--
                        ___ _____
                       / _ \___ /
                      | | | ||_ \
                      | |_| |__) |
                       \___/____/

                    -->

                    <div id="page-home-latest-item-03" class="page-home-latest-item hover-sync-item">
                      <div class="item-image-container">
                        <div class="item-image">
                          <div class="manic-image-container full-width-version-mobile">
                            <img src="" data-image-desktop="<?php echo IMG_CMS; ?>/home/home-latest-03.jpg"
                            data-image-tablet="<?php echo IMG_CMS; ?>/home/home-latest-03.jpg"
                            data-image-mobile="<?php echo IMG_CMS; ?>/home/home-latest-03.jpg">
                          </div>
                        </div>
                      </div>
                      <div class="item-copy">
                        <div class="item-tag"><?php echo $post_categories[2][0]->name; ?></div>
                        <h3><a href="<?php echo $post_linkes[2]; ?>" class="hover-sync"><?php echo $post_title[2]; ?></a></h3>
                        <a href="<?php echo $post_linkes[2]; ?>" class="plain-arrow-cta hover-sync">Read More</a>                                                
                      </div>
                    </div>

                  </div>
                </div>
              </div> <!-- page-home-latest-item-container -->

            </div>
          </div> <!-- row -->

        </div>
      </article> <!-- page-home-latest-section -->





      <!--
         ____  ____      _    _   _ ____
        | __ )|  _ \    / \  | \ | |  _ \
        |  _ \| |_) |  / _ \ |  \| | | | |
        | |_) |  _ <  / ___ \| |\  | |_| |
        |____/|_| \_\/_/   \_\_| \_|____/

      -->
      <?php
      $page_home_b_sec_title_mobile = get_post_meta($post->ID, 'home_page_b_sec_title_mobile', true);            
      $page_home_b_sec_title = get_post_meta($post->ID, 'home_page_b_sec_title', true);            
      $page_home_b_sec_sub_title = get_post_meta($post->ID, 'home_page_b_sec_sub_title', true);            
      ?>
      <article id="page-home-brand-section">
        <div class="container-fluid has-breakpoint">

          <div class="row">
            <div class="col-md-12">

              <div id="page-home-brand-title">
                <h4 class="visible-xs visible-sm"><?php echo $page_home_b_sec_title_mobile; ?></h4>
                <h2><?php echo $page_home_b_sec_title; ?></h2>
              </div> <!-- page-home-brand-title -->

            </div>
          </div> <!-- row -->

          <div class="row hidden-xs hidden-sm">
            <div class="col-md-12">

              <div id="page-home-brand-copy">
                <h4><?php echo $page_home_b_sec_sub_title; ?></h4>
              </div>
              
              <div id="page-home-brand-links">
                <ul>
                <?php 
                  $section_query = new WP_Query('post_type=brands&order=ASC');
                  $i = 0;

                  while ($section_query->have_posts()) : $section_query->the_post();                    

                    if ($i !== 0 && $i % 2 == 0 && $i != $section_query->post_count) {
                      echo "</ul><ul>";
                    }

                    $brand_title = get_the_title();
                    $lower_case_brand_title = str_replace('/', '', strtolower($brand_title));
                    $lower_case_brand_title = preg_replace('/\s+/', ' ',$lower_case_brand_title);
                ?>
                    <li><a href="products.php#<?php echo str_replace(' ', '-', $lower_case_brand_title); ?>"><?php echo $brand_title; ?></a></li>
                <?php                    
                    $i++;
                  endwhile;
                  wp_reset_query();
                ?>
                </ul>
              </div> <!-- page-home-brand-links -->

            </div>
          </div> <!-- row -->

          <div class="row visible-xs visible-sm">
            <div class="col-md-12">
              <a href="#" class="square-cta">View brands</a>
            </div>
          </div>

        </div>
      </article> <!-- page-home-brand-section -->





      <!--
         __  __    _    ____
        |  \/  |  / \  |  _ \
        | |\/| | / _ \ | |_) |
        | |  | |/ ___ \|  __/
        |_|  |_/_/   \_\_|

      -->


      <article id="page-home-map-section">

        <div id="page-home-map-imge-bg">
          <img src="<?php echo IMG_CMS; ?>/home/home-map-new-02-bg.svg">
        </div>

        <div id="page-home-map-image">

          <div class="manic-animated-svg fit-to-layout-version" id="home-map-animated-svg" data-image="<?php echo IMG_CMS; ?>/home/home-map-new-02c.svg" data-width="1380" data-height="800">
          </div>
          <!--

          <div class="manic-image-container">
            <img src="" data-image-desktop="<?php echo IMG_CMS; ?>/home/home-map.jpg">
          </div>
          -->

        </div>

        <div id="page-home-map-copy-container">
          <div class="container-fluid has-breakpoint">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-9">

                <div id="page-home-map-copy">

                  <div id="page-home-map-title">
                    <?php $home_page_map_sec_title = get_post_meta($post->ID, 'home_page_map_sec_title', true);   ?>
                    <?php $home_page_map_sec_cta_text = get_post_meta($post->ID, 'home_page_map_sec_cta_text', true);   ?>
                    <?php $home_page_map_sec_cta_link = get_post_meta($post->ID, 'home_page_map_sec_cta_link', true);   ?>
                    <h2><?php echo $home_page_map_sec_title; ?></h2>
                  </div>

                  <div id="page-home-map-info-item-container">

                    <div class="page-home-map-info-item" data-value="41">
                      <div class="item-bg"></div>
                      <h4>Brand <br>Partners</h4>
                      <div class="item-number-container"><span class="item-number odometer">00</span></div>
                    </div>

                    <div class="page-home-map-info-item" data-value="1538">
                      <div class="item-bg"></div>
                      <h4>Equipment <br>Distributed</h4>
                      <div class="item-number-container"><span class="item-number odometer">0000</span></div>
                    </div>

                    <div class="page-home-map-info-item" data-value="79">
                      <div class="item-bg"></div>
                      <h4>Companies <br>Benefitted</h4>
                      <div class="item-number-container"><span class="item-number odometer">00</span></div>
                    </div>

                    <div class="page-home-map-info-item" data-value="7">
                      <div class="item-bg"></div>
                      <h4>Our <br>Offices</h4>
                      <div class="item-number-container"><span class="item-number odometer">0</span></div>
                    </div>

                  </div> <!-- page-home-map-info-item-container -->

                  <div id="page-home-map-location" class="hidden-xs hidden-sm">
                    <h4>Our Locations</h4>
                    <ul>
                      <?php 
                        $section_query = new WP_Query('post_type=locations&order=ASC');
                        $i = 0;

                        while ($section_query->have_posts()) : $section_query->the_post();                    

                          if ($i !== 0 && $i % 3 == 0 && $i != count($section_query->post_count)) {
                            echo "</ul><ul>";
                          }

                          $location_title = get_the_title();                          
                      ?>
                          <li><?php echo $location_title; ?></li>
                      <?php                    
                          $i++;
                        endwhile;
                        wp_reset_query();
                      ?>                      
                    </ul>
                  </div>

                  <div id="page-home-cta-container">
                    <a href="<?php echo $home_page_map_sec_cta_link; ?>" class="square-cta"><?php echo $home_page_map_sec_cta_text; ?></a>
                  </div>

                </div> <!-- page-home-map-copy -->

              </div>
            </div> <!-- row -->
          </div>
        </div> <!-- page-home-map-copy-container -->

      </article> <!-- page-home-map-section -->





      <!--
         _   _ _______        ______
        | \ | | ____\ \      / / ___|
        |  \| |  _|  \ \ /\ / /\___ \
        | |\  | |___  \ V  V /  ___) |
        |_| \_|_____|  \_/\_/  |____/

      -->


      <article id="page-home-news-section">
        <div class="container-fluid has-breakpoint">

          <div class="row">
            <div class="col-md-12">
              <div id="page-home-news-title">
                <?php $home_page_news_sec_title = get_post_meta($post->ID, 'home_page_news_sec_title', true);   ?>
                <h2><?php echo $home_page_news_sec_title; ?></h2>
              </div> <!-- page-home-news-title -->
            </div>
          </div> <!-- row -->

          <div class="row">
            <div class="col-md-12">

              <div id="page-default-news-item-container">
                <div class="row">
                  <?php 
                    $section_query = new WP_Query('post_type=post&tag=home-featured&order=ASC');
                    $i = 0;

                    while ($section_query->have_posts()) : $section_query->the_post();

                      $post_title = get_the_title();
                      $post_categories = get_the_category();
                      $i++;
                  ?>
                      

                  <div class="col-md-4">
                    <div class="item-column <?php if($i==1): ?>first-version<?php endif; ?><?php if($i==$section_query->post_count): ?>last-version<?php endif; ?>">                      

                      <div class="page-default-news-item hover-sync-item">
                        <div class="item-title">
                          <div class="row">
                            <div class="col-xs-6">
                              <h4><?php echo $post_categories[0]->name; ?></h4>
                            </div>
                            <div class="col-xs-6">
                              <h4 class="item-date"><?php echo get_the_date('d M Y'); ?></h4>
                            </div>
                          </div>
                          <h3><a href="<?php the_permalink(); ?>" class="hover-sync"><?php echo $post_title; ?></a></h3>
                        </div>
                        <div class="item-copy">
                          <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                        <div class="item-cta-container">
                          <a href="<?php the_permalink(); ?>" class="plain-arrow-cta hover-sync">Read More</a>
                        </div>
                      </div> <!-- page-default-news-item -->

                    </div> <!-- item-column -->
                  </div>

                  <?php                                 
                    endwhile;
                    wp_reset_query();
                  ?>  
                  
                </div>
              </div> <!-- page-home-news-item-container -->

            </div>
          </div> <!-- row -->

        </div>
      </article>





    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

  <?php get_footer(); ?>