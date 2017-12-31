<?php
/**
 *  Contains custom functions used for the theme
 *
 *  @package Blank_Theme
 */

if ( ! function_exists( 'blank_theme_primary_classes' ) ) {
	/**
	 * Adds Foundation classes to #primary section of all templates
	 *
	 * @param string  $more_classes Add additional classes.
	 * @param boolean $override_foundation_classes Override foundation classes.
	 */
	function blank_theme_primary_classes( $more_classes = false, $override_foundation_classes = false ) {
		$sidebar_postion    = get_theme_mod( 'blank_theme_sidebar_position' );
		$foundation_classes = $override_foundation_classes ? $override_foundation_classes : 'large-8 medium-8 small-12 cell column';
		if ( 'left' === $sidebar_postion ) {
			$foundation_classes .= ' large-order-2 medium-order-2 small-order-1 ';
		} elseif ( 'right' === $sidebar_postion ) {
			$foundation_classes .= ' ';
		} elseif ( 'no_sidebar' === $sidebar_postion ) {
			$foundation_classes = ' large-12 medium-12 small-12 cell column ';
		}
		echo esc_html( apply_filters( 'blank_theme_primary_classes', "blank-theme-primary {$foundation_classes} {$more_classes} clearfix", $more_classes, $foundation_classes ) );
	}
}

if ( ! function_exists( 'blank_theme_secondary_classes' ) ) {
	/**
	 * Adds Foundation classes to #primary seciton of all templates

	 * @param string  $more_classes Add additional classes.
	 * @param boolean $override_foundation_classes Override foundation classes.
	 */
	function blank_theme_secondary_classes( $more_classes = false, $override_foundation_classes = false ) {
		// Override will be useful in page-templates.
		$sidebar_postion     = get_theme_mod( 'blank_theme_sidebar_position' );
		$foundation_classes  = $override_foundation_classes ? $override_foundation_classes : 'large-4 medium-4 small-12 cell column';
		$foundation_classes .= 'left' === $sidebar_postion ? ' large-order-1 medium-order-1 small-order-2' : false;
		echo esc_html( apply_filters( 'blank_theme_secondary_classes', "blank-theme-secondary widget-area {$foundation_classes} {$more_classes} clearfix", $more_classes, $foundation_classes ) );
	}
}
