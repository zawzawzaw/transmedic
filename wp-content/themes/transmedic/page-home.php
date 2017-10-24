<?php 
/* 
Template Name: Home Template 
*/ 
?>

<?php get_header(); ?>

<?php 
$pageParent =  $post->post_parent;
$banner_H2 = get_post_meta($post->ID, 'page_banner_H2', true);
$banner_H3 = get_post_meta($post->ID, 'page_banner_H3', true);
$banner_caption = get_post_meta($post->ID, 'page_banner_caption', true);
$banner_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'page_banner_image_id', true ), 'full' );
$banner_image_tablet = wp_get_attachment_image_src( get_post_meta( $post->ID, 'page_banner_image_tablet_id', true ), 'full' );
$banner_image_mobile = wp_get_attachment_image_src( get_post_meta( $post->ID, 'page_banner_image_mobile_id', true ), 'full' );


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
    <div class="header-mobile-spacer"></div>


    <!--
       ____    _    _   _ _   _ _____ ____
      | __ )  / \  | \ | | \ | | ____|  _ \
      |  _ \ / _ \ |  \| |  \| |  _| | |_) |
      | |_) / ___ \| |\  | |\  | |___|  _ <
      |____/_/   \_\_| \_|_| \_|_____|_| \_\

    -->

    <article id="page-default-banner-section">
      <div id="page-default-banner-image">
        <div class="manic-image-container" data-vertical-align="top">
          <img src="" data-image-desktop="<?php echo $banner_image[0]; ?>"
                      data-image-tablet="<?php echo $banner_image_tablet[0]; ?>"
                      data-image-mobile="<?php echo $banner_image_mobile[0]; ?>">
        </div>
      </div>

      <div id="page-default-banner-copy-container">
        <div class="container-fluid has-breakpoint">
          <div class="row">
            <div class="col-md-6 col-md-push-0 col-sm-6 col-sm-push-1 col-xs-9 col-xs-push-0">

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
                    $img_tablet_url = $entry['home_page_wwd_sec_image_tablet'];                       
                    $img_mobile_url = $entry['home_page_wwd_sec_image_mobile'];                       
                    $img_title = $entry['home_page_wwd_sec_image_title'];

                    if($img_title=="Support & Maintenance") {
                      $img_title = "Post-Sales Support";
                    }

                    $counter = $key + 1;
                  ?>
                    <div class="col-md-4">
                      <div class="item-column <?php if($key==0): ?>first-version<?php endif; ?> <?php if($counter==count($page_home_what_we_do_entries)): ?>last-version<?php endif; ?>">

                        <div class="page-home-whatwedo-item hover-sync-item">
                          <a href="<?php echo get_permalink( get_page_by_path( 'about' ) ); ?>#<?php echo strtolower(explode(' ',trim($img_title))[0]); ?>" class="item-image hover-sync">
                            <div class="manic-image-container">
                              <img src=""
                                data-image-desktop="<?php echo $img_url; ?>"
                                data-image-tablet="<?php echo $img_tablet_url; ?>"
                                data-image-mobile="<?php echo $img_mobile_url; ?>">
                            </div>
                          </a>
                          <div class="item-copy">
                            <h5><a href="<?php echo get_permalink( get_page_by_path( 'about' ) ); ?>#<?php echo strtolower(explode(' ',trim($img_title))[0]); ?>" class="hover-sync"><?php echo $entry['home_page_wwd_sec_image_title'] ?></a></h5>
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
                $section_query = new WP_Query('post_type=post&tag=latest-technologies&orderby=menu_order&order=ASC');


                while ($section_query->have_posts()) : $section_query->the_post();

                  $post_title = get_the_title();
                  $post_categories = get_the_category();
                  $post_link = get_the_permalink();

                  $page_home_latest_tech_images = get_post_meta( $post->ID, 'single_post_page_post_content_image', true );
              ?>

              <div class="page-home-lastest-item">
                <div class="row">
                  <div class="col-md-8 v-align-col">
                    <div class="manic-image-container">
                      <?php foreach ( (array) $page_home_latest_tech_images as $key => $entry ):
                        $img_url = $entry['single_post_page_post_content_image'];                       
                        $img_tablet_url = $entry['single_post_page_post_content_image_tablet'];                       
                        $img_mobile_url = $entry['single_post_page_post_content_image_mobile'];                       
                      ?>
                      <img src="" data-image-desktop="<?php echo $img_url; ?>"
                                  data-image-tablet="<?php echo $img_tablet_url; ?>"
                                  data-image-mobile="<?php echo $img_mobile_url; ?>" alt="">
                      <?php endforeach; ?>
                    </div>
                  </div><!--
                  --><div class="col-md-4 v-align-col">
                    <div class="text-container">
                      <h3><?php echo $post_categories[0]->name; ?></h3>
                      <p><?php echo $post_title; ?></p>                      
                    </div>
                    <div class="cta-container">
                      <a href="<?php echo $post_link; ?>" class="read-more-cta">Read more</a>
                    </div>
                  </div>
                </div>
              </div>

              <?php endwhile; wp_reset_query(); ?>

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
    $home_page_brand_sec_title_mobile = get_post_meta($post->ID, 'home_page_brand_sec_title_mobile', true);            
    $home_page_b_sec_title = get_post_meta($post->ID, 'home_page_b_sec_title', true);            
    $home_page_b_sec_sub_title = get_post_meta($post->ID, 'home_page_b_sec_sub_title', true);            
    ?>
    <article id="page-home-brand-section">
      <div class="container-fluid has-breakpoint">

        <div class="row">
          <div class="col-md-5">

            <div id="page-home-brand-title">
              <h4 class="visible-xs visible-sm"><?php echo $home_page_brand_sec_title_mobile; ?></h4>
              <h2><?php echo $home_page_b_sec_title; ?></h2>
            </div> <!-- page-home-brand-title -->

          </div>
        
          <div class="col-md-6 hidden-xs hidden-sm">

            <div id="page-home-brand-copy-links-container">
              <div id="page-home-brand-copy">
                <h4><?php echo $home_page_b_sec_sub_title; ?></h4>
              </div>
              <div id="page-home-brand-links">
                <ul>
                <?php 
                  $section_query = new WP_Query('post_type=brands&order=ASC');
                  $i = 0;

                  while ($section_query->have_posts()) : $section_query->the_post();                    

                    if ($i !== 0 && $i % 4 == 0 && $i != $section_query->post_count) {
                      echo "</ul><ul>";
                    }

                    $brand_title = get_the_title();
                    $lower_case_brand_title = str_replace('/', '', strtolower($brand_title));
                    $lower_case_brand_title = preg_replace('/\s+/', ' ',$lower_case_brand_title);
                ?>
                    <li><a href="<?php echo home_url(); ?>/products#<?php echo str_replace(' ', '-', $lower_case_brand_title); ?>"><?php echo $brand_title; ?></a></li>
                <?php                    
                    $i++;
                  endwhile;
                  wp_reset_query();
                ?>
                </ul>
              </div> <!-- page-home-brand-links -->
            </div>              

          </div>
        </div> <!-- row -->

        <div class="row visible-xs visible-sm">
          <div class="col-md-12">
            <a href="<?php echo home_url(); ?>/products" class="square-cta">View brands</a>
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
      
      <?php $home_page_map_sec_background_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'home_page_map_sec_background_image_id', true ), 'full' ); ?>
      <?php $home_page_map_sec_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'home_page_map_sec_image_id', true ), 'full' ); ?>
      
      <div id="page-home-map-imge-bg">
        <img src="<?php echo $home_page_map_sec_background_image[0]; ?>">
      </div>

      <div id="page-home-map-image">

        <div class="manic-animated-svg fit-to-layout-version" id="home-map-animated-svg" data-image="<?php echo $home_page_map_sec_image[0]; ?>" data-width="1380" data-height="800">
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
            <div class="col-md-5 col-sm-5"></div>
            <div class="col-md-7 col-sm-6">

              <div id="page-home-map-copy">

                <div id="page-home-map-title">
                  <?php $home_page_map_sec_title = get_post_meta($post->ID, 'home_page_map_sec_title', true);   ?>
                  <?php $home_page_map_sec_cta_text = get_post_meta($post->ID, 'home_page_map_sec_cta_text', true);   ?>
                  <?php $home_page_map_sec_cta_link = get_post_meta($post->ID, 'home_page_map_sec_cta_link', true);   ?>
                  <h2><?php echo $home_page_map_sec_title; ?></h2>
                </div>

                <div id="page-home-map-info-item-container">
                  <?php
                  $home_page_map_sec_items = get_post_meta( $post->ID, 'home_page_map_sec_item', true ); 

                  foreach ( (array) $home_page_map_sec_items as $key => $item ):
                    $title = $item['home_page_map_sec_item_title'];                       
                    $number = $item['home_page_map_sec_item_number'];                                     
                  ?>
                  <div class="page-home-map-info-item" data-value="<?php echo $number; ?>">
                    <div class="item-bg"></div>
                    <h4><?php echo $title; ?></h4>
                    <div class="item-number-container"><span class="item-number odometer">00</span></div>
                  </div>
                  <?php 
                  endforeach;
                  ?>
                </div> <!-- page-home-map-info-item-container -->

                <div id="page-home-map-location" class="hidden-xs hidden-sm">
                  <h4>Our Locations</h4>
                  <ul>
                    <?php 
                      $section_query = new WP_Query('post_type=locations&order=ASC');
                      $i = 0;

                      while ($section_query->have_posts()) : $section_query->the_post();                    

                        if ($i !== 0 && $i % 2 == 0 && $i != count($section_query->post_count)) {
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
                  <a href="<?php echo home_url().$home_page_map_sec_cta_link; ?>" class="square-cta"><?php echo $home_page_map_sec_cta_text; ?></a>
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
                  $section_query = new WP_Query('post_type=post&tag=home-featured&orderby=menu_order&order=ASC');
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
                        <h4><?php echo $post_categories[0]->name; ?></h4>                          
                        <h5><a href="<?php the_permalink(); ?>" class="hover-sync"><?php echo $post_title; ?></a></h5>
                      </div>
                      <div class="visible-md visible-lg">
                        <div class="item-copy">
                          <p class="minimize-text" data-length="160" data-tablet-length="125" data-mobile-length="133"><?php echo get_the_excerpt(); ?></p>
                        </div>
                      </div>
                      <div class="visible-sm visible-xs">
                        <a href="<?php the_permalink(); ?>" class="item-copy">
                          <p class="minimize-text" data-length="160" data-tablet-length="125" data-mobile-length="133"><?php echo get_the_excerpt(); ?></p>
                        </a>
                      </div>
                      <div class="item-cta-container">
                        <a href="<?php the_permalink(); ?>" class="read-more-cta hover-sync">Read More</a>
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