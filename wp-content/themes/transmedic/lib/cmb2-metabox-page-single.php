<?php
add_taxonomy('article_tag', 'post', array(
  'labels' => array('add_new_item' => 'Add New Article Tag','name'=>'Article Tag')
));

add_action( 'cmb2_admin_init', 'single_page_register_single_post_meta_box' );
add_action( 'cmb2_admin_init', 'single_page_register_additional_post_meta_box' );

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
    'name' => esc_html__( 'Video Content', 'cmb2' ),
    'desc' => esc_html__( 'Post\'s video content', 'cmb2' ),
    'id'   => $prefix . 'post_video',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Video Content Poster', 'cmb2' ),
    'desc' => esc_html__( 'Post\'s video content poster', 'cmb2' ),
    'id'   => $prefix . 'post_video_poster',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Video Caption', 'cmb2' ),
    'desc' => esc_html__( 'Post\'s video caption', 'cmb2' ),
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
    'desc' => esc_html__( 'Post\'s content title', 'cmb2' ),
    'id'   => $prefix . 'post_content_title',
    'type' => 'text',
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Post Content Text', 'cmb2' ),
    'desc' => esc_html__( 'Post\'s content text', 'cmb2' ),
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
    'desc' => esc_html__( 'Post\'s content image', 'cmb2' ),
    'id'   => $prefix . 'post_content_image',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Post Extra Content Title', 'cmb2' ),
    'desc' => esc_html__( 'Post\'s extra content title', 'cmb2' ),
    'id'   => $prefix . 'post_extra_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Post Extra Content Text', 'cmb2' ),
    'desc' => esc_html__( 'Post\'s extra content text', 'cmb2' ),
    'id'   => $prefix . 'post_extra_text',
    'type' => 'wysiwyg',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Source Article Title', 'cmb2' ),
    'desc' => esc_html__( 'Source article title', 'cmb2' ),
    'id'   => $prefix . 'source_article_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Source Article Link', 'cmb2' ),
    'desc' => esc_html__( 'Source article link', 'cmb2' ),
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
    'desc' => esc_html__( 'Additional info header text', 'cmb2' ),
    'id'   => $prefix . 'additional_info_header_text',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Additional Info Title', 'cmb2' ),
    'desc' => esc_html__( 'Additional info title', 'cmb2' ),
    'id'   => $prefix . 'additional_info_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => esc_html__( 'Additional Info Text', 'cmb2' ),
    'desc' => esc_html__( 'Additional info text', 'cmb2' ),
    'id'   => $prefix . 'additional_info_text',
    'type' => 'wysiwyg',
  ) );
}