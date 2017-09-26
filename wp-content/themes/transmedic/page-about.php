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
      <div class="header-mobile-spacer hidden-lg"></div>
      
      <!-- 
          ____  ___    _   ___   ____________
         / __ )/   |  / | / / | / / ____/ __ \
        / __  / /| | /  |/ /  |/ / __/ / /_/ /
       / /_/ / ___ |/ /|  / /|  / /___/ _, _/
      /_____/_/  |_/_/ |_/_/ |_/_____/_/ |_|

      -->

      <article id="page-default-banner-section" class="about-version">

        <div id="page-default-banner-copy-container">
          <div class="container-fluid has-breakpoint">
            <div class="row">              
              
              <div class="col-md-6">
                <div id="banner-copy-left-col">
                  <div id="page-default-banner-copy">
                    <!-- <h2>In order for our <br class="hidden-md hidden-xs hidden-sm"> organisation to be great, <br class="hidden-md hidden-xs hidden-sm"> our culture and our people <br class="hidden-md hidden-xs hidden-sm"> must also be great.</h2>                   -->
                    <h2><?php echo $banner_H2; ?></h2>
                  </div> <!-- page-home-banner-copy -->
                </div>
              </div> <!-- col-md-6 -->
              
              <div class="col-md-6">
                <div id="banner-copy-right-col">
                  <div id="page-default-banner-copy">
                    <h3><?php echo $banner_H3; ?></h3>
                    <p><?php echo $banner_caption; ?></p>
                  </div>
                </div>
              </div> <!-- col-md-6 -->

            </div>
          </div>
        </div> <!-- page-home-banner-copy-container -->

      </article>
      

      <!-- 
       _       ____  _____  ______   _       ________   ____  ____
      | |     / / / / /   |/_  __/  | |     / / ____/  / __ \/ __ \
      | | /| / / /_/ / /| | / /     | | /| / / __/    / / / / / / /
      | |/ |/ / __  / ___ |/ /      | |/ |/ / /___   / /_/ / /_/ /
      |__/|__/_/ /_/_/  |_/_/       |__/|__/_____/  /_____/\____/

      -->

      <?php 
      $about_page_wwd_sec_title = get_post_meta($post->ID, 'about_page_wwd_sec_title', true);            
      ?>

      <article id="page-about-what-we-do-section">
        
        <div class="container-fluid has-breakpoint">
          <div id="page-about-what-we-do-title">
            <div class="row">
              <div class="col-md-12">
                <h2><?php echo $about_page_wwd_sec_title; ?></h2>
              </div>
            </div>
          </div>
          <div id="page-about-what-we-do-content">
            <?php
            $page_about_what_we_do_entries = get_post_meta( $post->ID, 'about_page_what_we_do', true ); 

            $i = 0;

            foreach ( (array) $page_about_what_we_do_entries as $key => $entry ):              
              $img_url = $entry['about_page_wwd_sec_image'];
              $img_title = $entry['about_page_wwd_sec_image_title'];
              $img_text = $entry['about_page_wwd_sec_image_text'];       
            ?>              
              <?php if( $i !== 0 && $i % 2 && $i != count($page_about_what_we_do_entries) ): ?>

                <div class="scroll-target" data-value="<?php echo strtolower(explode(' ',trim($img_title))[0]); ?>"></div>          
                <div class="page-about-what-we-do-content-item">
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="txt-col left-col">
                        <h3><?php echo $img_title; ?></h3>
                        <?php echo $img_text; ?>
                      </div> <!-- txt-col -->
                    </div>
                    
                    
                    <div class="col-md-6">
                      <div class="img-col right-col">
                        <div class="manic-image-container">
                          <img data-image-desktop="<?php echo $img_url; ?>"
                          data-image-tablet="<?php echo $img_url; ?>"
                          data-image-mobile="<?php echo $img_url; ?>" src="" alt="">
                        </div>
                      </div> <!-- img-col -->
                    </div>

                  </div> <!-- row -->
                </div> <!-- page-about-what-we-do-content-item -->

              <?php else: ?>

                <div class="scroll-target" data-value="<?php echo strtolower(explode(' ',trim($img_title))[0]); ?>"></div>          
                <div class="page-about-what-we-do-content-item">
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="img-col left-col">
                        <div class="manic-image-container">
                          <img data-image-desktop="<?php echo $img_url; ?>" 
                               data-image-tablet="<?php echo $img_url; ?>" 
                               data-image-mobile="<?php echo $img_url; ?>" src="" alt="">
                        </div>
                      </div> <!-- img-col -->
                    </div>
                    
                    <div class="col-md-6">
                      <div class="txt-col right-col">
                        <h3><?php echo $img_title; ?></h3>
                        <?php echo $img_text; ?>
                      </div> <!-- txt-col -->
                    </div> 

                  </div> <!-- row -->
                </div> <!-- page-about-what-we-do-content-item --> 

              <?php endif; ?>
            <?php
              $i++;
            endforeach;
            ?>                
          </div>
        </div>

      </article>


      <!-- 
          _______  ____________  ___
         / ____/ |/ /_  __/ __ \/   |
        / __/  |   / / / / /_/ / /| |
       / /___ /   | / / / _, _/ ___ |
      /_____//_/|_|/_/ /_/ |_/_/  |_|

       -->

      <?php 
      $about_page_careers_sec_title = get_post_meta($post->ID, 'about_page_careers_sec_title', true);            
      $about_page_careers_sec_text = get_post_meta($post->ID, 'about_page_careers_sec_text', true);            
      ?>

      <article id="page-about-extra-section">
        <div class="container-fluid has-breakpoint">
          <div class="row">
            <div class="col-md-6">
              <h2><?php echo $about_page_careers_sec_title; ?></h2>
            </div>  
            <div class="col-md-6">
              <?php echo $about_page_careers_sec_text; ?>              
            </div>
          </div>
        </div>
      </article>

    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

<?php get_footer(); ?>