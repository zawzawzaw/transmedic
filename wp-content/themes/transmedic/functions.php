<?php 
/********************************************************************************************************/
/* CONSTANTS */
/********************************************************************************************************/

define("THEMEROOT", get_stylesheet_directory_uri());
define("IMG", THEMEROOT."/transmedic_assets/images");
define("IMG_CMS", THEMEROOT."/images_cms");
define("JS", THEMEROOT."/transmedic_assets/js");
define("CSS", THEMEROOT."/transmedic_assets/css");
define("LIBS", THEMEROOT."/transmedic_assets/libs");


/********************************************************************************************************/
/* MENUS */
/********************************************************************************************************/

function register_my_menus(){
  register_nav_menus(array(
    'main-menu' => __('Main Menu', 'transmedic'),
    'footer-menu' => __('Footer Menu', 'transmedic'),
    'mobile-menu' => __('Mobile Menu', 'transmedic')
  ));
}

add_action('init', 'register_my_menus');
  
// https://www.microdot.io/simpler-wp-nav-menu-markup/
class Microdot_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li><span>&nbsp;</span>';
    }
}

function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/********************************************************************************************************/
/* LOAD ASSETS */
/********************************************************************************************************/

function load_scripts(){
    wp_enqueue_style( 'stylecss', get_stylesheet_uri() );

    // wp_enqueue_script('$', THEMEROOT.'/js/vendors/jquery/jquery-1.11.1.min.js', array(), '', true);
    // wp_enqueue_script('jquery-ui', THEMEROOT.'/js/vendors/jquery/jquery-ui.min.js', array('$'), '', true);
    // wp_enqueue_script('carousel', THEMEROOT.'/js/vendors/bootstrap/bootstrap.min.js', array('$'), '', true);
    // wp_enqueue_script('imagesloaded', THEMEROOT.'/js/plugins/imagesloaded.pkgd.min.js', array('$'), '', true);
    // wp_enqueue_script('masonry', THEMEROOT.'/js/plugins/masonry.pkgd.min.js', array('$'), '', true);    
    // wp_enqueue_script('mainjs', THEMEROOT.'/js/main.js', array('$'), '', true);

    // if(is_home()) {
    //     wp_enqueue_script('homejs', THEMEROOT.'/js/home.js', array('$'), '', true);
    // } 
    // if(is_page('rooms')) {
    //     wp_enqueue_script('roomsjs', THEMEROOT.'/js/rooms.js', array('$'), '', true);
    // }
    // if(is_page('deluxe-room') || is_page('family-room') || is_page('standard-room')) {
    //     wp_enqueue_script('deluxeroomjs', THEMEROOT.'/js/deluxe-room.js', array('$'), '', true);
    // }
    // if(is_page('about')) {
    //     wp_enqueue_script('aboutjs', THEMEROOT.'/js/about.js', array('$'), '', true);
    // }
    // if(is_page('whats-nearby')) {        
    //     wp_enqueue_script('googlemap', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places', array(), '', true);
    //     wp_enqueue_script('infobox', THEMEROOT.'/js/plugins/infobox.js', array('$'), '', true);
    //     wp_enqueue_script('whatsnearby', THEMEROOT.'/js/whatsnearby.js', array('$'), '', true);
    // }
    // if(is_page('contact')) {        
    //     wp_enqueue_script('googlemap', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places', array(), '', true);
    //     wp_enqueue_script('infobox', THEMEROOT.'/js/plugins/infobox.js', array('$'), '', true);
    //     wp_enqueue_script('contact', THEMEROOT.'/js/contact.js', array('$'), '', true);
    // }
}
add_action('wp_enqueue_scripts', 'load_scripts');

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


/********************************************************************************************************/
/* ADD POST THUMBNAIL SUPPORT */
/********************************************************************************************************/

if(function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(940, 346);
}

/********************************************************************************************************/
/* ADD WIDGETS */
/********************************************************************************************************/

