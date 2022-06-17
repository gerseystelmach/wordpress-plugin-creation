<?php

add_action( 'init', function () {
	register_taxonomy(
		'address',
		[ 'event' ], // it indicates which CPT(s) should have access to the taxonomy
		[
			'hierarchical'      => true,
			'labels'            => [
				'name'          => 'Addresses',
				'singular_name' => 'Address',
			],
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'      => true
		]
	);
} );

