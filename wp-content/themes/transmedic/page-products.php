<?php get_header(); ?>

<?php
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
      
      <article id="page-products-brands-section">
        <div class="container-fluid has-breakpoint">

          <div class="row">
            <div class="col-md-12">
              <?php $products_page_ob_sec_title = get_post_meta($post->ID, 'products_page_ob_sec_title', true); ?>
              <?php $products_page_ob_sec_text = get_post_meta($post->ID, 'products_page_ob_sec_text', true); ?>
              <?php $products_page_ob_sec_contact = get_post_meta($post->ID, 'products_page_ob_sec_contact', true); ?>

              <div id="page-products-brands-title">
                <h2><?php echo $products_page_ob_sec_title; ?></h2>
                <p><?php echo $products_page_ob_sec_text; ?></p>
                <p><?php echo $products_page_ob_sec_contact; ?></p>
              </div> <!-- page-home-whatwedo-title -->

            </div>
          </div> <!-- row -->

          <div class="row">
            <div class="col-md-12">
                
              <div id="page-products-brands-tabs-container">
                
                <div id="page-products-brands-tabs-icons">
                  <ul>
                    <li>
                      <a href="#" id="icon-view-btn" data-view="icon" class="change-tab active">
                        <span class="square"></span>
                        <span class="square"></span>
                        <span class="square"></span>
                        <span class="square"></span>
                      </a>
                    </li>
                    <li>
                      <a href="#" id="list-view-btn" data-view="list" class="change-tab ">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                      </a>
                    </li>
                  </ul>
                </div>
                                
                <div id="page-products-brands-icon-view-tab" class="products-brands-tabs active-tab">
                  <?php 
                    $section_query = new WP_Query('post_type=brands&order=ASC');

                    while ($section_query->have_posts()) : $section_query->the_post();                                          
                      $brand_title = get_the_title();
                      $lower_case_brand_title = str_replace('/', '', strtolower($brand_title));                      
                      $lower_case_brand_title = preg_replace('/\s+/', ' ',$lower_case_brand_title);              
                      $lower_case_brand_title = str_replace(' ', '-', strtolower($lower_case_brand_title));

                      // $ptype_brands_copy = get_post_meta( $post->ID, 'ptype_brands_copy', true ); 
                    ?>
                    <div class="scroll-target" data-value="<?php echo $lower_case_brand_title; ?>"></div>                
                    <div class="page-products-brands-icon-view-tab-item">

                        <h3 class="item-title add-space-version"><?php echo $brand_title; ?></h3>

                        <ul class="item-icons-list">
                          <?php
                          $ptype_brands_logo_entries = get_post_meta( $post->ID, 'ptype_brands_logo', true ); 

                          $i = 0;

                          foreach ( (array) $ptype_brands_logo_entries as $key => $entry ):              
                            $image_link = $entry['ptype_brands_link'];
                            $image_url = $entry['ptype_brands_logo'];
                          ?>                            
                            <li><a href="<?php echo $image_link; ?>" target="_blank"><div style="background-image: url('<?php echo $image_url; ?>');" class="<?php echo $lower_case_brand_title; ?>-icon-<?php echo $i+1 ?> item-icon"></div></a></li>                      
                          <?php
                            $i++;
                          endforeach; ?>
                        </ul>

                        <!-- <div class="item-copy">
                          <p><?php echo $ptype_brands_copy; ?></p>
                        </div> -->

                    </div> <!-- page-products-brands-icon-view-tab-item -->
                  <?php                                          
                    endwhile;
                    wp_reset_query();
                  ?>
                </div> <!-- page-products-brands-icon-view-tab -->

                <div id="page-products-brands-list-view-tab" class="products-brands-tabs ">
                  
                  <div id="page-products-brands-list-view-title">
                    <!-- <p><b>List view</b></p>
                    <p>To find out more about the full range of our products, please send in your enquiry to our specific sales teams.</p> -->
                  </div>

                  <div id="page-products-brands-list-view-items">
                    <?php 
                    $section_query = new WP_Query('post_type=brands&order=ASC');

                    while ($section_query->have_posts()) : $section_query->the_post();                                          
                      $brand_title = get_the_title();
                      $lower_case_brand_title = str_replace('/', '', strtolower($brand_title));                      
                      $lower_case_brand_title = preg_replace('/\s+/', ' ',$lower_case_brand_title);        
                      $lower_case_brand_title = str_replace(' ', '-', strtolower($lower_case_brand_title));

                      $ptype_brands_copy = get_post_meta( $post->ID, 'ptype_brands_copy', true ); 
                    ?>
                    <div class="page-products-brands-list-view-item">
                      <h3 class="item-title"><?php echo $brand_title; ?></h3>
                      <ul class="item-list">
                        <?php
                        $ptype_brands_logo_entries = get_post_meta( $post->ID, 'ptype_brands_logo', true ); 

                        $i = 0;

                        foreach ( (array) $ptype_brands_logo_entries as $key => $entry ):    
                          $brand_link = $entry['ptype_brands_link'];                                    
                          $brand_name = $entry['ptype_brands_name'];                                    
                        ?>
                        <li><p><b><a href="<?php echo $brand_link; ?>" target="_blank"><?php echo $brand_name; ?></a></b></p></li>
                        <?php
                          $i++;
                        endforeach; ?>                        
                      </ul>
                      <!-- <p class="item-email">Email: <a href="mailto:enquiry@transmedic.com">enquiry@transmedic.com</a></p> -->
                    </div>                                      
                    <?php                                          
                      endwhile;
                      wp_reset_query();
                    ?>
                  </div>
                </div> <!-- page-product-brands-list-view-tab -->                

              </div> <!-- page-products-brands-tabs-container -->  

            </div>
          </div> <!-- row -->

        </div>
      </article> <!-- page-products-brands-section -->

    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

<?php get_footer(); ?>