// function arphabet_widgets_init() {

//     register_sidebar( array(
//         'name' => 'Home right sidebar',
//         'id' => 'home_right_1',
//         'before_widget' => '<div>',
//         'after_widget' => '</div>',
//         'before_title' => '<h2 class="rounded">',
//         'after_title' => '</h2>',
//     ) );
// }
// add_action( 'widgets_init', 'arphabet_widgets_init' );


/********************************************************************************************************/
/* CUSTOM POST TYPE & META BOXES */
/********************************************************************************************************/

// require 'my-custom-posts.php';

// # home slider post #

// add_post_type('home slider', array(
//     'supports' => array('title','editor','aside','thumbnail')
// ));

// # room slider post #

// add_post_type('room slider', array(
//     'supports' => array('title','editor','aside','thumbnail')
// ));

// # room type slider post #

// add_post_type('each room slider', array(
//     'supports' => array('title','editor','aside','thumbnail')
// ));

// add_taxonomy('type', 'eachroomslider', array(
//     'labels' => array('add_new_item' => 'Add New Page','name'=>'Room Type')
// ));

// # feature post #

// add_post_type('feature', array(
//     'supports' => array('title','editor','aside')
// ));

// add_taxonomy('feature_room_type', 'feature', array(
//     'labels' => array('add_new_item' => 'Add New Page','name'=>'Room Type')
// ));

// /********************************************************************************************************/
// /* WORDPRESS EDITOR CUSTOM FIELDS */
// /********************************************************************************************************/

function Custom_get_featured_image($post_ID) {  
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);  
    if ($post_thumbnail_id) {  
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');  
        return $post_thumbnail_img[0];  
    }  
}  

function Custom_get_meta_post($post_ID) {  
    $custom_fields = get_post_meta($post_ID);

    if(!empty($custom_fields)) {
        return $custom_fields;
    }
}

function Custom_get_meta_post_terms($post_ID, $type) {  
    $custom_posts_terms = wp_get_post_terms($post_ID, $type);

    if(!empty($custom_posts_terms)) {
        return $custom_posts_terms;
    }
}

// function Slider_colums_head($defaults) {
//     $new_columns['title'] = _x('Slider Name', 'column name');
//     $new_columns['featured_image'] = 'Featured Image';  
//     $new_columns['place'] = 'Place';  
//     $new_columns['date'] = _x('Date', 'column name');

//     return $new_columns;  
// }

// function Slider_columns_content($column_name, $post_ID) {  
//     if ($column_name == 'featured_image') {  
//         $post_featured_image = Custom_get_featured_image($post_ID);  
//         if ($post_featured_image) {  
//             // HAS A FEATURED IMAGE  
//             echo '<img src="' . $post_featured_image . '" height="37" width="100" >';  
//         }  
//         else {  
//             // NO FEATURED IMAGE, SHOW THE DEFAULT ONE  
//             echo '<img src="' . get_bloginfo( 'template_url' ) . '/images/default.jpg" />';  
//         }  
//     }

//     $all_terms = array('place');

//     foreach ($all_terms as $key => $term) {
//         if($column_name==$term) {
//             $custom_post_meta = Custom_get_meta_post_terms($post_ID,$term); 

//             if ($custom_post_meta) {  
//                 foreach ($custom_post_meta as $key => $meta) {
//                     echo $meta->name . '<br>';
//                 }
//             }  
//             else {  
//                 echo '';  
//             }
//         }
//     }
// }

// add_filter('manage_slider_posts_columns', 'Slider_colums_head');  
// add_action('manage_slider_posts_custom_column', 'Slider_columns_content', 10, 2);

// register new taxonomy #
function add_taxonomy($name, $post_type, $args = array()){
  $name = strtolower(str_replace(' ', '_', $name));

  add_action('init', function() use($name, $post_type, $args) {# name of taxonomy, associated post type, options
    $args = array_merge(array(
      'label' => ucwords($name)
    ), $args);

    register_taxonomy($name, $post_type, $args);
  });
}

