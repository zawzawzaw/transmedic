<?php
add_action( 'cmb2_admin_init', 'about_page_register_what_we_do_meta_box' );
add_action( 'cmb2_admin_init', 'about_page_register_careers_meta_box' );

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
    'desc' => esc_html__( 'What we do section title', 'cmb2' ),
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
    'desc'       => __( 'Image thumbnail', 'cmb2' ),
    'id'         => $prefix . 'wwd_sec_image',
    'type'       => 'file',   
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Image Title', 'cmb2' ),
    'desc' => __( 'Image Title', 'cmb2' ),
    'id'   => $prefix . 'wwd_sec_image_title',
    'type' => 'text'    
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => __( 'Section Image Text', 'cmb2' ),
    'desc' => __( 'Image Text', 'cmb2' ),
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
    'desc' => esc_html__( 'Careers section title', 'cmb2' ),
    'id'   => $prefix . 'careers_sec_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Text', 'cmb2' ),
    'desc' => esc_html__( 'Careers section text', 'cmb2' ),
    'id'   => $prefix . 'careers_sec_text',
    'type' => 'wysiwyg',
  ) );
}
?>