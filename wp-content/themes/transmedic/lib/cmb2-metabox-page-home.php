<?php
add_action( 'cmb2_admin_init', 'home_page_register_what_we_do_meta_box' );
add_action( 'cmb2_admin_init', 'home_page_register_latest_news_meta_box' );
add_action( 'cmb2_admin_init', 'home_page_register_brands_meta_box' );
add_action( 'cmb2_admin_init', 'home_page_register_map_meta_box' );
add_action( 'cmb2_admin_init', 'home_page_register_news_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function home_page_register_what_we_do_meta_box() { 

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'home_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'what_we_do_settings',
    'title'         => __( 'What We Do Section', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 2 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'wwd_sec_title',
    'type' => 'text',
  ) );

  // $group_field_id is the field id string, so in this case: $prefix . 'demo'
  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'what_we_do',
    'type'        => 'group',
    // 'description' => esc_html__( 'What we do', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
      'sortable'      => true, // beta
      'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 355 x 355 (35 kb)', 'cmb2' ),
    'id'         => $prefix . 'wwd_sec_image',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image Tablet', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 1152 x 707 (35 kb)', 'cmb2' ),
    'id'         => $prefix . 'wwd_sec_image_tablet',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image Mobile', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 640 x 390 (35 kb)', 'cmb2' ),
    'id'         => $prefix . 'wwd_sec_image_mobile',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Image Title', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'wwd_sec_image_title',
    'type' => 'text'    
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Image Text', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'wwd_sec_image_text',
    'type' => 'textarea',
  ) );

  // Add other metaboxes as needed

}

/**
 * Define the metabox and field configurations.
 */
function home_page_register_latest_news_meta_box() {  

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'home_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'latest_settings',
    'title'         => __( 'Latest Technologies Section', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 2 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'lt_sec_title',
    'type' => 'text',
  ) );

  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'lt_sec_entries',
    'type'        => 'group',
    // 'description' => esc_html__( 'What we do', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
      'sortable'      => true, // beta
      'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 1154 × 451 (35 kb)', 'cmb2' ),
    'id'         => $prefix . 'lt_sec_image',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image Tablet', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 1152 x 707 (35 kb)', 'cmb2' ),
    'id'         => $prefix . 'lt_sec_image_tablet',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image Mobile', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 640 x 390 (35 kb)', 'cmb2' ),
    'id'         => $prefix . 'lt_sec_image_mobile',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Title', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'lt_sec_title',
    'type'       => 'text',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Text', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'lt_sec_text',
    'type'       => 'textarea',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Link', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'lt_sec_link',
    'type'       => 'text',   
  ) );

}


function home_page_register_brands_meta_box() {

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'home_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'brands_settings',
    'title'         => __( 'Brands Section', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 2 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Title Mobile', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'b_sec_title_mobile',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Title Desktop', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'b_sec_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Sub Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'b_sec_sub_title',
    'type' => 'text',
  ) );
}

function home_page_register_map_meta_box() {

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'home_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'map_settings',
    'title'         => __( 'Map Section', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 2 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Map Background Image', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'map_sec_background_image',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Map Image', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'map_sec_image',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Map Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'map_sec_title',
    'type' => 'text',
  ) );

  // $group_field_id is the field id string, so in this case: $prefix . 'demo'
  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'map_sec_item',
    'type'        => 'group',
    // 'description' => esc_html__( 'What we do', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Item {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Item', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Item', 'cmb2' ),
      'sortable'      => true, // beta
      'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Map Item Title', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'map_sec_item_title',
    'type'       => 'wysiwyg',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Map Item Number', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'map_sec_item_number',
    'type'       => 'text',   
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Map CTA Text', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'map_sec_cta_text',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Map CTA Link', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'map_sec_cta_link',
    'type' => 'text',
  ) );
}

function home_page_register_news_meta_box() {
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'home_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'news_settings',
    'title'         => __( 'News Section', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 2 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'News Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'news_sec_title',
    'type' => 'text',
  ) );

}
?>