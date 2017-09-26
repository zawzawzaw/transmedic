<?php
// jobs Custom Post Type
function jobs_post_type() {
  register_post_type( 'jobs',
    array(
      'labels' => array(
        'name' => __( 'Jobs', 'theme' ),
        'singular_name' => __( 'Job', 'theme' ),
        'add_new' =>  __( 'Add New Job', 'theme' ),
        'add_new_item' =>  __( 'Add New Job', 'theme' ),
        'edit_item' =>  __( 'Edit Job', 'theme' ),
        'new_item' =>  __( 'New Job', 'theme' ),
        'all_items' =>  __( 'All Jobs', 'theme' ),
        'view_item' =>  __( 'View Job', 'theme' ),
        'search_items' =>  __( 'Search Jobs', 'theme' ),
        'not_found' =>   __( 'No Job found', 'theme' ),
        'not_found_in_trash' =>  __( 'No Job found in Trash', 'theme' ), 
        'parent_item_colon' => '',
        'menu_name' =>  __( 'Jobs', 'theme' )
      ),
    'public' => true,
    'has_archive' => true,
    'hierarchical' => false,  
    'menu_position' => 20,
    'supports' => array( 'title' ), 
    'rewrite'  => array( 'slug' => 'jobs', 'with_front' => true ),
    'menu_icon' => 'dashicons-groups',  // Icon Path
    )
  );
}
add_action( 'init', 'jobs_post_type' );

add_taxonomy('country', 'jobs');

add_action( 'cmb2_admin_init', 'register_jobs_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function register_jobs_meta_box() {  

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'ptype_jobs_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => $prefix . 'settings',
    'title'         => __( 'Jobs', 'cmb2' ),
    'object_types'  => array( 'jobs', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true
  ) );

  $cmb->add_field( array(
    'name' => __( 'Jobs Responsibilities', 'cmb2' ),
    'desc' => __( 'Jobs responsibilities', 'cmb2' ),
    'id'   => $prefix . 'responsibilities',
    'type' => 'wysiwyg',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Jobs Requirements', 'cmb2' ),
    'desc' => __( 'Jobs requirements', 'cmb2' ),
    'id'   => $prefix . 'requirements',
    'type' => 'wysiwyg',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Apply To Text', 'cmb2' ),
    'desc' => __( 'apply to text', 'cmb2' ),
    'id'   => $prefix . 'apply_to_text',
    'type' => 'wysiwyg',
  ) );

}