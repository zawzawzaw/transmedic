<?php
add_action( 'cmb2_admin_init', 'careers_page_register_content_meta_box' );
add_action( 'cmb2_admin_init', 'careers_page_register_extra_content_meta_box' );
add_action( 'cmb2_admin_init', 'careers_page_register_jobs_content_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function careers_page_register_content_meta_box() {  

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'careers_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'careers_content_settings',
    'title'         => __( 'Careers Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 82 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  // $group_field_id is the field id string, so in this case: $prefix . 'demo'
  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'content',
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
    'name' => __( 'Section Title', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'sec_title',
    'type' => 'text'    
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Text', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'sec_text',
    'type' => 'wysiwyg'    
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Quote', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'sec_quote',
    'type' => 'textarea'    
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Author', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'sec_author',
    'type' => 'text'    
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Author Position', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'sec_author_position',
    'type' => 'text'    
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Article Link', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'sec_article_link',
    'type' => 'text_url'    
  ) );

}

function careers_page_register_extra_content_meta_box() {

  $prefix = 'careers_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'careers_extra_content_settings',
    'title'         => __( 'Careers Extra Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 82 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Extra Section Image', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 1154 x 628 (130 kb)', 'cmb2' ),
    'id'   => $prefix . 'extra_sec_image',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Extra Section Image Tablet', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 1152 x 707 (170 kb)', 'cmb2' ),
    'id'   => $prefix . 'extra_sec_image_tablet',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Extra Section Image Mobile', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 640 x 348 (40 kb)', 'cmb2' ),
    'id'   => $prefix . 'extra_sec_image_mobile',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Extra Section Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'extra_sec_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Extra Section Text', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'extra_sec_text',
    'type' => 'textarea',
  ) );

}

function careers_page_register_jobs_content_meta_box() {

  $prefix = 'careers_page_';
  
  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'careers_jobs_content_settings',
    'title'         => __( 'Careers Jobs Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 82 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Job Section Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'job_sec_title',
    'type' => 'text',
  ) );

}