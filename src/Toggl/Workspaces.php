<?php

namespace Gary\Relay\Toggl;

class Workspaces extends Request {

	const ENDPOINT = 'https://www.toggl.com/api/v8/workspaces';

	public function request() {

	}

	public function get_projects() {
		$project = $this->make_request( 'GET', self::ENDPOINT );
		return $project[0]->id;
	}

}