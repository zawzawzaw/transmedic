<?php
add_action( 'cmb2_admin_init', 'about_page_register_banner_extra_meta_box' );
add_action( 'cmb2_admin_init', 'about_page_register_what_we_do_meta_box' );
add_action( 'cmb2_admin_init', 'about_page_register_careers_meta_box' );

function about_page_register_banner_extra_meta_box() {  
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'about_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'about_extra_banner_settings',
    'title'         => __( 'Extra Banner Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 11 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => __( 'Extra Banner Sub Headline', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'extra_banner_H3',
    'type' => 'text'    
  ) );

  $cmb->add_field( array(
    'name' => __( 'Extra Banner Caption Text', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'extra_banner_caption',
    'type' => 'textarea',
  ) );

  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'extra_banner_leader_profiles',
    'type'        => 'group',
    // 'description' => esc_html__( 'What we do', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Profile {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Profile', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Profile', 'cmb2' ),
      'sortable'      => true, // beta
      'closed'     => true, // true to have the groups closed by default
    ),
  ) );  

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Leader Image', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 266 x 344 (25 kb)', 'cmb2' ),
    'id'         => $prefix . 'extra_banner_profile_image',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Leader Image Tablet', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 547 x 707 (90 kb)', 'cmb2' ),
    'id'         => $prefix . 'extra_banner_profile_image_tablet',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Leader Image Mobile', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 640 x 639 (80 kb)', 'cmb2' ),
    'id'         => $prefix . 'extra_banner_profile_image_mobile',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Leader Profile Name', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'extra_banner_profile_name',
    'type'       => 'text',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Leader Profile Position', 'cmb2' ),
    'desc'       => __( '', 'cmb2' ),
    'id'         => $prefix . 'extra_banner_profile_position',
    'type'       => 'text',
  ) );
}

/**
 * Define the metabox and field configurations.
 */
function about_page_register_what_we_do_meta_box() {  

  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'about_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'about_what_we_do_settings',
    'title'         => __( 'What We Do Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 11 ),
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
    'desc'       => __( 'Recommended dimensions 611 x 431 (70 kb)', 'cmb2' ),
    'id'         => $prefix . 'wwd_sec_image',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image Tablet', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 1152 x 707 (180 kb)', 'cmb2' ),
    'id'         => $prefix . 'wwd_sec_image_tablet',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'       => __( 'Section Image Mobile', 'cmb2' ),
    'desc'       => __( 'Recommended dimensions 640 x 393 (70 kb)', 'cmb2' ),
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
    'type' => 'wysiwyg'
  ) );

}

function about_page_register_careers_meta_box() {
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'about_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'about_careers_settings',
    'title'         => __( 'Careers Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 11 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'careers_sec_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Text', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'careers_sec_text',
    'type' => 'wysiwyg',
  ) );
}
?>