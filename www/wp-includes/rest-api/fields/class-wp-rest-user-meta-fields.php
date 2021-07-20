<?php
/**
 * REST API: WP_REST_User_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */

/**
 * Core class used to manage metaboxes values for users via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_User_Meta_Fields extends WP_REST_Meta_Fields {

	/**
	 * Retrieves the object metaboxes type.
	 *
	 * @since 4.7.0
	 *
	 * @return string The user metaboxes type.
	 */
	protected function get_meta_type() {
		return 'user';
	}

	/**
	 * Retrieves the object metaboxes subtype.
	 *
	 * @since 4.9.8
	 *
	 * @return string 'user' There are no subtypes.
	 */
	protected function get_meta_subtype() {
		return 'user';
	}

	/**
	 * Retrieves the type for register_rest_field().
	 *
	 * @since 4.7.0
	 *
	 * @return string The user REST field type.
	 */
	public function get_rest_field_type() {
		return 'user';
	}
}
