<?php
/**
 * Improves user experience and accessibility for Posts
 *
 * @since 4.1.0
 * @author awoods
 *
 * @package AdminUX
 */

namespace AdminUX;

class Posts {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_footer', array($this, 'generate_js_snippet') );
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
	public function generate_js_snippet() {
		$screen = get_current_screen();

		if ( 'post' === $screen->id  ||  'page' === $screen->id ) {
			$default_length = 50;
			$max_title_length = apply_filters( 'example_filter', $default_length, 'arg1', 'arg2 ');
			if ( ! $max_title_length ){
				return $max_title_length = $default_length;
			}
		?>
		<script>
			jQuery('#title').on('keyup', function(){
				var maxLength = <?php echo $max_title_length; ?>;
				var warningLength = maxLength - 10;
				var currentLength = jQuery(this).val().length;

				if (currentLength >= maxLength) {
					if ( ! jQuery(this).hasClass("error") ){
						jQuery(this).addClass("error");
					}
					if ( jQuery(this).hasClass("warning") ){
						jQuery(this).removeClass("warning");
					}
				} else if (currentLength >= warningLength && currentLength < maxLength ) {
					if ( ! jQuery(this).hasClass("warning") ){
						jQuery(this).addClass("warning");
					}
					if ( jQuery(this).hasClass("error") ){
						jQuery(this).removeClass("error");
					}
				} else {
					jQuery(this).removeClass("warning");
					jQuery(this).removeClass("error");
				}
			});
		</script> 
		<style>
			#titlediv #title.warning {
				background-color: #ffdf7f; // Yellow	
			}
			#titlediv #title.error {
				background-color: #ff7f7f; // Red	
			}
		</style>
		<?php
		} // end of screen check
	} 
}

$posts = new Posts();

