<?php
/**
 * REST API: WP_REST_Term_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */

/**
 * Core class used to manage metaboxes values for terms via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_Term_Meta_Fields extends WP_REST_Meta_Fields {

	/**
	 * Taxonomy to register fields for.
	 *
	 * @since 4.7.0
	 * @var string
	 */
	protected $taxonomy;

	/**
	 * Constructor.
	 *
	 * @since 4.7.0
	 *
	 * @param string $taxonomy Taxonomy to register fields for.
	 */
	public function __construct( $taxonomy ) {
		$this->taxonomy = $taxonomy;
	}

	/**
	 * Retrieves the object metaboxes type.
	 *
	 * @since 4.7.0
	 *
	 * @return string The metaboxes type.
	 */
	protected function get_meta_type() {
		return 'term';
	}

	/**
	 * Retrieves the object metaboxes subtype.
	 *
	 * @since 4.9.8
	 *
	 * @return string Subtype for the metaboxes type, or empty string if no specific subtype.
	 */
	protected function get_meta_subtype() {
		return $this->taxonomy;
	}

	/**
	 * Retrieves the type for register_rest_field().
	 *
	 * @since 4.7.0
	 *
	 * @return string The REST field type.
	 */
	public function get_rest_field_type() {
		return 'post_tag' === $this->taxonomy ? 'tag' : $this->taxonomy;
	}
}