// Include MetaBoxes plugin
include (TEMPLATEPATH . "/lib/meta-box/meta-box.php");

include (TEMPLATEPATH . "/lib/cmb2-metabox-page-default.php");
include (TEMPLATEPATH . "/lib/cmb2-metabox-page-home.php");
include (TEMPLATEPATH . "/lib/cmb2-metabox-page-about.php");
include (TEMPLATEPATH . "/lib/cmb2-metabox-page-careers.php");
include (TEMPLATEPATH . "/lib/cmb2-metabox-page-products.php");
include (TEMPLATEPATH . "/lib/cmb2-metabox-page-contact.php");
include (TEMPLATEPATH . "/lib/cmb2-metabox-page-single.php");
include (TEMPLATEPATH . "/lib/cmb2-metabox-page-careers-details.php");
// include (TEMPLATEPATH . "/example-functions.php");

// // Include new post types and metabox for home and other pages
include (TEMPLATEPATH . "/lib/ptype-brands.php");
include (TEMPLATEPATH . "/lib/ptype-locations.php");
include (TEMPLATEPATH . "/lib/ptype-jobs.php");

// // Include Shortcodes
include (TEMPLATEPATH . "/lib/shortcodes.php");

/********************************************************************************************************/
/* WORDPRESS EDITOR FIX */
/********************************************************************************************************/

function change_mce_options( $init ) {  
     //code that adds additional attributes to the pre tag  
     $ext = 'article[id|name|class|style|x|y|cx|cy|nav]';  
      
     //if extended_valid_elements alreay exists, add to it  
     //otherwise, set the extended_valid_elements to $ext  
     if ( isset( $init['extended_valid_elements'] ) ) {  
      $init['extended_valid_elements'] .= ',' . $ext;  
     } else {  
      $init['extended_valid_elements'] = $ext;  
     }  
      
     //important: return $init!  
     return $init;  
} 

function change_mce_options_2( $init ) {  
     //code that adds additional attributes to the pre tag  
     $ext = 'div[id|name|class|style|x|y|cx|cy|nav]';  
      
     //if extended_valid_elements alreay exists, add to it  
     //otherwise, set the extended_valid_elements to $ext  
     if ( isset( $init['extended_valid_elements'] ) ) {  
      $init['extended_valid_elements'] .= ',' . $ext;  
     } else {  
      $init['extended_valid_elements'] = $ext;  
     }  
      
     //important: return $init!  
     return $init;  
} 

add_filter('tiny_mce_before_init', 'change_mce_options');  
add_filter('tiny_mce_before_init', 'change_mce_options_2'); 

// add excerpt support
add_action('init', 'my_custom_init');
function my_custom_init() {
    add_post_type_support( 'page', 'excerpt' );
}

// hide admin bar from front end
function hide_admin_bar_from_front_end(){
  if (is_blog_admin()) {
    return true;
  }
  return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );

function ptag_tinymce_config( $init ) {
   // Don't remove line breaks
   $init['remove_linebreaks'] = false; 
   // Convert newline characters to BR tags
   $init['convert_newlines_to_brs'] = true; 
   // Do not remove redundant BR tags
   $init['remove_redundant_brs'] = false;

   // Pass $init back to WordPress
   return $init;
}
add_filter('tiny_mce_before_init', 'ptag_tinymce_config');

// function my_wpcf7_form_elements($html) {
//   function ov3rfly_replace_include_blank($name, $text, &$html) {
//     $matches = false;
//     preg_match('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $html, $matches);
//     if ($matches) {
//       $select = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $matches[0]);
//       $html = preg_replace('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $select, $html);
//     }
//   }
//   ov3rfly_replace_include_blank('title', '* SALUTATION', $html);
//   ov3rfly_replace_include_blank('country', '* CHOOSE YOUR COUNTRY', $html);
//   return $html;
// }
// add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');

