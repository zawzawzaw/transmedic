<?php
add_action( 'cmb2_admin_init', 'contact_page_register_our_offices_meta_box' );
// add_action( 'cmb2_admin_init', 'contact_page_register_enquiries_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function contact_page_register_our_offices_meta_box() {  
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'contact_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'contact_our_offices_settings',
    'title'         => __( 'Our Offices Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 84 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Title', 'cmb2' ),
    'desc' => esc_html__( 'Our offices section title', 'cmb2' ),
    'id'   => $prefix . 'of_sec_title',
    'type' => 'text',
  ) );
}

function contact_page_register_enquiries_meta_box() {  
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'contact_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'contact_enquiries_settings',
    'title'         => __( 'Enquiries Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 84 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Enquiries Section Title', 'cmb2' ),
    'desc' => esc_html__( 'Enquiries section title', 'cmb2' ),
    'id'   => $prefix . 'en_sec_title',
    'type' => 'textarea',
  ) );
}