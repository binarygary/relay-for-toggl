<?php

namespace Gary\Relay\Toggl;

class Workspaces extends Request {

	const ENDPOINT = 'https://www.toggl.com/api/v8/workspaces';

	protected $wid = null;

	public function request() {

	}

	public function get_projects() {
		$workplaces = $this->make_request( 'GET', self::ENDPOINT );
		return $workplaces[0]->id;
	}

	public function get_wid() {
		if ( isset ( $this->wid ) ) {
			return $this->wid;
		}

		return $this->get_projects();
	}

}