<?php

namespace Gary\Relay\Toggl;

use Pimple\Container;

abstract class Request {

	public $guzzle = '';
	public $redmine = '';

	public function __construct( Container $container ) {
		$this->guzzle = $container['guzzle.requester'];
		$this->redmine = $container['redmine.central'];
		$this->container = $container;
	}

	abstract public function request();

	public function make_request( $action, $endpoint, $request = [] ) {
		return json_decode( $this->guzzle->make_request( $action, $endpoint, $request )->getBody() );
	}
}