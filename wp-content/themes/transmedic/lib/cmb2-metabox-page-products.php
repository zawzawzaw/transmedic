<?php
add_action( 'cmb2_admin_init', 'products_page_register_our_brands_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function products_page_register_our_brands_meta_box() {  
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'products_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'products_our_brands_settings',
    'title'         => __( 'Our Brands Section', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_on' => array( 'id' => 78 ),
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Title', 'cmb2' ),
    'desc' => esc_html__( 'Our brands section title', 'cmb2' ),
    'id'   => $prefix . 'ob_sec_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Section Text', 'cmb2' ),
    'desc' => esc_html__( 'Our brands section text', 'cmb2' ),
    'id'   => $prefix . 'ob_sec_text',
    'type' => 'textarea',
  ) );
}