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
      <div class="header-mobile-spacer"></div>

      <article id="page-default-banner-section" class="careers-version">
        <div id="page-default-banner-image" class="short-version">
          <div class="manic-image-container">
            <img src="" 
              data-image-desktop="<?php echo $banner_image[0]; ?>"
              data-image-tablet="<?php echo $banner_tablet_image[0]; ?>"
              data-image-mobile="<?php echo $banner_mobile_image[0]; ?>">
          </div>
        </div>

        <div id="page-default-banner-copy-container">
          <div class="container-fluid has-breakpoint">
            <div class="row">
              <div class="col-md-7">

                <div id="page-default-banner-copy" class="subtitle-version">
                  <h2><?php echo $banner_H2; ?></h2>
                  <h5><?php echo $banner_caption ?></h5>
                </div> <!-- page-home-banner-copy -->

              </div>
            </div>
          </div>
        </div> <!-- page-home-banner-copy-container -->
      </article>
      
      <article id="page-careers-section">
        <div class="container-fluid has-breakpoint">
          <?php
            $careers_page_content_entries = get_post_meta( $post->ID, 'careers_page_content', true ); 

            $i = 0;

            foreach ( (array) $careers_page_content_entries as $key => $entry ):              
              $careers_page_sec_title = $entry['careers_page_sec_title'];
              $careers_page_sec_text = $entry['careers_page_sec_text'];
              $careers_page_sec_quote = $entry['careers_page_sec_quote'];
              $careers_page_sec_author = $entry['careers_page_sec_author'];
              $careers_page_sec_author_position = $entry['careers_page_sec_author_position'];
              $careers_page_sec_article_link = $entry['careers_page_sec_article_link'];
            ?>
              <?php if( $i !== 0 && $i % 2 && $i != count($careers_page_content_entries) ): ?>
                <div class="row">            
                  <div class="col-md-6 align-col hidden-xs hidden-sm">
                    <span class="quote">“<?php echo $careers_page_sec_quote; ?>”</span>
                    <span class="author"><?php echo $careers_page_sec_author; ?></span>
                    <span class="author-position"><?php echo $careers_page_sec_author_position; ?></span>
                    <div class="cta-container">
                      <a href="<?php echo home_url() . $careers_page_sec_article_link; ?>" class="read-more-cta">read her story</a>
                    </div>
                  </div><!--
                  --><div class="col-md-6 align-col">
                    <div class="text-container">
                      <h3><?php echo $careers_page_sec_title; ?></h3>
                      <?php echo $careers_page_sec_text; ?>
                    </div>
                  </div><!--
                  --><div class="col-md-6 align-col visible-xs visible-sm">
                    <div class="quote-container last-version">
                      <span class="quote">“<?php echo $careers_page_sec_quote; ?>”</span>
                      <span class="author"><?php echo $careers_page_sec_author; ?></span>
                      <span class="author-position"><?php echo $careers_page_sec_author_position; ?></span>
                      <div class="cta-container">
                        <a href="<?php echo home_url() . $careers_page_sec_article_link; ?>" class="read-more-cta">read her story</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php else: ?>
                <div class="row">
                  <div class="col-md-6 align-col">
                    <div class="text-container">
                      <h3><?php echo $careers_page_sec_title; ?></h3>
                      <?php echo $careers_page_sec_text; ?>
                    </div>
                  </div><!--
                  --><div class="col-md-6 align-col">
                    <div class="quote-container">
                      <span class="quote">“<?php echo $careers_page_sec_quote; ?>”</span>
                      <span class="author"><?php echo $careers_page_sec_author; ?></span>
                      <span class="author-position"><?php echo $careers_page_sec_author_position; ?></span>
                      <div class="cta-container">
                        <a href="<?php echo home_url() . $careers_page_sec_article_link; ?>" class="read-more-cta">read his story</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php $i++; ?>
            <?php endforeach; ?>          

        </div>
      </article> <!-- page-careers-section -->

      <?php
      $careers_page_extra_sec_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'careers_page_extra_sec_image_id', true ), 'full' );
      $careers_page_extra_sec_title = get_post_meta( $post->ID, 'careers_page_extra_sec_title', true );
      $careers_page_extra_sec_text = get_post_meta( $post->ID, 'careers_page_extra_sec_text', true );
      ?>

      <article id="page-careers-extra-section">
        <div class="container-fluid has-breakpoint">
          <div class="row">
            <div class="col-md-12">
              <div class="manic-image-container">
                <img src="" 
                  data-image-desktop="<?php echo $careers_page_extra_sec_image[0]; ?>"
                  data-image-tablet="<?php echo $careers_page_extra_sec_image[0]; ?>"
                  data-image-mobile="images_cms/careers/careers-section-01-mobile.jpg" alt="">
              </div>

              <div id="page-careers-extra-image-caption">
                <div class="row">
                  <div class="col-md-5">
                    <h2><?php echo $careers_page_extra_sec_title; ?></h2>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <p><?php echo $careers_page_extra_sec_text; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article> <!-- page-careers-section -->

      <article id="page-careers-job-position-section">
        <div class="container-fluid has-breakpoint">
          <div class="row">
            <div class="col-md-12">
              <div id="page-careers-job-position-title" class="hidden-xs hidden-sm">
                <?php $careers_page_job_sec_title = get_post_meta( $post->ID, 'careers_page_job_sec_title', true ); ?>
                <h2><?php echo $careers_page_job_sec_title; ?></h2>

                <div id="page-careers-job-filters-pin-trigger"></div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <?php
                  $post_type = 'jobs';

                  // Get all the taxonomies for this post type
                  $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );                  

                  $terms = get_terms([
                      'taxonomy' => 'country',
                      'hide_empty' => false,
                  ]);

                  $reversed_terms = array_reverse($terms);
                  ?>

                  <div id="page-careers-job-filters-pin-container">
                    <div id="page-careers-job-filters-container" class="hidden-xs hidden-sm">
                      <ul>
                      <?php foreach( $reversed_terms as $term ) :  ?>
                        <li>
                          <h4><a href="#<?php echo strtolower($term->name); ?>" class="active-tab"><?php echo $term->name; ?> <span class="job-count">(<?php echo $term->count; ?>)</span></a><h4>
                        </li>
                      <?php endforeach; ?>             
                      </ul>
                    </div>
                  </div> <!-- page-careers-job-filters-pin-container -->


                  <!-- these are the mobile filters -->

                  <div id="page-careers-job-filters-pin-trigger-mobile"></div>
                  
                  <div id="page-careers-job-filters-pin-container-mobile">
                    <div class="sans-container-fluid-tablet-no-padding">
                      <div id="page-careers-job-filters-container-mobile" class="visible-xs visible-sm">
                        <div class="manic-dropdown">
                          <select name="location_filter" id="location_filter">
                            <?php $i = 0; ?>
                            <?php foreach( $reversed_terms as $term ) :  ?>
                              <?php if($i==0): ?>
                                <option value=""><?php echo $term->name; ?> <span class="job-count">(<?php echo $term->count; ?>)</span></option>  
                              <?php endif; ?>
                                <option value="#<?php echo strtolower($term->name); ?>"><?php echo $term->name; ?> <span class="job-count">(<?php echo $term->count; ?>)</span></option>  
                              <?php $i++; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div> <!-- page-careers-job-filters-pin-container-mobile -->

                </div> <!-- col-md-2 -->

                <div class="col-md-10">
                  <div class="seperator-line"></div>
                  
                  <?php $i = 0; ?>
                  <?php foreach( $reversed_terms as $term ) :  ?>
                    <div class="location-tab <?php if($i==0): ?>active-tab<?php endif; ?>" id="<?php echo strtolower($term->name); ?>-positions">
                      <div class="job-list-item-container">
                        <?php
                        $args = array(
                        'post_type' => 'jobs',
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'country',
                            'field' => 'id',
                            'terms' => $term->term_id
                             )
                          )
                        );
                        $section_query = new WP_Query( $args ); ?>

                        <?php 
                        while ($section_query->have_posts()) : $section_query->the_post();
                          $post_title = get_the_title();     
                          $ptype_jobs_responsibilities = get_post_meta( $post->ID, 'ptype_jobs_responsibilities', true );
                          $ptype_jobs_requirements = get_post_meta( $post->ID, 'ptype_jobs_requirements', true );
                          $ptype_jobs_apply_to_text = get_post_meta( $post->ID, 'ptype_jobs_apply_to_text', true );
                        ?>
                          <div class="job-list-item">

                            <div class="job-list-item-title">
                              <div class="row">
                                <div class="col-md-6 col-xs-8">
                                  <div class="job-list-item-job-title-container">
                                    <h6><?php echo $post_title; ?></h6>
                                  </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1 col-xs-4">
                                  <div class="job-list-item-view-detail-cta-container">
                                    <a href="#" class="view-details-cta">View details</a>
                                  </div>
                                </div>
                              </div> <!-- row -->
                            </div> <!-- job-list-item-title -->

                            <div class="job-list-item-content">
                              <div class="row">
                                <div class="col-md-6">
                                  <h4 class="job-title">Responsibilities:</h4>
                                  <?php echo $ptype_jobs_responsibilities; ?>                                  
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                  <h4 class="job-title">Requirements:</h4>
                                  <?php echo $ptype_jobs_requirements; ?>
                                </div>
                              </div> <!-- row -->

                              <p><?php echo $ptype_jobs_apply_to_text; ?></p>
                              
                            </div> <!-- job-list-item-content -->

                          </div> <!-- job-list-item -->
                        <?php
                        endwhile;
                        wp_reset_query();
                        ?>                                              

                      </div> <!-- job-list-item-container -->
                    </div>
                    <?php $i++; ?>
                  <?php endforeach; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </article> <!-- page-careers-section -->

    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

<?php get_footer(); ?>