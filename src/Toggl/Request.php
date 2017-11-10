<?php

namespace Gary\Relay\Toggl;

use Pimple\Container;

abstract class Request {

	public function __construct( Container $container ) {
		$this->container = $container;
	}


}