<?php
// brands Custom Post Type
function brands_post_type() {
	register_post_type( 'brands',
		array(
			'labels' => array(
				'name' => __( 'Brands', 'theme' ),
				'singular_name' => __( 'Brand', 'theme' ),
				'add_new' =>  __( 'Add New Brand', 'theme' ),
				'add_new_item' =>  __( 'Add New Brand', 'theme' ),
				'edit_item' =>  __( 'Edit Brand', 'theme' ),
				'new_item' =>  __( 'New Brand', 'theme' ),
				'all_items' =>  __( 'All Brands', 'theme' ),
				'view_item' =>  __( 'View Brand', 'theme' ),
				'search_items' =>  __( 'Search Brands', 'theme' ),
				'not_found' =>   __( 'No Brand found', 'theme' ),
				'not_found_in_trash' =>  __( 'No Brand found in Trash', 'theme' ), 
				'parent_item_colon' => '',
				'menu_name' =>  __( 'Brands', 'theme' )
			),
		'public' => true,
		'has_archive' => true,
		'hierarchical' => false,	
		'menu_position' => 20,
		'supports' => array( 'title' ), 
		'rewrite'  => array( 'slug' => 'brands', 'with_front' => true ),
		'menu_icon' => 'dashicons-groups',  // Icon Path
		)
	);
}
add_action( 'init', 'brands_post_type' );

add_action( 'cmb2_admin_init', 'register_brands_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function register_brands_meta_box() {  

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'ptype_brands_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => $prefix . 'settings',
    'title'         => __( 'Brands', 'cmb2' ),
    'object_types'  => array( 'brands', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true
  ) );

  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'logo',
    'type'        => 'group',
    // 'description' => esc_html__( '', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Logos {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Logo', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Logo', 'cmb2' ),
      'sortable'      => true, // beta
      // 'closed'     => true, // true to have the groups closed by default
    ),
  ) );  

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Brands Logo', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'logo',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Brands Name', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'name',
    'type'       => 'text',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Brands Link', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'link',
    'type'       => 'text_url',   
  ) );

  $cmb->add_field( array(
    'name' => __( 'Brands Copy', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'copy',
    'type' => 'wysiwyg',
  ) );

  // Add other metaboxes as needed

}
?>