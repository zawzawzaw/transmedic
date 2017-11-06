<?php
add_taxonomy('article_tag', 'post', array(
  'labels' => array('add_new_item' => 'Add New Article Tag','name'=>'Article Tags')
));

add_action( 'cmb2_admin_init', 'single_page_register_single_post_meta_box' );
add_action( 'cmb2_admin_init', 'single_page_register_additional_post_meta_box' );
// add_action( 'cmb2_admin_init', 'single_page_register_sidebar_post_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function single_page_register_single_post_meta_box() {  
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'single_post_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'single_post_settings',
    'title'         => __( 'Post Content Section', 'cmb2' ),
    'object_types'  => array( 'post' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Video Content (Optional)', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_video',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Video/Photo Preview Image', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_video_poster',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Video/Photo Caption', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_caption',
    'type' => 'textarea',
  ) );

  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'post_content',
    'type'        => 'group',
    // 'description' => esc_html__( 'What we do', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Text Block {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Text Block', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Text Block', 'cmb2' ),
      'sortable'      => true, // beta
      'closed'     => true, // true to have the groups closed by default
    ),
  ) );  

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Post Content Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_content_title',
    'type' => 'text',
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Post Content Text', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_content_text',
    'type' => 'wysiwyg',
  ) );

  $group_2_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'post_content_image',
    'type'        => 'group',
    // 'description' => esc_html__( 'What we do', 'cmb2' ),
    'options'     => array(
      'group_title'   => esc_html__( 'Image {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another Image', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove Image', 'cmb2' ),
      'sortable'      => true, // beta
      'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $cmb->add_group_field( $group_2_field_id, array(
    'name' => esc_html__( 'Post Content Image', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 768 x 512 (330 kb)', 'cmb2' ),
    'id'   => $prefix . 'post_content_image',
    'type' => 'file',
  ) );

  $cmb->add_group_field( $group_2_field_id, array(
    'name' => esc_html__( 'Post Content Image Tablet', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_content_image_tablet',
    'type' => 'file',
  ) );

  $cmb->add_group_field( $group_2_field_id, array(
    'name' => esc_html__( 'Post Content Image Mobile', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_content_image_mobile',
    'type' => 'file',
  ) );

  $cmb->add_group_field( $group_2_field_id, array(
    'name' => esc_html__( 'Post Content Image Caption', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_content_image_caption',
    'type' => 'textarea',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Post Extra Content Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_extra_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Post Extra Content Text', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'post_extra_text',
    'type' => 'wysiwyg',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Source Article Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'source_article_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Source Article Link', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'source_article_link',
    'type' => 'text',
  ) );

}

function single_page_register_additional_post_meta_box() {
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'single_post_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'single_post_additional_info',
    'title'         => __( 'Additional Info Section', 'cmb2' ),
    'object_types'  => array( 'post' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Additional Info Header Text', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'additional_info_header_text',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Additional Info Title', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'additional_info_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Additional Info Text', 'cmb2' ),
    'desc' => esc_html__( '', 'cmb2' ),
    'id'   => $prefix . 'additional_info_text',
    'type' => 'wysiwyg',
  ) );
}

function single_page_register_sidebar_post_meta_box() {
  // Start with an underscore to hide fields from custom fields list  
  $prefix = 'single_post_page_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'single_post_side_bar_settings',
    'title'         => __( 'Side Bar Section', 'cmb2' ),
    'object_types'  => array( 'post' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Sidebar Image', 'cmb2' ),
    'desc' => esc_html__( 'Recommended dimensions 295 × 205 (30 kb)', 'cmb2' ),
    'id'   => $prefix . 'sidebar_image',
    'type' => 'file',
  ) );
}