// remove post from admin sidebar menu

function remove_from_menu()      //creating functions remove_from_menu for removing menu item
{ 
   // remove_menu_page('edit.php');
   remove_menu_page( 'edit-comments.php' );
}

add_action('admin_menu', 'remove_from_menu');

// allow svg upload via media upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function my_tinymce_config( $init ) {
   // Don't remove line breaks
   $init['remove_linebreaks'] = false; 
   // Convert newline characters to BR tags
   $init['convert_newlines_to_brs'] = true; 
   // Do not remove redundant BR tags
   $init['remove_redundant_brs'] = false;

   // Pass $init back to WordPress
   return $init;
}
add_filter('tiny_mce_before_init', 'my_tinymce_config');


//     ___    ____  ____  _____   ________   ____  ___   ____________   ___  ________________  ________  __  ___________________
//    /   |  / __ \/ __ \/  _/ | / / ____/  / __ \/   | / ____/ ____/  /   |/_  __/_  __/ __ \/  _/ __ )/ / / /_  __/ ____/ ___/
//   / /| | / / / / / / // //  |/ / / __   / /_/ / /| |/ / __/ __/    / /| | / /   / / / /_/ // // __  / / / / / / / __/  \__ \
//  / ___ |/ /_/ / /_/ // // /|  / /_/ /  / ____/ ___ / /_/ / /___   / ___ |/ /   / / / _, _// // /_/ / /_/ / / / / /___ ___/ /
// /_/  |_/_____/_____/___/_/ |_/\____/  /_/   /_/  |_\____/_____/  /_/  |_/_/   /_/ /_/ |_/___/_____/\____/ /_/ /_____//____/


add_action( 'admin_init', 'posts_order_wpse_91866' );

function posts_order_wpse_91866() 
{
    add_post_type_support( 'post', 'page-attributes' );
}

//     ___    ____  ____     __________  __    __  ____  ____   __   _____   __   ___    __    __       ____  ____  ________________
//    /   |  / __ \/ __ \   / ____/ __ \/ /   / / / /  |/  / | / /  /  _/ | / /  /   |  / /   / /      / __ \/ __ \/ ___/_  __/ ___/
//   / /| | / / / / / / /  / /   / / / / /   / / / / /|_/ /  |/ /   / //  |/ /  / /| | / /   / /      / /_/ / / / /\__ \ / /  \__ \
//  / ___ |/ /_/ / /_/ /  / /___/ /_/ / /___/ /_/ / /  / / /|  /  _/ // /|  /  / ___ |/ /___/ /___   / ____/ /_/ /___/ // /  ___/ /
// /_/  |_/_____/_____/   \____/\____/_____/\____/_/  /_/_/ |_/  /___/_/ |_/  /_/  |_/_____/_____/  /_/    \____//____//_/  /____/

