<?php

namespace Gary\Relay\Toggl;

class Time_Entries extends Request {

	const ENDPOINT = 'https://www.toggl.com/api/v8/time_entries';


	public function init() {
		switch ( (string) $_POST['action'] ) {
			case 'start':
				$this->start_clock();
				break;
		}
	}

	public function start_clock() {
		$request = json_encode(
			[
				'time_entry' => 'testing',
			]
		);
		print_r( $this->container['guzzle.requester']->make_request( self::ENDPOINT, $request ) );
	}

}