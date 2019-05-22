<?php
/**
 * The template for displaying all Teams
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/franchise-team-page', get_post_format() );

endwhile; // End of the loop.

get_footer();
