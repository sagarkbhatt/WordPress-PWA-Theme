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

		if ( defined( 'BLANK_THEME_IS_DEV' ) && BLANK_THEME_IS_DEV ) {

			wp_enqueue_script( 'blank-theme-navigation', BLANK_THEME_JS_URI . '/vendor/navigation.js', array(), BLANK_THEME_VERSION, true );

			wp_enqueue_script( 'blank-theme-skip-link-focus-fix', BLANK_THEME_JS_URI . '/vendor/skip-link-focus-fix.js', array(), BLANK_THEME_VERSION, true );

			wp_enqueue_script( 'blank-theme-base', BLANK_THEME_JS_URI . '/main.js', array(), BLANK_THEME_VERSION, true );
		} else {

			wp_enqueue_script( 'blank-theme-vendor', BLANK_THEME_JS_URI . '/vendor.min.js', array(), BLANK_THEME_VERSION, true );

			wp_enqueue_script( 'blank-theme-base-prod', BLANK_THEME_JS_URI . '/main.min.js', array(), BLANK_THEME_VERSION, true );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}
