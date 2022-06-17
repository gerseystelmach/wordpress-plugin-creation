<?php
$addressMetaBoxId   = 'address_meta_box_id';
$addressMetaBoxName = 'address_meta_box_name';

// Creating a metabox
add_action( 'add_meta_boxes',
	function () {
		global $addressMetaBoxId;
		add_meta_box(
			$addressMetaBoxId,
			'Event address',
			'wp_best_events_address_meta_box_html',
			'event' // indicate the CPT
		);
	}
);

// Creating the HTML for the meta box
// $post = This function has an implicit argument, that allows us to recover the data related to this metabox, such as the ID of post.
function wp_best_events_address_meta_box_html( $post ) {

	global $addressMetaBoxName;
	global $addressMetaBoxId;

    // Recovering address from database
	$address = get_post_meta( $post->ID, $addressMetaBoxId, true );

	// We MUST not create a tag form, because this will already be created within this tag.
	?>
	<?php // To save the data from this metabox, I only need to save the post. However, we can save it automatically by using ajax ?>
    <label for="<?= $addressMetaBoxName ?>">Event Address</label>
    <input type="text" id="<?= $addressMetaBoxName ?>" name="<?= $addressMetaBoxName ?>" value="<?= $address ?>">
	<?php
}

// Saving the data from metabox on the post
add_action( 'save_post', function ( $postId ) {
	global $addressMetaBoxName;
	global $addressMetaBoxId;
    // Recommended way to use the superglobal post
	$address = filter_input( INPUT_POST, $addressMetaBoxName );
	if ( $address ) {
		update_post_meta( $postId, $addressMetaBoxId, $address );
	}
} );

