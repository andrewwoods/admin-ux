<?php
/**
 * Filters for the Admin UX plugin
 *
 * This file is part of the Admin UX plugin by Andrew Woods
 *
 * @package AdminUX\Filters
 * @author Andrew Woods <andrew@andrewwoods.net>
 * @license GPLv2
 */

/**
 * Set the maximum number of posts a post/page title should be.
 *
 * The length of the title is related to your font size for your H1.
 * Use this to warn users that there title is too long. Titles that are too
 * long feel like they "break" the design.
 *
 * @param int $max_length the maximum number of characters a title should be.
 * @return int
 */
function adminux_title_max_length( $max_length ) {
	$minimum_length = 20;

	// It's probably not useful/meaningful if the title
	// is too short, so we don't want it to be.
	if ( $minimum_length > $max_length ) {
		$max_length = $minimum_length;
	}

	return $max_length;
}

/**
 * Retrieve the URL for you custom login logo.
 *
 * @return string
 */
function admin_ux_login_logo_url() {
	return get_bloginfo( 'url' );
}
