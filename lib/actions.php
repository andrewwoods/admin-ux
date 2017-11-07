<?php
/**
 * Actions for the Admin UX plugin
 *
 * This file is part of the Admin UX plugin by Andrew Woods
 *
 * @package AdminUX\Actions
 * @author Andrew Woods <andrew@andrewwoods.net>
 * @license GPLv2
 */

/**
 * @param $hook
 */
function admin_ux_load_edit_posts_js( $hook ) {
	if ( 'post-new.php' === $hook || 'post.php' === $hook ) {
		wp_enqueue_style( 'admin_ux_post_css', ADMIN_UX_ASSETS_URL . 'custom.css' );
		wp_enqueue_script( 'admin_ux_post_js', ADMIN_UX_ASSETS_URL . 'posts-screen.js' );
	}
}



/**
 * Generate a snippet of Javascript to update the counter
 *
 * @access public
 * @uses adminux_title_character_count()
 * @uses apply_filters()
 *
 * @return void
 */
function generate_js_snippet() {
	$screen = get_current_screen();
	if ( 'post' === $screen->id || 'page' === $screen->id ) {
		$default_length = 50;
		$max_title_length = apply_filters( 'adminux_max_post_title_length', $default_length );
		$data = [
			'postsTitleMaxLength' => $max_title_length,
		];
		?>
		<script>
			var AdminUX = <?php echo wp_json_encode( $data ); ?>;
			;
		</script>
		<?php
	}
}

