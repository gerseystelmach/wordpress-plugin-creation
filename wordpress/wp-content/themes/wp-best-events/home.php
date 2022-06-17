<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>
    <div>
        <h1>WP Best Events</h1>
    </div>
<?php
// Creating personalized query for event
$query = new WP_Query([
        'post_type' => 'event'
]);

/* Start the Loop */
while ( $query->have_posts() ) :
    $query->the_post();
?>
<h5><?= get_the_title() ?></h5>
    <h5><?= get_the_title() ?></h5>
<?php
endwhile; // End of the loop.

get_footer();
