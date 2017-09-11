<?php
/**
 * [jobs] Shortcode Output.
 *
 * @since 4.0.0
 * @version 4.0.0
 */
?>
<div class="facetwp-search_jobs search_jobs">
	<?php echo facetwp_display( 'facet', 'fx_wpjm_facetwp_keywords' ); ?>
	<?php echo facetwp_display( 'facet', 'fx_wpjm_facetwp_job_category' ); ?>
	<?php echo facetwp_display( 'facet', 'fx_wpjm_facetwp_job_location' ); ?>
</div><!-- .search_jobs -->

<?php echo facetwp_display( 'template', 'fx_wpjm_facetwp_jobs' ); ?>
<?php echo facetwp_display( 'pager' ); ?>