<?php
/**
 * To manage all static assets.
 */

namespace Blank_Theme\Inc;

use \Blank_Theme\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Assets {

	use Singleton;

	/**
	 * Construct Method.
	 */
	protected function __construct() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}

	/**
	 * To enqueur scripts.
	 *
	 * @action wp_enqueue_scripts
	 *
	 * @return void
	 */
	public function wp_enqueue_scripts() {

		wp_enqueue_style( 'blank-theme-style', sprintf( '%s/assets/build/css/main.css', untrailingslashit( BLANK_THEME_TEMP_URI ) ) );

		// JS
		wp_enqueue_script( 'blank-theme-navigation', sprintf( '%s/assets/build/js/vendor/navigation.js', untrailingslashit( BLANK_THEME_TEMP_URI ) ), array(), BLANK_THEME_VERSION, true );
		wp_enqueue_script( 'blank-theme-skip-link-focus-fix', sprintf( '%s/assets/build/js/vendor/skip-link-focus-fix.js', untrailingslashit( BLANK_THEME_TEMP_URI ) ), array(), BLANK_THEME_VERSION, true );
		wp_enqueue_script( 'blank-theme-base', sprintf( '%s/assets/build/js/main.js', untrailingslashit( BLANK_THEME_TEMP_URI ) ), array(), BLANK_THEME_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}
