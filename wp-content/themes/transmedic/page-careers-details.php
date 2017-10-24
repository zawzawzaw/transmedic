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



      <!-- first article target -->
      
      
      <article id="page-article-section">
        <div class="container-fluid has-breakpoint">
          <div class="row">
            <div class="col-md-8">



              <div id="page-article-career-item-container">
                <?php
                $page_home_what_we_do_entries = get_post_meta( $post->ID, 'careers_details_page_careers_stories', true ); 

                foreach ( (array) $page_home_what_we_do_entries as $key => $entry ):
                  $sub_title = $entry['careers_details_page_story_sec_sub_title'];             
                  $title = $entry['careers_details_page_story_sec_title'];               
                  $img = $entry['careers_details_page_story_sec_image'];                       
                  $content = $entry['careers_details_page_story_sec_content'];

                  $counter = $key + 1;
                ?>
                <!-- <div class="scroll-target" data-value="fabian"></div> -->
                <?php 
                $name = explode(' ', $sub_title);
                $name = $name[0];

                $name = strtolower($name);

                $name = substr($name, 0, strpos($name, "'s"));
                 ?>
                <div class="scroll-target page-article-scroll-target" data-value="<?php echo $name; ?>" ></div>
                <div class="page-article-career-item">
                  <div id="page-article-title-container">
                    <div class="default-copy">
                      <h4><?php echo $sub_title; ?></h4>
                      <h2><?php echo $title; ?></h2>
                    </div>
                  </div>
                  
                  <div id="page-article-video-container">
                    <div id="page-article-video">
                      <div class="manic-image-container">
                        <img src="" data-image="<?php echo $img; ?>">
                      </div>
                    </div>
                    <div class="default-image-margin"></div>

                  </div>

                  <div id="page-article-text-container">
                    <?php echo $content; ?>
                  </div>
                </div> <!-- page-article-career-item -->

                <?php 
                endforeach; 
                ?>
              </div> <!-- page-article-career-item-container -->





            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">


              <div id="page-article-sidebar-fixed-container">
                <div id="page-article-sidebar-container">
                  <?php 
                  $careers_details_page_sidebar_title = get_post_meta($post->ID, 'careers_details_page_sidebar_title', true);
                  $careers_details_page_sidebar_image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'careers_details_page_sidebar_image_id', true ), 'full' );
                   ?>
                  <div id="sidebar-title" class="default-copy">
                    <h5><?php echo $careers_details_page_sidebar_title; ?></h5>                                    
                  </div> <!-- you may also like -->
                  
                  <div id="sidebar-title-image">
                    <div class="manic-image-container">
                      <img src="<?php echo $careers_details_page_sidebar_image[0]; ?>" alt="">
                    </div>
                  </div> <!-- sidebar-title-image -->
                  
                  <div id="page-default-news-item-container" class="career-detail-page-version">
                    <?php              
                    //Create WordPress Query with 'orderby' set to 'rand' (Random)
                    $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '5' ) );
                    // output the random post
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                      $posttags = get_the_tags();
                      foreach ($posttags as $key => $posttag) {
                        $tag_names[] = $posttag->name;  
                      }

                      if(in_array("Main News Index", $tag_names)):
                    ?>
                    <div class="page-default-news-item">
                      <div class="item-column">
                        <div class="item-title">
                          <?php 
                          $post_categories = get_the_category();
                          foreach ($post_categories as $key => $value) {
                            $post_category = $value;
                          }
                          ?>
                          <h4><?php echo $post_category->name; ?></h4>
                          
                          <h5><a href="<?php the_permalink(); ?>" class="minimize-text" data-length="60" data-tablet-length="60" data-mobile-length="33"><?php the_title(); ?></a></h5>
                        </div>      
                      </div>                
                    </div> <!-- page-default-news-item -->
                    <?php endif; endwhile; ?>

                  </div> <!-- page-default-news-item-container -->

                </div> <!-- page-article-sidebar-container -->
              </div> <!-- page-article-sidebar-fixed-container -->

            </div>
          </div>
        </div>
      </article> <!-- page-article-section -->

      
      

    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

<?php get_footer(); ?>