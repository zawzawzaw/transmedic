<?php get_header(); ?>

<?php 
$pageParent =  $post->post_parent;
$banner_H2 = get_post_meta($post->ID, 'page_banner_H2', true);
$banner_H3 = get_post_meta($post->ID, 'page_banner_H3', true);
$banner_caption = get_post_meta($post->ID, 'page_banner_caption', true);
$banner_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'page_banner_image_id', true ), 'full' );
$banner_tablet_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'page_banner_image_tablet_id', true ), 'full' );
$banner_mobile_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'page_banner_image_mobile_id', true ), 'full' );


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

      <article id="page-default-banner-section" class="contact-version">

        <div id="page-default-banner-image" class="short-version">
          <div class="manic-image-container" data-vertical-align="top">
            <img src="" 
              data-image-desktop="<?php echo $banner_image[0]; ?>"
              data-image-tablet="<?php echo $banner_tablet_image[0]; ?>"
              data-image-mobile="<?php echo $banner_mobile_image[0]; ?>">
          </div>
        </div>

      </article>

      <article id="page-contact-offices-section">
        
        <div class="container-fluid has-breakpoint">

          <div id="page-contact-offices-title">
            <div class="row">
              <div class="col-md-4 col-md-push-0 col-sm-10 col-sm-push-1">
                <div class="flex-center">
                  <?php $contact_page_of_sec_title = get_post_meta($post->ID, 'contact_page_of_sec_title', true); ?>
                  <h2><?php echo $contact_page_of_sec_title; ?></h2>
                </div>
              </div>
            </div>
          </div> <!-- page-contact-offices-title -->

          <div id="page-contact-offices-content">
            
            <div class="row">
              
              <?php 
                $section_query = new WP_Query('post_type=locations&order=ASC');
                $i = 0;

                while ($section_query->have_posts()) : $section_query->the_post();                    

                  if ($i !== 0 && $i % 3 == 0 && $i != $section_query->post_count) {
                    echo "</row><row>";
                  }

                  $office_title = get_the_title();
                  $lower_case_office_title = str_replace('/', '', strtolower($office_title));
                  $lower_case_office_title = preg_replace('/\s+/', ' ',$lower_case_office_title);

                  $ptype_locations_address = get_post_meta($post->ID, 'ptype_locations_address', true);
                  $ptype_locations_email_phone = get_post_meta($post->ID, 'ptype_locations_email_phone', true);
                  $ptype_locations_map_link_copy = get_post_meta($post->ID, 'ptype_locations_map_link_copy', true);
                  $ptype_locations_map_link = get_post_meta($post->ID, 'ptype_locations_map_link', true);
                  
                  // if($i == $section_query->post_count - 1) 
                  //   last-item 
                  // remove from page-contact-offices-content-item class
              ?>
              <div class="col-md-4 col-md-push-0 col-sm-10 col-sm-push-1">
                <div class="flex-center">
                  <div class="page-contact-offices-content-item"> 
                    <div class="page-contact-offices-content-item-title">
                      <h5><?php echo $office_title; ?></h5>
                    </div>

                    <div class="page-contact-offices-content-item-address">
                      <p><?php echo $ptype_locations_address; ?></p>
                    </div>
                    
                    <div class="page-contact-offices-content-item-more-contact">
                      <?php echo $ptype_locations_email_phone; ?>
                    </div>
                      
                    <div class="page-contact-offices-content-item-cta">
                      <a href="<?php echo $ptype_locations_map_link; ?>" target="_blank" class="underline-link"><?php echo $ptype_locations_map_link_copy; ?></a>
                    </div>
                  </div> <!-- page-contact-offices-content-item -->
                </div> <!-- flex-center -->
              </div>
              <?php                    
                  $i++;
                endwhile;
                wp_reset_query();
              ?>


            </div> <!-- row -->            
            
          </div> <!-- page-contact-offices-content -->
        </div> 

      </article>

      <!-- <article id="page-contact-extra-section">
        <div class="container-fluid has-breakpoint">
          <div class="row">
            <div class="col-md-3 col-md-push-0 col-sm-10 col-sm-push-1">
              <div class="flex-center">
                <div>
                  <?php $contact_page_en_sec_title = get_post_meta($post->ID, 'contact_page_en_sec_title', true); ?>
                  <h5 style="white-space: pre;"><?php echo $contact_page_en_sec_title; ?></h5>
                </div>
              </div>
            </div>  
            <div class="col-md-1"></div>
            <div class="col-md-8 col-md-push-0 col-sm-10 col-sm-push-1">
              <div class="row">

                <div class="col-md-6">
                  <ul>
                    <?php 
                      $section_query = new WP_Query('post_type=brands&order=ASC');
                      $i = 0;

                      while ($section_query->have_posts()) : $section_query->the_post();                    

                        if ($i !== 0 && $i % 3 == 0 && $i != $section_query->post_count) {
                          echo "</ul></div><div class='col-md-6'><ul>";
                        }

                        $brand_title = get_the_title();
                        $lower_case_brand_title = str_replace('/', '', strtolower($brand_title));
                        $lower_case_brand_title = preg_replace('/\s+/', ' ',$lower_case_brand_title);

                        $ptype_brand_contact_email = get_post_meta($post->ID, 'ptype_brand_contact_email', true);                         
                    ?>
                      <li>
                        <span><?php echo $brand_title; ?></span>
                        <a href="mailto:enquiries@transmedicgroup.com" class="underline-link">enquiries@transmedicgroup.com</a>
                      </li>
                    <?php                    
                        $i++;
                      endwhile;
                      wp_reset_query();
                    ?>
                  </ul>
                </div> <!- - col-md-6 - ->                

              </div> <!- - row - ->           
            </div>
          </div> <!- - row - ->
        </div> <!- - container-fluid - ->
      </article> -->

    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

<?php get_footer(); ?>