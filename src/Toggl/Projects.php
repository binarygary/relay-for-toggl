<?php

namespace Gary\Relay\Toggl;

class Projects extends Request {

	public function request( ) {
		switch ( (string) $_POST['action'] ) {
			case 'list':
				$this->project_list();
				break;
			case 'setup':
				$this->setup();
				break;
		}
	}

	private function project_list() {
		$wid = $this->container['toggl.workspaces']->get_projects();
		$endpoint = "https://www.toggl.com/api/v8/workspaces/{$wid}/projects";

		$projects = $this->make_request( 'GET', $endpoint );
		$project_ids = [];

		foreach ( $projects as $project ) {
			$project_ids[ $project->id ] = $project->name;
		}

		return $project_ids;
	}

	private function setup() {
		foreach ( $this->project_list() as $id => $name ) {

		}
	}

}