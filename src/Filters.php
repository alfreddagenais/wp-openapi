<?php

namespace WPOpenAPI;

use WPOpenAPI\Spec\Info;
use WPOpenAPI\Spec\Operation;
use WPOpenAPI\Spec\Path;
use WPOpenAPI\Spec\Server;

class Filters {

	const PREFIX = 'wp-openapi-';

	private static ?Filters $instance = null;

	public static function getInstance(): Filters {
		if ( static::$instance === null ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function addOperationFilter( $callback, $priority = 10 ) {
		add_filter( self::PREFIX . 'filter-operation', $callback, $priority, 2 );
	}

	public function applyOperationFilters( Operation $operation, array $args = array() ): Operation {
		return apply_filters( self::PREFIX . 'filter-operation', $operation, $args );
	}

	public function addPathFilter( $callback, $priority = 10 ) {
		add_filter( self::PREFIX . 'filter-path', $callback, $priority, 2 );
	}

	public function applyPathFilter( Path $path, array $args = array() ): Path {
		return apply_filters( self::PREFIX . 'filter-path', $path, $args );
	}

	public function addServerFilter( $callback, $priority = 10 ) {
		add_filter( self::PREFIX . 'filter-server', $callback, $priority, 2 );
	}

	public function applyServerFilters( Server $server, array $args = array() ): Server {
		return apply_filters( self::PREFIX . 'filter-server', $server, $args );
	}

	public function addInfoFilter( $callback, $priority = 10 ) {
		add_filter( self::PREFIX . 'filter-info', $callback, $priority, 2 );
	}

	public function applyInfoFilters( Info $info, array $args = array() ): Info {
		return apply_filters( self::PREFIX . 'filter-info', $info, $args );
	}
}