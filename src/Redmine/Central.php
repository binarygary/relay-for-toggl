<?php

namespace Gary\Relay\Redmine;

use Redmine;

class Central extends Redmine\Client {

	public function __construct( $url, $apikeyOrUsername, $pass = null ) {
		parent::__construct( $url, $apikeyOrUsername, $pass );
	}

}