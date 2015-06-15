<?php
/**
 * Filters for the 'admin-ux' plugin 
 *
 * @package AdminUX
 * @subpackage Filters
 * @author awoods
 */

namespace AdminUX;

// Available Filters
add_filter( 'max_post_title_length', 'adminux_title_character_count', 10, 1 );


/**
 * Set the maximum number of posts a post/page title should be.
 *
 * The length of the title is related to your font size for your H1.
 * Use this to warn users that there title is too long. Titles that are too 
 * long feel like they "break" the design.  
 *
 * @param int $max_length the maximum number of characters a title should be
 * @return int
 */
function adminux_title_character_count( $max_length = 0 ) {
	if ( ! $max_length || 10 > $max_length )	{ 
		return false;
	}

	return $max_length;
}

