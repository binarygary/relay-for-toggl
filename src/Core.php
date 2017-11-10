<?php

namespace Gary\Relay;

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
		echo 'yes';
	}
}