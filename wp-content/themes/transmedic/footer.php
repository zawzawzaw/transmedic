  <!--
     _____ ___   ___ _____ _____ ____
    |  ___/ _ \ / _ \_   _| ____|  _ \
    | |_ | | | | | | || | |  _| | |_) |
    |  _|| |_| | |_| || | | |___|  _ <
    |_|   \___/ \___/ |_| |_____|_| \_\

  -->

  <footer id="footer-desktop">
    <div class="container-fluid has-breakpoint">
      
      <div class="row">
        <div class="col-md-6">

          <div id="footer-copyright">
            <p>2017 © Copyright Transmedic Pte Ltd</p>
          </div>
          
        </div>
        <div class="col-md-6">

          <div id="footer-legal">
            <ul>
              <li><a href="javascript:void(0);">Staff Login</a></li>
              <!-- <li><a href="javascript:void(0);">Terms of Use</a></li>
              <li><a href="javascript:void(0);">Privacy Policy</a></li> -->
            </ul>
          </div> <!-- footer-legal -->

        </div>
      </div> <!-- row -->

    </div>
  </footer> <!-- footer-desktop -->

  <?php $template_name = basename(get_page_template()); ?>
  
  <?php if ( is_front_page() ): ?>
    <?php include "includes/script_home.php"; ?>
  <?php elseif ( $template_name == 'page-about.php' ): ?>
    <?php include "includes/script_about.php"; ?>
  <?php elseif ( $template_name == 'page-careers.php' ): ?>
    <?php include "includes/script_career.php"; ?>
  <?php elseif ( $template_name == 'page-products.php' ): ?>
    <?php include "includes/script_product.php"; ?>
  <?php elseif ( $template_name == 'page-contact.php' ): ?>
    <?php include "includes/script_contact.php"; ?>
  <?php elseif ( $template_name == 'page-news.php' ): ?>
    <?php include "includes/script_new.php"; ?>
  <?php elseif ( is_singular() ): ?>
    <?php include "includes/script_article.php"; ?>
  <?php else: ?>
    <?php include "includes/script.php" ?>
  <?php endif; ?>

  <?php wp_footer(); ?>

</body>
</html>
