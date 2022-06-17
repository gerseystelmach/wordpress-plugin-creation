<?php

add_action( 'init', function () {
	register_post_type(
		'event',
		[
			'labels'      => [
				'name'          => 'Events',
				'singular_name' => 'Event',
			],
			'public'      => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-clock',
			'show_in_rest' => true, // gutemberg editor choice
			'supports' =>  [
				'title',
				'editor', // allows gutemberg
				'author',
				'thumbnail',
				'excerpt', // extrait
				'page-attributes',
				'custom-fields'
			]

		]
	);
} );