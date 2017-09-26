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
    'footer-menu' => __('Footer Menu', 'transmedic')
  ));
}

add_action('init', 'register_my_menus');

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
?>