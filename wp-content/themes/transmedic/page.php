  <?php get_header(); ?>

  <div id="page-wrapper">
    <div id="page-wrapper-content">

      <div id="page-home-nav-trigger"></div>

      <div class="header-desktop-spacer"></div>
      <div class="header-mobile-spacer hidden-lg"></div>

      <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>

    </div> <!-- #page-wrapper-content -->
  </div> <!-- #page-wrapper -->

  <?php get_footer(); ?>