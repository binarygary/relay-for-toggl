<?php

namespace Gary\Relay\Toggl;

class Time_Entries extends Request {

	const ENDPOINT = 'https://www.toggl.com/api/v8/time_entries/';

	public function init() {
		switch ( (string) $_POST['action'] ) {
			case 'start':
				$this->start_clock();
				break;
			case 'stop':
				$this->stop_clock();
				break;
		}
	}

	private function start_clock() {
		$request = [
			'time_entry' => [
				'description'  => 'testing',
				'created_with' => 'toggl_relay',
			],
		];
		print_r( $this->make_request( 'POST', 'start', $request ) );
	}

	private function stop_clock() {
		$running = json_decode( $this->make_request( 'GET', 'current' )->getBody(), true );
		print_r( $this->make_request( 'PUT', $running['data']['id'] . '/stop' ) );
	}

	private function make_request( $action, $endpoint, $request = [] ) {
		return $this->container['guzzle.requester']->make_request( $action, self::ENDPOINT . $endpoint, $request );
	}

}