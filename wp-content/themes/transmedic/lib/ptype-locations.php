<?php
// locations Custom Post Type
function locations_post_type() {
  register_post_type( 'locations',
    array(
      'labels' => array(
        'name' => __( 'Offices', 'theme' ),
        'singular_name' => __( 'Office', 'theme' ),
        'add_new' =>  __( 'Add New Office', 'theme' ),
        'add_new_item' =>  __( 'Add New Office', 'theme' ),
        'edit_item' =>  __( 'Edit Office', 'theme' ),
        'new_item' =>  __( 'New Office', 'theme' ),
        'all_items' =>  __( 'All Offices', 'theme' ),
        'view_item' =>  __( 'View Office', 'theme' ),
        'search_items' =>  __( 'Search Offices', 'theme' ),
        'not_found' =>   __( 'No Office found', 'theme' ),
        'not_found_in_trash' =>  __( 'No Office found in Trash', 'theme' ), 
        'parent_item_colon' => '',
        'menu_name' =>  __( 'Offices', 'theme' )
      ),
    'public' => true,
    'has_archive' => true,
    'hierarchical' => false,  
    'menu_position' => 20,
    'supports' => array( 'title' ), 
    'rewrite'  => array( 'slug' => 'offices', 'with_front' => true ),
    'menu_icon' => 'dashicons-groups',  // Icon Path
    )
  );
}
add_action( 'init', 'locations_post_type' );

add_action( 'cmb2_admin_init', 'register_locations_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function register_locations_meta_box() {  

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'ptype_locations_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => $prefix . 'settings',
    'title'         => __( 'Offices', 'cmb2' ),
    'object_types'  => array( 'locations', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true
  ) );

  $cmb->add_field( array(
    'name' => __( 'Address', 'cmb2' ),
    'desc' => __( 'Address', 'cmb2' ),
    'id'   => $prefix . 'address',
    'type' => 'wysiwyg',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Email & Contact No', 'cmb2' ),
    'desc' => __( 'Email and contact no', 'cmb2' ),
    'id'   => $prefix . 'email_phone',
    'type' => 'wysiwyg',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Map Link Copy', 'cmb2' ),
    'desc' => __( 'Link to map copy', 'cmb2' ),
    'id'   => $prefix . 'map_link_copy',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Map Link', 'cmb2' ),
    'desc' => __( 'Link to google map', 'cmb2' ),
    'id'   => $prefix . 'map_link',
    'type' => 'text_url',
  ) );

  // Add other metaboxes as needed

}