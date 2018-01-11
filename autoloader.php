<?php
/**
 * To Register autoloader
 */
spl_autoload_register( function( $resource = '' ) {

	$namespace_root = 'Blank_Theme\\';

	error_log( 'Name spance : ' . $resource );

	$resource = trim( $resource, '\\' );

	if ( empty( $resource ) || strpos( $resource, '\\' ) === false || strpos( $resource, $namespace_root ) !== 0 ) {
		// Not our namespace, bail out.
		return;
	}

	$theme_root = __DIR__;

	$path = explode(
		'\\',
		str_replace( '_', '-', strtolower( $resource ) )
	);

	/**
	 * Time to determine which type of resource path it is,
	 * so that we can deduce the correct file path for it.
	 */
	if ( empty( $path[1] ) || empty( $path[2] ) ) {
		return;
	}

	$directory = '';
	$file_name = '';

	if ( 'inc' === $path[1] ) {

		switch ( $path[2] ) {

			case 'traits':
				$directory  = 'traits';
				$file_name = sprintf( 'trait-%s', trim( strtolower( $path[3] ) ) );
				break;

			default:
				$directory = 'classes';
				$file_name = sprintf( 'class-%s', trim( strtolower( $path[2] ) ) );
				break;
		}

		$resource_path = sprintf( '%s/inc/%s/%s.php', untrailingslashit( $theme_root ), $directory, $file_name );
	}

	if ( file_exists( $resource_path ) && validate_file( $resource_path ) === 0 ) {
		require_once $resource_path;
	}
} );