// ADD NEW COLUMN
function post_order_columns_head($defaults) {
    $defaults['post_order'] = 'Post Order';
    unset($defaults['comments']);
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function post_order_columns_content($column_name, $post_ID) {
    if ($column_name == 'post_order') {
        echo get_post_field('menu_order', $post_ID);
    }
}

add_filter('manage_posts_columns', 'post_order_columns_head');
add_action('manage_posts_custom_column', 'post_order_columns_content', 10, 2);

//     __  __________  ______   __________  ______________  ____
//    / / / /  _/ __ \/ ____/  / ____/ __ \/  _/_  __/ __ \/ __ \
//   / /_/ // // / / / __/    / __/ / / / // /  / / / / / / /_/ /
//  / __  // // /_/ / /___   / /___/ /_/ // /  / / / /_/ / _, _/
// /_/ /_/___/_____/_____/  /_____/_____/___/ /_/  \____/_/ |_|

function reset_editor()
{
     global $_wp_post_type_features;

     $post_type="page";
     $feature = "editor";
     if ( !isset($_wp_post_type_features[$post_type]) )
     {

     }
     elseif ( isset($_wp_post_type_features[$post_type][$feature]) )
     unset($_wp_post_type_features[$post_type][$feature]);

     // $post_type="post";
     // $feature = "editor";
     // if ( !isset($_wp_post_type_features[$post_type]) )
     // {

     // }
     // elseif ( isset($_wp_post_type_features[$post_type][$feature]) )
     // unset($_wp_post_type_features[$post_type][$feature]);
}

add_action("init","reset_editor");

//    ________  _____    _   ______________   _________   ___________    _   _____    __  _________
//   / ____/ / / /   |  / | / / ____/ ____/  /_  __/   | / ____/ ___/   / | / /   |  /  |/  / ____/
//  / /   / /_/ / /| | /  |/ / / __/ __/      / / / /| |/ / __ \__ \   /  |/ / /| | / /|_/ / __/
// / /___/ __  / ___ |/ /|  / /_/ / /___     / / / ___ / /_/ /___/ /  / /|  / ___ |/ /  / / /___
// \____/_/ /_/_/  |_/_/ |_/\____/_____/    /_/ /_/  |_\____//____/  /_/ |_/_/  |_/_/  /_/_____/

add_action( 'init', 'wp_post_tags');
function wp_post_tags()
{
    global $wp_taxonomies;

    // The list of labels we can modify comes from
    //  http://codex.wordpress.org/Function_Reference/register_taxonomy
    //  http://core.trac.wordpress.org/browser/branches/3.0/wp-includes/taxonomy.php#L350
    $wp_taxonomies['post_tag']->labels = (object)array(
        'name' => 'Location Tags',
        'menu_name' => 'Location Tags',
        'singular_name' => 'Location Tag',
        'search_items' => 'Search Location Tags',
        'popular_items' => 'Popular Location Tags',
        'all_items' => 'All Location Tags',
        'parent_item' => null, // Tags aren't hierarchical
        'parent_item_colon' => null,
        'edit_item' => 'Edit Location Tag',
        'update_item' => 'Update Location Tag',
        'add_new_item' => 'Add new Location Tag',
        'new_item_name' => 'New Location Tag Name',
        'separate_items_with_commas' => 'Separata location tags with commas',
        'add_or_remove_items' => 'Add or remove location tags',
        'choose_from_most_used' => 'Choose from the most used location tags',
    );

    $wp_taxonomies['post_tag']->label = 'Location Tags';
}

//     ___    __    __    ____ _       __   _____ ____  ___    _   __   _________   ___________
//    /   |  / /   / /   / __ \ |     / /  / ___// __ \/   |  / | / /  /_  __/   | / ____/ ___/
//   / /| | / /   / /   / / / / | /| / /   \__ \/ /_/ / /| | /  |/ /    / / / /| |/ / __ \__ \
//  / ___ |/ /___/ /___/ /_/ /| |/ |/ /   ___/ / ____/ ___ |/ /|  /    / / / ___ / /_/ /___/ /
// /_/  |_/_____/_____/\____/ |__/|__/   /____/_/   /_/  |_/_/ |_/    /_/ /_/  |_\____//____/

function override_mce_options($initArray) 
{
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
 }
 add_filter('tiny_mce_before_init', 'override_mce_options'); 

//    ________  _________________  __  ___   ________________
//   / ____/ / / / ___/_  __/ __ \/  |/  /  / ____/ ___/ ___/
//  / /   / / / /\__ \ / / / / / / /|_/ /  / /    \__ \\__ \
// / /___/ /_/ /___/ // / / /_/ / /  / /  / /___ ___/ /__/ /
// \____/\____//____//_/  \____/_/  /_/   \____//____/____/


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #home_page_what_we_do_repeat .cmb-add-group-row {
      display: none;
    }

    #home_page_what_we_do_repeat .cmb-remove-group-row-button {
      display: none;
    }
    #home_page_what_we_do_repeat .cmb-remove-group-row {
      display: none;
    }

    #home_page_map_sec_item_repeat .cmb-add-group-row {
      display: none;
    }

    #home_page_map_sec_item_repeat .cmb-remove-group-row {
      display: none;
    }

    #home_page_map_sec_item_repeat .cmb-remove-group-row-button {
      display: none;
    }
  </style>';
}


