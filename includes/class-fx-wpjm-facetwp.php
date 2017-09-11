<?php
fx_WPJM_FacetWP::get_instance();

/**
 * WPJM FacetWP Setup
 *
 * @since 1.0.0
 */
class fx_WPJM_FacetWP {

	/**
	 * Returns the instance.
	 *
	 * @since 1.0.0
	 * @return object Instance.
	 */
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
		}
		return $instance;
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Register Facets.
		add_filter( 'facetwp_facets', array( $this, 'register_facets' ) );

		// Register Templates.
		add_filter( 'facetwp_templates', array( $this, 'register_templates' ) );

		// Output.
		add_filter( 'job_manager_job_listings_output', ( array( $this, 'jobs_output' ) ) );
	}


	/**
	 * Register Jobify Facets.
	 *
	 * @since 1.0.0
	 * @param array $facets
	 * @return array $facets
	 */
	public function register_facets( $facets ) {
		$facets[] = array(
			'label'         => 'Keywords',
			'name'          => 'fx_wpjm_facetwp_keywords',
			'type'          => 'search',
			'search_engine' => '',
			'placeholder'   => 'Keywords',
		);
		$facets[] = array(
			'label'         => 'Job Location',
			'name'          => 'fx_wpjm_facetwp_job_location',
			'type'          => 'proximity',
			'source'        => 'cf/geolocation_lat',
			'source_other'  => 'cf/geolocation_long',
			'unit'          => 'km',
			'placeholder'   => 'Location',
		);
		$facets[] = array(
			'label'         => 'Job Category',
			'name'          => 'fx_wpjm_facetwp_job_category',
			'type'          => 'dropdown',
			'source'        => 'tax/job_listing_category',
			'orderby'       => 'count',
			'label_any'     => 'Any category',
			'count'         => 10,
		);
		return $facets;
	}

	/**
	 * Register Jobify Templates
	 *
	 * @since 1.0.0
	 * @param array $templates
	 * @return array $templates
	 */
	public function register_templates( $templates ) {

		// Query args.
		$query_args = locate_template( array(
			'job_manager/facetwp/jobs-query.php'
		), false, true );
		$query_args = $query_args ? $query_args : FX_WPJM_FACETWP_PATH . 'templates/jobs-query.php';

		// Template args.
		$template_args = locate_template( array(
			'job_manager/facetwp/jobs-template.php'
		), false, true );
		$template_args = $template_args ? $template_args : FX_WPJM_FACETWP_PATH . 'templates/jobs-template.php';

		// Add FacetWP templates.
		$templates[] = array(
			'label'     => 'Jobs',
			'name'      => 'fx_wpjm_facetwp_jobs',
			'query'     => file_get_contents( $query_args ),
			'template'  => file_get_contents( $template_args ),
		);

		return $templates;
	}

	/**
	 * Override [jobs] Shortcode Output.
	 *
	 * @since 1.0.0
	 *
	 * @param string $output Shortcode output.
	 * @return string
	 */
	public function jobs_output( $output ) {
		ob_start();
		require_once( FX_WPJM_FACETWP_PATH . 'templates/jobs.php' );
		return ob_get_clean();
	}

}











