<?php get_header(); ?>

  <div id="page-wrapper">
    <div id="page-wrapper-content">

      <div id="page-home-nav-trigger"></div>


      <div class="header-desktop-spacer"></div>
      <div class="header-mobile-spacer"></div>

      <article id="page-plain-content-section">
        <div class="container-fluid has-breakpoint">
          <div class="row">
            <div class="col-md-12">

              <div id="page-plain-content-title">

                <?php 
                  $target_search_results = '';
                  if (isset($_GET["s"])) {
                    $target_search_results = htmlspecialchars($_GET["s"]);
                  } else {
                    $target_search_results = '';
                  }
                ?>
                
                <h1>Search results for “<?php echo $target_search_results; ?>”</h1>

              </div>
              <div id="page-plain-content">

                <div id="page-plain-content-item-container">
                  
                  <?php if ( have_posts() ): ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                      <div class="page-plain-content-item">
                        <h5><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>                      
                        <div class="cta-container">
                          <a href="<?php the_permalink(); ?>" class="plain-cta"><?php the_permalink(); ?></a>
                        </div>
                        <div class="default-copy">
                          <p><?php the_excerpt('...'); ?></p>
                        </div>
                      </div>
                    <?php endwhile; ?>
                  <?php else: ?>
                    <div class="default-copy">
                      <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                    </div>
                  <?php endif; ?>    

                </div> <!-- page-plain-content-item-container -->
              </div>


            </div>
          </div>
        </div>
      </article>



    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

<?php get_footer(); ?>