//     __  __________________       _________   ___________
//    /  |/  / ____/_  __/   |     /_  __/   | / ____/ ___/
//   / /|_/ / __/   / / / /| |      / / / /| |/ / __ \__ \
//  / /  / / /___  / / / ___ |     / / / ___ / /_/ /___/ /
// /_/  /_/_____/ /_/ /_/  |_|    /_/ /_/  |_\____//____/

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');
 
//Lets add Open Graph Meta Info
 
function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;

    echo '<meta property="fb:app_id" content="121760891830821"/>';
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="Transmedic"/>';
    echo '<meta property="og:description" content="Transmedic"/>';

    if(!has_post_thumbnail( $post->ID )) {
        $default_image=THEMEROOT."/images_cms/home/home-banner-machine-mobile.jpg";
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );


//    ________  _________________  __  ___       _______ ____  _   __   _______   ______  ____  ____  _____   ________
//   / ____/ / / / ___/_  __/ __ \/  |/  /      / / ___// __ \/ | / /  / ____/ | / / __ \/ __ \/ __ \/  _/ | / /_  __/
//  / /   / / / /\__ \ / / / / / / /|_/ /  __  / /\__ \/ / / /  |/ /  / __/ /  |/ / / / / /_/ / / / // //  |/ / / /
// / /___/ /_/ /___/ // / / /_/ / /  / /  / /_/ /___/ / /_/ / /|  /  / /___/ /|  / /_/ / ____/ /_/ // // /|  / / /
// \____/\____//____//_/  \____/_/  /_/   \____//____/\____/_/ |_/  /_____/_/ |_/_____/_/    \____/___/_/ |_/ /_/


// This is here to make sure WordPress recognizes our
// new endpoint. You can remove it or comment it out once
// your endpoint is recognized.
flush_rewrite_rules();

function post_json_endpoint() {
    add_rewrite_endpoint('post-json', EP_ROOT);
}
add_action( 'init', 'post_json_endpoint' );

function include_print_template( $template ) {
    get_query_var('post-json');
    if (false === get_query_var('post-json', false)) {
        return $template;
    }

    // Don't worry about this yet, we'll write this function in step #3
    $posts = microdot_get_random_posts_json_array();

    wp_send_json( $posts );
}
add_filter('template_include', 'include_print_template');

function microdot_get_random_posts_json_array() {


    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => -1, // all
      // 'orderby' => 'date',
      // 'order' => 'DESC'
    );
     
    $query = new WP_Query( $args );
     
    $posts = array();
    $news = array();
     
    while( $query->have_posts() ) : $query->the_post();

      $posttags = get_the_tags();

      if(isset($posttags) && !empty($posttags)) {
        foreach ($posttags as $key => $posttag) {
          $tag_names[] = $posttag->name;  
        }
      } else {
        $tag_names = [];
      }

      if(in_array("Main News Index", $tag_names) || in_array("news", $tag_names)):

        $post_categories = get_the_category();
        $post_categories_name_arr = explode(' ',trim($post_categories[0]->name));  

        $posts[] = array(
          'tag' => mb_strtolower($post_categories_name_arr[0]),
          'category' => html_entity_decode($post_categories[0]->name),
          'date' => get_the_date('d M Y'),
          'title' => html_entity_decode(get_the_title()),
          'link' => get_permalink()
        );

      endif;  
     
    endwhile;
     
    wp_reset_query();

    $news['news'] = $posts;
     
    return $news;

}
?>