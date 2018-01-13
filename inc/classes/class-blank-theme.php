<?php
/**
 * Class Blank Theme
 */

namespace Blank_Theme\Inc;

use \Blank_Theme\Inc\Traits\Singleton;

class Blank_Theme {

	use Singleton;

	/**
	 * Constuct Method.
	 */
	protected function __construct() {

		$this->_setup_theme();
	}

	/**
	 * Theme setup
	 */
	protected function _setup_theme() {

		Assets::get_instance();

	}

}

Blank_Theme::get_instance();