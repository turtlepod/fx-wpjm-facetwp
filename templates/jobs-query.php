<?php
return array(
	'post_type'      => 'job_listing',
	'orderby'        => array(
		'menu_order'   => 'ASC',
		'date'         => 'DESC',
	),
	'order'          => 'asc',
	'posts_per_page' => get_option( 'job_manager_per_page', 10 ),
	'post_status'    => 'publish',
);