<?php if ( have_posts() ) : ?>

	<?php get_job_manager_template( 'job-listings-start.php' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_job_manager_template_part( 'content', 'job_listing' ); ?>
	<?php endwhile; ?>

	<?php get_job_manager_template( 'job-listings-end.php' ); ?>

<?php else :
	do_action( 'job_manager_output_jobs_no_results' );
endif;