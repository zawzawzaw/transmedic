<?php get_header(); ?>

<div id="page-wrapper">
  <div id="page-wrapper-content">

    <div id="page-home-nav-trigger"></div>


    <div class="header-desktop-spacer"></div>
    <div class="header-mobile-spacer hidden-lg"></div>
    
    <article id="page-article-section">
      <div class="container-fluid has-breakpoint">
        <div class="row">
          <div class="col-md-8">

            <div id="page-article-title-container">
              <div class="default-copy">
                <?php 
                $post_categories = get_the_category();
                foreach ($post_categories as $key => $value) {
                  $post_category = $value;
                }
                ?>
                <h4><?php echo $post_category->name; ?> / <?php echo get_the_date('d M Y'); ?></h4>
                <h2><?php the_title(); ?></h2>                
              </div>
            </div>
            
            <?php 
            $single_post_page_post_video = get_post_meta( $post->ID, 'single_post_page_post_video', true );
            $single_post_page_post_video_poster = get_post_meta( $post->ID, 'single_post_page_post_video_poster', true );
            $single_post_page_post_caption = get_post_meta($post->ID, 'single_post_page_post_caption', true); ?>
            
            <div id="page-article-video-container">
              <div id="page-article-video">
                <div class="manic-video-container auto-replay" data-video="<?php echo $single_post_page_post_video; ?>">
                  <video class="video-js vjs-default-skin" poster="<?php echo $single_post_page_post_video_poster; ?>" preload="auto" data-setup='{"controls": false}'>
                    <source src="" type="video/mp4" />
                  </video>
                </div>
              </div>

              <span class="default-image-desc"><?php echo $single_post_page_post_caption; ?></span>
            </div>

            <div id="page-article-text-container">
              <?php 
              $single_post_page_post_content_entries = get_post_meta($post->ID, 'single_post_page_post_content', true);
              ?>
              <?php if(count($single_post_page_post_content_entries) > 0): ?>
                <?php foreach ( (array) $single_post_page_post_content_entries as $key => $entry ): ?>
                  <h5><?php echo (isset($entry['single_post_page_post_content_title'])) ? $entry['single_post_page_post_content_title'] : ""; ?></h5>
                  
                  <?php echo (isset($entry['single_post_page_post_content_text'])) ? $entry['single_post_page_post_content_text'] : ""; ?>
                  <!-- <p>Some doctors that Mr Swift spoke to recommended removing the whole kidney as his kidney cancer was more that 4cm in size but Dr Chin was confident that he could do the a partial nephrectomy using the da Vinci robot so that most of kidney is spared. “It would not be possible to do partial nephrectomy for a tumour this size using standard laparoscopy because of the inherent limitations of the rigid instruments. Also, the kidney can only tolerate 30 mins of   blood supply intteruption and time is of essence in this surgery. So the usual options will either be open surgery with an incision at least 20cm long given his large frame, or laparoscopic total nephrectomy if the robot was not available,”said Dr Chin.</p>

                  <p>“There were some challenges in the operation due to Mr Swift’s body size, tumour size and its unusual location in his kidney,”Dr Chin explained. “It took 3 hours and 45 minutes, but thanks to the robotic technology, the cancer could be excised with clear margins and blood loss of less than 300 ml with no blood transfusion needed.”</p> -->
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
            <?php
              $single_post_page_post_content_image_entries = get_post_meta($post->ID, 'single_post_page_post_content_image', true);
            ?>
            <?php if(count($single_post_page_post_content_entries) > 0): ?>
              <div id="page-article-carousel-container">
                <div id="page-article-image-carousel" class="transmedic-slick-slider">
                  
                  <?php foreach ( (array) $single_post_page_post_content_image_entries as $key => $entry ): ?>
                    <div class="carousel-item">
                      <div class="manic-image-container">
                        <img src="" 
                          data-image-desktop="<?php echo $entry['single_post_page_post_content_image']; ?>"
                          data-image-tablet="<?php echo $entry['single_post_page_post_content_image']; ?>"
                          data-image-mobile="<?php echo $entry['single_post_page_post_content_image']; ?>" alt="">
                      </div>
                    </div>
                  <?php endforeach; ?>

                </div> <!-- page-article-image-carousel -->

                <div id="page-article-image-carousel-nav" class="transmedic-slick-slider">
                
                  <?php foreach ( (array) $single_post_page_post_content_image_entries as $key => $entry ): ?>
                    <div class="carousel-item">
                      <div class="manic-image-container">
                        <img src="" 
                          data-image-desktop="<?php echo $entry['single_post_page_post_content_image']; ?>"
                          data-image-tablet="<?php echo $entry['single_post_page_post_content_image']; ?>"
                          data-image-mobile="<?php echo $entry['single_post_page_post_content_image']; ?>" alt="">
                      </div>
                    </div>
                  <?php endforeach; ?>
                  
                </div>
              </div>
            <?php endif; ?>
            
            <div id="page-article-key-points-container">
              <?php
                $single_post_page_post_extra_title = get_post_meta($post->ID, 'single_post_page_post_extra_title', true);
                $single_post_page_post_extra_text = get_post_meta($post->ID, 'single_post_page_post_extra_text', true);
              ?>
              <p><b><?php echo $single_post_page_post_extra_title; ?></b></p>
              <?php echo $single_post_page_post_extra_text; ?>
            </div>

            <div id="page-article-tags-container">
              <h6>Tags:</h6>                
              <ul>
                <?php $article_tags = get_the_terms($post->ID, 'article_tag', true); ?>
                <?php foreach ($article_tags as $key => $article_tag): ?>
                  <li><h6><a href="javascript:void(0);"><?php echo $article_tag->name; ?></a></h6></li>
                <?php endforeach; ?>
              </ul>
            </div> <!-- page-article-tags-container -->

            <div id="page-article-published-date-container"><h6>Published on <?php the_date('d M Y'); ?></h6></div>
            <?php $single_post_page_source_article_title = get_post_meta($post->ID, 'single_post_page_source_article_title', true); ?>
            <?php $single_post_page_source_article_link = get_post_meta($post->ID, 'single_post_page_source_article_link', true); ?>
            <div id="page-article-source-container"><h6>Source: <a href="<?php echo $single_post_page_source_article_link; ?>"><?php echo $single_post_page_source_article_title; ?></a></h6></div>
            <div id="page-article-social-media-container">
              <ul>
                <li><i class="fa fa-share-alt" aria-hidden="true"></i></li>
                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-envelope-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a></li>
                </li>
              </ul>
            </div> <!-- page-article-social-media-container -->

          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3">

            <div id="page-article-sidebar-container">

              <div id="sidebar-title" class="default-copy">
                <h4>you may also like</h4>                                    
              </div> <!-- you may also like -->
              
              <div id="sidebar-title-image">                
                <div class="manic-image-container">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </div>
              </div> <!-- sidebar-title-image -->
              
              <div id="page-default-news-item-container" class="article-page-version">
                <?php              
                //Create WordPress Query with 'orderby' set to 'rand' (Random)
                $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '5' ) );
                // output the random post
                while ( $the_query->have_posts() ) : $the_query->the_post();
                  $posttags = get_the_tags();
                  foreach ($posttags as $key => $posttag) {
                    $tag_names[] = $posttag->name;  
                  }

                  if(in_array("news", $tag_names)):
                ?>
                  <div class="page-default-news-item">
                    <div class="item-column">
                      <div class="item-title">
                        <div class="row">
                          <div class="col-xs-8">
                            <?php 
                            $post_categories = get_the_category();
                            foreach ($post_categories as $key => $value) {
                              $post_category = $value;
                            }
                            ?>
                            <h4><?php echo $post_category->name; ?></h4>
                          </div>
                          <div class="col-xs-4">
                            <h4 class="item-date"><?php echo get_the_date('d M Y'); ?></h4>
                          </div>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>" class="hover-sync minimize-text" data-length="60" data-tablet-length="25" data-mobile-length="33"><?php the_title(); ?></a></h3>
                      </div>      
                    </div>                
                  </div> <!-- page-default-news-item -->
                <?php
                  endif;
                endwhile;

                // Reset Post Data
                wp_reset_postdata();
                ?>                

              </div> <!-- page-default-news-item-container -->

            </div> <!-- page-article-sidebar-container -->

          </div>
        </div>
      </div>
    </article> <!-- page-article-section -->

    <article id="page-article-contact-info-section">
      <div class="container-fluid has-breakpoint">
        <div class="row">
          <div class="col-md-12">
            <div id="contact-info-bg-container">
              <?php
                $single_post_page_additional_info_header_text = get_post_meta($post->ID, 'single_post_page_additional_info_header_text', true);
                $single_post_page_additional_info_title = get_post_meta($post->ID, 'single_post_page_additional_info_title', true);
                $single_post_page_additional_info_text = get_post_meta($post->ID, 'single_post_page_additional_info_text', true);
              ?>
              <p><?php echo $single_post_page_additional_info_header_text; ?></p>
              <h5><?php echo $single_post_page_additional_info_title; ?></h5>

              <?php echo $single_post_page_additional_info_text; ?>

            </div>
          </div>
        </div> <!-- row -->        
      </div>
    </article> <!-- page-article-contact-info-section -->
    

  </div> <!-- #page-wrapper-content -->
</div> <!-- #page-wrapper -->

<?php get_footer(); ?>