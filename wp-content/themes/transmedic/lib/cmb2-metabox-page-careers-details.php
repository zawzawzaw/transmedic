<?php
add_action( 'cmb2_admin_init', 'careers_details_page_content_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function careers_details_page_content_meta_box() {  
  $prefix = 'careers_details_page_';
  
  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'careers_story_content_settings',
    'title'         => __( 'Careers Story Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 255 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'careers_stories',
    'type'        => 'group',
    // 'description' => esc_html__( 'What we do', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Story {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Story', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Story', 'cmb2' ),
      'sortable'      => true, // beta
      'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Story Section Sub Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'story_sec_sub_title',
    'type' => 'text',
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Story Section Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'story_sec_title',
    'type' => 'text',
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Story Section Image', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 835 × 460 (60 KB)', 'cmb2' ),
    'id'   => $prefix . 'story_sec_image',
    'type' => 'file',
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Story Section Image Tablet', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 1152 x 707 (35 KB)', 'cmb2' ),
    'id'   => $prefix . 'story_sec_image_tablet',
    'type' => 'file',
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Story Section Image Mobile', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 640 x 390 (35 KB)', 'cmb2' ),
    'id'   => $prefix . 'story_sec_image_mobile',
    'type' => 'file',
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Story Section Content', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'story_sec_content',
    'type' => 'wysiwyg',
  ) );

  // $cmb->add_field( array(
  //   'name' => __( 'Sidebar Title', 'cmb2' ),
  //   'desc' => __( '', 'cmb2' ),
  //   'id'   => $prefix . 'sidebar_title',
  //   'type' => 'text'    
  // ) );

  // $cmb->add_field( array(
  //   'name' => __( 'Sidebar Image', 'cmb2' ),
  //   'desc' => __( '', 'cmb2' ),
  //   'id'   => $prefix . 'sidebar_image',
  //   'type' => 'file'    
  // ) );
}