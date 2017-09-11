<?php
/**
 * [fx-wpjm-facetwp-filters] Shortcode Output.
 *
 * Display filters in other page.
 * It's actually loading full search page, but hide the search results and redirect it to search page on submit.
 *
 * @since 1.0.0
 */
?>
<div class="fx-wpjm-facetwp-search_jobs search_jobs">
	<?php echo facetwp_display( 'facet', 'fx_wpjm_facetwp_keywords' ); ?>
	<?php echo facetwp_display( 'facet', 'fx_wpjm_facetwp_job_category' ); ?>
	<?php echo facetwp_display( 'facet', 'fx_wpjm_facetwp_job_location' ); ?>
	<p><a href="#" class="button fx-wpjm-facetwp-submit">Search Jobs</a></p>
</div><!-- .search_jobs -->

<div style="display:none!important;">
<?php echo facetwp_display( 'template', 'fx_wpjm_facetwp_jobs' ); ?>
<?php //echo facetwp_display( 'pager' ); ?>
</div>

<script>
( function( window, undefined ){
	var $ = window.jQuery;
	var document = window.document;

	$( document ).on( 'click', '.fx-wpjm-facetwp-submit', function(e) {
		FWP.parse_facets();
		FWP.set_hash();
		window.location.href = '<?php echo get_permalink( get_option( 'job_manager_jobs_page_id' ) ); ?>?' + FWP.build_query_string();
	} );
})( window );
</script>