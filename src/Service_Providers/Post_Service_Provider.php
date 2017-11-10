<?php

namespace Gary\Relay\Service_Providers;

use Gary\Relay\Guzzle\Requester;
use Gary\Relay\Toggl\{Clients,Projects,Tags,Time_Entries};
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class Post_Service_Provider implements ServiceProviderInterface {

	public function register( Container $container ) {
		$container['guzzle.requester'] = function () {
			return new Requester();
		};

		$container['toggl.client'] = function() use ( $container ) {
			return new Clients( $container );
		};

		if ( ! isset( $_POST['request'] ) ) {
			return;
		}

		switch ( $_POST['request']) {
			case 'client' :
				$container['toggl.client']->register();
		}

		add_action( 'admin_menu', function () use ( $container ) {
			$container['options.importsettings']->add_settings_page();
		} );
		add_action( 'admin_init', function () use ( $container ) {
			$container['options.importsettings']->initialize_options();
		} );
	}

}