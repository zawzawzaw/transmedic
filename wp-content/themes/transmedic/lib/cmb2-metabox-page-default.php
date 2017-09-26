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
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Banner Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'banner_image',
		'type' => 'file',
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Banner Headline', 'cmb2' ),
		'desc'       => __( 'Banner Header Text (optional)', 'cmb2' ),
		'id'         => $prefix . 'banner_H2',
		'type'       => 'text',
		// 'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => __( 'Banner Sub Headline', 'cmb2' ),
		'desc' => __( 'Banner Sub Header Text (optional)', 'cmb2' ),
		'id'   => $prefix . 'banner_H3',
		'type' => 'text'		
	) );

	// Email text field
	$cmb->add_field( array(
		'name' => __( 'Banner Caption Text', 'cmb2' ),
		'desc' => __( 'Banner Text (optional)', 'cmb2' ),
		'id'   => $prefix . 'banner_caption',
		'type' => 'textarea',
	) );

	// Add other metaboxes as needed

}