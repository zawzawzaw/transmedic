<?php get_header(); ?>

<div id="page-wrapper">
    <div id="page-wrapper-content">

      <div id="page-home-nav-trigger"></div>

      <div class="header-desktop-spacer"></div>
      <div class="header-mobile-spacer"></div>
      
      
      <?php
      $post_tag = 'news-slider';
      $section_query = new WP_Query( array( 'post_type' => 'post', 'tag' => $post_tag ) );
      ?>
            
      <article id="page-news-featured-section">
        <div class="container-fluid has-breakpoint">

          <div class="row">
            <div class="col-md-12">

              <div id="page-news-featured-section-content" class="transmedic-slick-slider">

                <?php while ($section_query->have_posts()) : $section_query->the_post(); ?>
                <?php 
                $post_categories = get_the_category();
                // foreach ($post_categories as $key => $value) {
                //   $post_category = $value;
                // }
                ?>                      

                <div class="page-news-featured-item row">
                  <div class="col-md-5">

                    <div class="carousel-caption-container">
                      <div class="default-copy">
                        <h4><?php echo (isset($post_categories) && !empty($post_categories)) ? $post_categories[0]->name : ""; ?></h4>
                        <h2><a href="<?php the_permalink(); ?>" class="hover-sync"><?php the_title(); ?></a></h2>
                        <p class="minimize-text" data-length="160" data-tablet-length="125" data-mobile-length="133"><?php echo get_the_excerpt(); ?></p>

                        <div class="cta-container">
                          <a href="<?php the_permalink(); ?>" class="read-more-cta hover-sync">Read More</a>
                        </div>
                      </div>
                    </div> <!-- carousel-caption-container -->

                  </div>
                  <div class="col-md-7">
                    
                    <div id="page-news-featured-carousel-container">
                      <div id="page-news-featured-carousel" class="transmedic-slick-slider">
                        
                          <div class="page-news-featured-carousel-item">
                            <div class="manic-image-container">
                              <img src="" 
                                data-image-desktop="<?php the_post_thumbnail_url(); ?>"
                                data-image-tablet="<?php the_post_thumbnail_url(); ?>"
                                data-image-mobile="<?php the_post_thumbnail_url(); ?>" alt="">
                            </div>
                            <span class="default-image-desc"><?php the_post_thumbnail_caption(); ?></span>
                          </div>    

                      </div> <!-- page-new-featured-carousel -->
                    </div> <!-- page-news-featured-carousel-container -->  

                  </div>
                </div> <!-- row -->      

                <?php endwhile; 
                wp_reset_query(); ?>         

              </div> <!-- page-news-featured-section-content -->

            </div> 
          </div> <!-- row -->

        </div>
      </article> <!-- page-news-featured-section -->            

      <article id="page-news-filter-section">
        <div class="container-fluid has-breakpoint">
            <div class="row">
              <div class="col-md-12">
                <ul id="page-news-filter-list" class="hidden-xs hidden-sm">
                  <li><a href="#all" class="active-cat"><h3>All Categories</h3></a></li>
                <?php 
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC'
                ) );
                 
                foreach( $categories as $category ) :
                ?>               
                  <?php if($category->name!="Monitoring Device" && $category->name!="Robot assisted surgery" && $category->name!="Solution for epilepsy"): ?>
                    <?php $arr = explode(' ',trim($category->name)); ?>
                    <li><a href="#<?php echo strtolower($arr[0]); ?>"><h3><?php echo $category->name; ?></h3></a></li>
                  <?php endif; ?>
                <?php
                endforeach;
                ?>
                </ul>
              </div>
            </div> <!-- row -->

            <div id="page-news-filter-list-mobile" class="visible-xs visible-sm">                  
              <div class="manic-dropdown">
                <select name="news_filter" id="news_filter">
                  <option value="all">All Categories</option>  
                  <?php foreach( $categories as $category ) : ?>
                    <?php if($category->name!="Monitoring Device" && $category->name!="Robot assisted surgery" && $category->name!="Solution for epilepsy"): ?>
                    <?php $arr = explode(' ',trim($category->name)); ?>
                    <option value="<?php echo strtolower($arr[0]); ?>"><?php echo html_entity_decode($category->name); ?></option>  
                    <?php endif; ?>                    
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div id="page-default-news-item-container" class="news-page-version">

              <!-- JS CONTENT -->

            </div> <!-- page-news-filtered-news-item-container -->

            <div id="page-news-load-more-cta-container">
              <a href="#" class="square-cta">Load More</a>
            </div>

        </div>
      </article> <!-- page-news-filtered-news-section -->
      

    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

  <?php get_footer(); ?>

  <script id="news-template" type="text/x-handlebars-template">
    <div class="col-md-4">
      <div class="item-column" data-news-type="all,{{ tag }}">

        <div class="page-default-news-item">
          <div class="item-title">
            <div class="row">
              <div class="col-xs-8">
                <h4>{{ category }}</h4>
              </div>
              <div class="col-xs-4">
                <h4 class="item-date">{{ date }}</h4>
              </div>
            </div>
            <h5><a href="{{ link }}" class="hover-sync minimize-text" data-length="60" data-tablet-length="25" data-mobile-length="33">{{ title }}</a></h5>
          </div>                      
        </div> <!-- page-default-news-item -->

      </div> <!-- item-column -->
    </div> <!-- col-md-4 -->
  </script>