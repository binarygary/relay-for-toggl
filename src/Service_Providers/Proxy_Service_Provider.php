<?php

namespace Gary\Relay\Service_Providers;

use Gary\Relay\Guzzle\Requester;
use Gary\Relay\Redmine\Central;
use Gary\Relay\Toggl\{
	Clients, Projects, Tags, Time_Entries, Workspaces
};
use Pimple\{
	Container, ServiceProviderInterface
};

class Proxy_Service_Provider implements ServiceProviderInterface {

	const TOGGLE_API_KEY = 'api_key';
	const CENTRAL_URL    = 'central_url';
	const CENTRAL_UN     = 'central_username';
	const CENTRAL_PW     = 'central_password';

	public function register( Container $container ) {
		$container['redmine.central'] = function() {
			return new Central(
				$_POST[self::CENTRAL_URL],
				$_POST[self::CENTRAL_UN],
				$_POST[self::CENTRAL_PW]
			);
		};

		$container['guzzle.requester'] = function () {
			return new Requester();
		};

		$container['toggl.clients'] = function () use ( $container ) {
			return new Clients( $container );
		};

		$container['toggl.projects'] = function () use ( $container ) {
			return new Projects( $container );
		};

		$container['toggl.tags'] = function () use ( $container ) {
			return new Tags( $container );
		};

		$container['toggl.time_entries'] = function () use ( $container ) {
			return new Time_Entries( $container );
		};

		$container['toggl.workspaces'] = function () use ( $container ) {
			return new Workspaces( $container );
		};

		if ( ! isset( $_POST['request'] ) ) {
			return;
		}

		$container['guzzle.requester']->setup( $_POST[ self::TOGGLE_API_KEY ] );

		switch ( (string) $_POST['request'] ) {
			case 'project' :
				$container['toggl.projects']->request();
				break;
			case 'tag' :
				$container['toggl.tags']->request();
				break;
			case 'time' :
				$container['toggl.time_entries']->request();
				break;
			case 'workspace':
				$container['toggl.workspaces']->request();
				break;
		}
	}
}