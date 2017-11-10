<?php

namespace Gary\Relay;

use Pimple;

class Core {
	public function __construct() {
		echo 'hi';
	}

	static public function instance( Pimple\Container $container ) {
		$class = __CLASS__;
		return new $class( $container );
	}

	public function init() {
		echo 'taco';
	}
}