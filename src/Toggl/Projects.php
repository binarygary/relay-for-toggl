<?php

namespace Gary\Relay\Toggl;

class Projects extends Request {

	const ENDPOINT = 'https://www.toggl.com/api/v8/projects';

	public function request( ) {
		switch ( (string) $_POST['action'] ) {
			case 'list':
				$this->project_list();
				break;
			case 'setup':
				$this->setup();
				break;
			case 'current':
				$this->current_project_id();
				break;
		}
	}

	private function project_list() {
		$wid = $this->container['toggl.workspaces']->get_wid();
		$endpoint = "https://www.toggl.com/api/v8/workspaces/{$wid}/projects";

		$projects = $this->make_request( 'GET', $endpoint );
		$project_ids = [];

		foreach ( $projects as $project ) {
			$project_ids[ $project->id ] = $project->name;
		}

		return $project_ids;
	}

	private function setup() {
		$toggl_projects = $this->project_list();

		if ( ! in_array ( $_POST['project_name'], $toggl_projects ) ) {
				$this->create_project( $project );
		}

		echo json_encode( $this->current_project_id() );
	}

	private function current_project_id() {
		return array_search( $_POST['project_name'], $this->project_list() );
	}

	private function create_project( $project ) {
		$project = [
			'project' => [
				'name' => $project,
				'wid' => $this->container['toggl.workspaces']->get_wid(),
			]
		];

		$this->make_request( 'POST', self::ENDPOINT, $project );
	}

}