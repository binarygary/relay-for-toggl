<?php

namespace Gary\Relay\Service_Providers;

use Gary\Relay\Guzzle\Requester;
use Gary\Relay\Toggl\{Clients,Projects,Tags,Time_Entries};
use Pimple\{Container,ServiceProviderInterface};

class Post_Service_Provider implements ServiceProviderInterface {

	public function register( Container $container ) {
		$container['guzzle.requester'] = function () {
			return new Requester();
		};

		$container['toggl.clients'] = function() use ( $container ) {
			return new Clients( $container );
		};

		$container['toggl.projects'] = function() use ( $container ) {
			return new Projects( $container );
		};

		$container['toggl.tags'] = function() use ( $container ) {
			return new Tags( $container );
		};

		$container['toggl.time_entries'] = function() use ( $container ) {
			return new Time_Entries( $container );
		};

		if ( ! isset( $_POST['request'] ) ) {
			return;
		}

		switch ( (string)$_POST['request']) {
			case 'client' :
				$container['toggl.clients']->retrieve();
				break;
			case 'project' :
				$container['toggl.projects']->retrieve();
				break;
			case 'tag' :
				$container['toggl.tags']->retrieve();
				break;
			case 'time' :
				$container['toggl.time_entries']->init();
				break;
		}
	}
}