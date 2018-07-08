<?php get_header(); ?>

<div id="page-wrapper">
  <div id="page-wrapper-content">

    <div id="page-home-nav-trigger"></div>


    <div class="header-desktop-spacer"></div>
    <div class="header-mobile-spacer"></div>
    
    <article id="page-article-section">
      <div class="container-fluid has-breakpoint">
        <div class="row">
          <div class="col-md-8">

            <div id="page-article-title-container">
              <div class="default-copy">
                <?php 
                $post_categories = get_the_category();
                // foreach ($post_categories as $key => $value) {
                //   $post_category = $value;
                // }
                ?>
                <h4><?php echo (isset($post_categories) && !empty($post_categories)) ? $post_categories[0]->name : ""; ?> / <?php echo get_the_date('d M Y'); ?></h4>
                <h2><?php the_title(); ?></h2>                
              </div>
            </div>

            <div id="page-article-custom-container">
              <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                  <?php the_content(); ?>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
            
            <?php 
            $single_post_page_post_video = get_post_meta( $post->ID, 'single_post_page_post_video', true );
            $single_post_page_post_video_poster = get_post_meta( $post->ID, 'single_post_page_post_video_poster', true );
            $single_post_page_post_caption = get_post_meta($post->ID, 'single_post_page_post_caption', true); ?>
            
            <?php if(!empty($single_post_page_post_video_poster) || !empty($single_post_page_post_video)): ?>
            <div id="page-article-video-container">
              <div id="page-article-video">
                <?php if (strpos($single_post_page_post_video, 'youtube') !== false || strpos($single_post_page_post_video, 'vimeo') !== false): ?>
                  <?php
                  if(strpos($single_post_page_post_video, 'watch') !== false) {
                    parse_str( parse_url( $single_post_page_post_video, PHP_URL_QUERY ), $my_array_of_vars );
                    $single_post_page_post_video = 'https://www.youtube.com/embed/'.$my_array_of_vars['v'];
                  }
                  ?>
                  <figure>
                    <iframe width="425" height="349" src="<?php echo $single_post_page_post_video; ?>" frameborder="0" allowfullscreen></iframe>
                  </figure>
                <?php elseif(!empty($single_post_page_post_video)): ?>
                  <div class="manic-video-container auto-replay" data-video="<?php echo $single_post_page_post_video; ?>">
                    <video class="video-js vjs-default-skin" poster="<?php echo $single_post_page_post_video_poster; ?>" preload="auto" data-setup='{"controls": false}'>
                      <source src="" type="video/mp4" />
                    </video>
                  </div>                
                <?php else: ?>
                  <div class="manic-image-container">
                    <img src="" data-image-desktop="<?php echo $single_post_page_post_video_poster; ?>" data-image-tablet="<?php echo $single_post_page_post_video_poster; ?>" data-image-mobile="<?php echo $single_post_page_post_video_poster; ?>" alt="">
                  </div>
                <?php endif; ?>
              </div>

              <span class="default-image-desc"><?php echo $single_post_page_post_caption; ?></span>
            </div>
            <?php endif; ?>

            <div id="page-article-text-container">
              <?php 
              $single_post_page_post_content_entries = get_post_meta($post->ID, 'single_post_page_post_content', true);
              ?>
              <?php if(count($single_post_page_post_content_entries) > 0): ?>
                <?php foreach ( (array) $single_post_page_post_content_entries as $key => $entry ): ?>
                  <h3><?php echo (isset($entry['single_post_page_post_content_title'])) ? $entry['single_post_page_post_content_title'] : ""; ?></h3>
                  
                  <?php echo (isset($entry['single_post_page_post_content_text'])) ? $entry['single_post_page_post_content_text'] : ""; ?>
                  <!-- <p>Some doctors that Mr Swift spoke to recommended removing the whole kidney as his kidney cancer was more that 4cm in size but Dr Chin was confident that he could do the a partial nephrectomy using the da Vinci robot so that most of kidney is spared. “It would not be possible to do partial nephrectomy for a tumour this size using standard laparoscopy because of the inherent limitations of the rigid instruments. Also, the kidney can only tolerate 30 mins of   blood supply intteruption and time is of essence in this surgery. So the usual options will either be open surgery with an incision at least 20cm long given his large frame, or laparoscopic total nephrectomy if the robot was not available,”said Dr Chin.</p>

                  <p>“There were some challenges in the operation due to Mr Swift’s body size, tumour size and its unusual location in his kidney,”Dr Chin explained. “It took 3 hours and 45 minutes, but thanks to the robotic technology, the cancer could be excised with clear margins and blood loss of less than 300 ml with no blood transfusion needed.”</p> -->
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
            <?php
              $single_post_page_post_content_image_entries = get_post_meta($post->ID, 'single_post_page_post_content_image', true);
            ?>
            <div id="page-article-carousel-container">
              <?php if(count($single_post_page_post_content_entries) > 0): ?>              
                <div id="page-article-image-carousel" class="transmedic-slick-slider">
                  
                  <?php foreach ( (array) $single_post_page_post_content_image_entries as $key => $entry ): ?>
                    <?php if(!empty($entry['single_post_page_post_content_image'])): ?>
                    <div class="carousel-item" data-caption="<?php echo $entry['single_post_page_post_content_image_caption']; ?>">
                      <div class="manic-image-container">
                        <img src="" 
                          data-image-desktop="<?php echo $entry['single_post_page_post_content_image']; ?>"
                          data-image-tablet="<?php echo $entry['single_post_page_post_content_image']; ?>"
                          data-image-mobile="<?php echo $entry['single_post_page_post_content_image']; ?>" alt="">
                      </div>                      
                    </div>
                    <?php endif; ?>
                  <?php endforeach; ?>

                </div> <!-- page-article-image-carousel -->
                <div id="page-article-image-carousel-caption">
                  <span class="default-image-desc carousel-version"></span>
                </div>
              
                <div id="page-article-image-carousel-nav" class="transmedic-slick-slider <?php echo count($single_post_page_post_content_image_entries); ?>" <?php if(count($single_post_page_post_content_image_entries) < 5): ?>style="display: none;"<?php endif; ?>>
                
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
              <?php endif; ?>                          
            </div>
            
            <div id="page-article-key-points-container">
              <?php
                $single_post_page_post_extra_title = get_post_meta($post->ID, 'single_post_page_post_extra_title', true);
                $single_post_page_post_extra_text = get_post_meta($post->ID, 'single_post_page_post_extra_text', true);
              ?>
              <p><b><?php echo $single_post_page_post_extra_title; ?></b></p>
              <?php echo $single_post_page_post_extra_text; ?>
            </div>

            <div id="page-article-tags-container">
              <?php $article_tags = get_the_terms($post->ID, 'article_tag', true); ?>
              <?php if(!empty($article_tags)): ?>
                <p><b>Tags:</b></p>              
                <ul>
                  <?php foreach ($article_tags as $key => $article_tag): ?>
                    <li><a href="<?php echo get_term_link($article_tag->term_id); ?>"><?php echo $article_tag->name; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div> <!-- page-article-tags-container -->

            <div id="page-article-published-date-container"><p>Published on <?php echo get_the_date('d M Y'); ?></p></div>
            <?php $single_post_page_source_article_title = get_post_meta($post->ID, 'single_post_page_source_article_title', true); ?>
            <?php $single_post_page_source_article_link = get_post_meta($post->ID, 'single_post_page_source_article_link', true); ?>
            
            <?php if(!empty($single_post_page_source_article_title)): ?>
              <div id="page-article-source-container"><p>Source: <a href="<?php echo $single_post_page_source_article_link; ?>"><?php echo $single_post_page_source_article_title; ?></a></p></div>
            <?php endif; ?>
            <div id="page-article-social-media-container">
              <ul>
                <li><p><b>Share:</b></p></li>
                <li><a href="javascript:void(0);" id="facebook-share"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="javascript:void(0);" id="twitter-share" data-url="<?php echo 'https://twitter.com/share?url=' . get_the_permalink() . '&text=' . get_the_title(); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href="javascript:void(0);" id="linkedin-share" data-url="<?php echo 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . get_the_title(); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo 'mailto:?subject='.get_the_title().'&body='.get_the_permalink(); ?>" id="mail-share"><i class="fa fa-envelope-square" aria-hidden="true"></i></a></li>
                <li><a href="javascript:void(0);" id="weibo-share" data-url="<?php echo 'http://service.weibo.com/share/share.php?url=' . get_the_permalink() . '&title=' . get_the_title(); ?>"><i class="fa fa-weibo" aria-hidden="true"></i></a></li>
                </li>
              </ul>
            </div> <!-- page-article-social-media-container -->

            <?php
              $single_post_page_additional_info_header_text = get_post_meta($post->ID, 'single_post_page_additional_info_header_text', true);
              $single_post_page_additional_info_title = get_post_meta($post->ID, 'single_post_page_additional_info_title', true);
              $single_post_page_additional_info_text = get_post_meta($post->ID, 'single_post_page_additional_info_text', true);
            ?>
            
              <article id="page-article-contact-info-section">              
                <?php if(!empty($single_post_page_additional_info_header_text)): ?>
                <div id="contact-info-bg-container">
                  
                  <p><?php echo $single_post_page_additional_info_header_text; ?></p>
                  <h5><?php echo $single_post_page_additional_info_title; ?></h5>

                  <?php echo $single_post_page_additional_info_text; ?>

                </div>
                <?php endif; ?>
              </article> <!-- page-article-contact-info-section -->
            

          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3">
            
            <div id="page-article-sidebar-fixed-container">
              <div id="page-article-sidebar-container">

                <div id="sidebar-title" class="default-copy">
                  <h5>You may also like</h5>                                    
                </div> <!-- you may also like -->                              
                
                <div id="page-default-news-item-container" class="article-page-version">
                  <?php              
                  //Create WordPress Query with 'orderby' set to 'rand' (Random)
                  $row = 1;
                  $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '5' ) );
                  // output the random post
                  while ( $the_query->have_posts() ) : $the_query->the_post();
                    $posttags = get_the_tags();

                    if(isset($posttags) && !empty($posttags)) {
                      foreach ($posttags as $key => $posttag) {
                        $tag_names[] = $posttag->name;  
                      }
                    } else {
                      $tag_names = [];
                    }

                    if(in_array("Main News Index", $tag_names)):
                  ?>
                    
                    <?php if($row == 1): ?>
                      <div id="sidebar-title-image">                
                        <div class="manic-image-container">
                          <?php if(!empty(get_the_post_thumbnail_url())): ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                          <?php else: ?>
                            <?php 
                              $thumbnail_url = get_post_meta( $post->ID, 'single_post_page_post_video_poster', true );
                              if(empty($thumbnail_url)) {
                                $single_post_page_post_content_image_entries = get_post_meta($post->ID, 'single_post_page_post_content_image', true);
                                $thumbnail_url = (isset($single_post_page_post_content_image_entries) && !empty($single_post_page_post_content_image_entries)) ? $single_post_page_post_content_image_entries[0]['single_post_page_post_content_image'] : "";
                              }
                            ?>
                            <div class="manic-image-container">
                              <img src="" data-image-desktop="<?php echo $thumbnail_url; ?>" data-image-tablet="<?php echo $thumbnail_url; ?>" data-image-mobile="<?php echo $thumbnail_url; ?>" alt="">
                            </div>
                          <?php endif; ?>
                        </div>
                      </div> <!-- sidebar-title-image -->
                      <div class="page-default-news-item">
                        <div class="item-column">
                          <div class="item-title">
                            <div class="row">
                              <div class="col-xs-12">
                                <?php 
                                $post_categories = get_the_category();
                                // foreach ($post_categories as $key => $value) {
                                //   $post_category = $value;
                                // }
                                ?>
                                <h4><?php echo (isset($post_categories) && !empty($post_categories)) ? $post_categories[0]->name : ""; ?></h4>
                              </div>
                              <!-- <div class="col-xs-5">
                                <h4 class="item-date"><?php //echo get_the_date('d M Y'); ?></h4>
                              </div> -->
                            </div>
                            <h5><a href="<?php the_permalink(); ?>" class="hover-sync minimize-text" data-length="60" data-tablet-length="60" data-mobile-length="33"><?php the_title(); ?></a></h5>
                          </div>      
                        </div>                
                      </div> <!-- page-default-news-item -->
                    <?php else: ?>
                      <div class="page-default-news-item not">
                        <div class="item-column">
                          <div class="item-title">
                            <div class="row">
                              <div class="col-xs-12">
                                <?php 
                                $post_categories = get_the_category();
                                // foreach ($post_categories as $key => $value) {
                                //   $post_category = $value;
                                // }
                                ?>
                                <h4><?php echo (isset($post_categories) && !empty($post_categories)) ? $post_categories[0]->name : ""; ?></h4>
                              </div>
                              <!-- <div class="col-xs-5">
                                <h4 class="item-date"><?php //echo get_the_date('d M Y'); ?></h4>
                              </div> -->
                            </div>
                            <h5><a href="<?php the_permalink(); ?>" class="hover-sync minimize-text" data-length="60" data-tablet-length="60" data-mobile-length="33"><?php the_title(); ?></a></h5>
                          </div>      
                        </div>                
                      </div> <!-- page-default-news-item -->
                    <?php endif; ?>

                    

                  <?php
                      ++$row;
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
      </div>
    </article> <!-- page-article-section -->    
    

  </div> <!-- #page-wrapper-content -->
</div> <!-- #page-wrapper -->

<?php get_footer(); ?>