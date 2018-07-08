<?php
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'page_register_meta_box' );

/**
 * Define the metabox and field configurations.
 */
function page_register_meta_box() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'page_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'banner_settings',
		'title'         => __( 'Banner Section', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'show_on'      => array( 'key' => 'id', 'value' => array( 11, 82, 84, 2 ) ),
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Banner Image', 'cmb2' ),
		'desc' => esc_html__( 'Recommended Dimension 2069 x 750, (100 kb)', 'cmb2' ),
		'id'   => $prefix . 'banner_image',
		'type' => 'file',
		'show_on_cb' => 'banner_image_only_show_for_specific_page'
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Banner Image Tablet', 'cmb2' ),
		'desc' => esc_html__( 'Recommended Dimension 1152 × 720, (70 kb)', 'cmb2' ),
		'id'   => $prefix . 'banner_image_tablet',
		'type' => 'file',
		'show_on_cb' => 'banner_image_only_show_for_specific_page'
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Banner Image Mobile', 'cmb2' ),
		'desc' => esc_html__( 'Recommended Dimension 640 × 400, (30 kb)', 'cmb2' ),
		'id'   => $prefix . 'banner_image_mobile',
		'type' => 'file',
		'show_on_cb' => 'banner_image_only_show_for_specific_page'
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Banner Headline', 'cmb2' ),
		'desc'       => __( '', 'cmb2' ),
		'id'         => $prefix . 'banner_H2',
		'type'       => 'wysiwyg',
		'options' => array(		   
	    'textarea_rows' => get_option('default_post_edit_rows', 5), // rows="..."		    
		),
		'show_on_cb' => 'banner_headline_only_show_for_specific_page'
		// 'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => __( 'Banner Sub Headline', 'cmb2' ),
		'desc' => __( '', 'cmb2' ),
		'id'   => $prefix . 'banner_H3',
		'type' => 'text',
		'show_on_cb' => 'banner_sub_headline_only_show_for_specific_page'		
	) );

	// Email text field
	$cmb->add_field( array(
		'name' => __( 'Banner Caption Text', 'cmb2' ),
		'desc' => __( '', 'cmb2' ),
		'id'   => $prefix . 'banner_caption',
		'type' => 'textarea',
		'show_on_cb' => 'banner_caption_only_show_for_specific_page'		
	) );

	/**
	 * Only display a field if the current user is 1
	 * @param  object $field Current field object
	 * @return bool          True if current user's ID is 1
	 */
	

	
 	

	// Add other metaboxes as needed

}

function banner_image_only_show_for_specific_page( $field ) {
	// Returns true if current user's ID is 1, else false
	// return 1 === get_current_user_id();
	// Use $field->object_id if you need
	// the current object (post, user, etc) ID.
	global $post;
	$post_id =	$post->ID;

	if($post_id == 82 || $post_id == 84 || $post_id == 2)
		return 1;
	else
		return 0;
}

function banner_headline_only_show_for_specific_page( $field ) {
	// Returns true if current user's ID is 1, else false
	// return 1 === get_current_user_id();
	// Use $field->object_id if you need
	// the current object (post, user, etc) ID.
	global $post;
	$post_id =	$post->ID;

	if($post_id == 2 || $post_id == 82 || $post_id == 11)
		return 1;
	else
		return 0;
}

function banner_sub_headline_only_show_for_specific_page( $field ) {
	// Returns true if current user's ID is 1, else false
	// return 1 === get_current_user_id();
	// Use $field->object_id if you need
	// the current object (post, user, etc) ID.
	global $post;
	$post_id =	$post->ID;

	if($post_id == 11)
		return 1;
	else
		return 0;
}

function banner_caption_only_show_for_specific_page( $field ) {
	// Returns true if current user's ID is 1, else false
	// return 1 === get_current_user_id();
	// Use $field->object_id if you need
	// the current object (post, user, etc) ID.
	global $post;
	$post_id =	$post->ID;

	if($post_id == 11 || $post_id == 82)
		return 1;
	else
		return 0;
}