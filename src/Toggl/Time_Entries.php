<?php

namespace Gary\Relay\Toggl;

class Time_Entries extends Request {

	const ENDPOINT = 'https://www.toggl.com/api/v8/time_entries/';

	public function request() {
		switch ( (string) $_POST['action'] ) {
			case 'start':
				$this->start_clock();
				break;
			case 'stop':
				$this->stop_clock();
				break;
			case 'running' :
				$this->is_running();
				break;
		}
	}

	private function start_clock() {
		if ( $this->get_running_id() > 0 ) {

		}
		$request = [
			'time_entry' => [
				'description'  => $_POST['description'],
				'created_with' => 'toggl_relay',
				'pid' => $_POST['pid'],
			],
		];

		$response = $this->make_request( 'POST', self::ENDPOINT . 'start', $request );
	}

	private function stop_clock( $running_id = 0 ) {
		if ( 0 === $running_id ) {
			$running_id = $this->get_running_id();
		}
		$this->stop_clock_call( $running_id );
	}

	private function stop_clock_call( $running_id ) {
		$this->make_request( 'PUT', self::ENDPOINT . $running_id . '/stop' );
	}

	private function get_running_id() {
		$running = $this->make_request( 'GET', self::ENDPOINT . 'current' );

		if ( ! isset( $running->data->id ) ) {
			return 0;
		}

		return $running->data->id;
	}

	private function is_running() {
		echo json_encode( [ 'running' => $this->get_running_id() ] );
	}

}