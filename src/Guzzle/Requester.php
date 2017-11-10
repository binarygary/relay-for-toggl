<?php

namespace Gary\Relay\Guzzle;

use GuzzleHttp\Client;

class Requester extends Client {
	public function make_request( $endpoint, $request ) {
		return $this->request( 'POST', $endpoint, [
				'json' => $request,
			]
		);
	}

}