<?php

namespace Gary\Relay\Guzzle;

use GuzzleHttp\Client;
use Pimple\Container;

class Requester extends Client {

	private $api_key = '';

	public function setup( $api_key ) {
		$this->api_key = $api_key;
	}

	public function make_request( $action, $endpoint, $request = [] ) {
		return $this->request(
			$action,
			$endpoint,
			$this->build_request( $request )
		);
	}

	private function build_request( $request ) {

		$request_array = [
			'auth' => [
				$this->api_key,
				'api_token',
			],
		];

		if ( empty( $request ) ) {
			return $request_array;
		}

		if ( count( $request ) ) {
			$request_array['json'] = $request;
		}

		return $request_array;
	}

}