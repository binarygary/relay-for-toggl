<?php

namespace Gary\Relay;

use Gary\Relay\Service_Providers\Post_Service_Provider;
use Pimple;

class Core {

	protected $container = null;

	public function __construct( $container ) {
		$this->container = $container;
	}

	static public function instance( Pimple\Container $container ) {
		$class = __CLASS__;
		return new $class( $container );
	}

	public function init() {
		$this->service_providers();
	}

	public function service_providers() {
		$this->container->register( new Post_Service_Provider() );
	}
}