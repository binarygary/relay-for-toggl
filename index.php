<?php

namespace Gary\Relay;
use Pimple;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token,  X-CSRF-Token');

require_once ( __DIR__ ) . '/vendor/autoload.php';

function relay() {
	return \Gary\Relay\Core::instance( new Pimple\Container( [ 'plugin_file' => __FILE__ ]) );
}

relay()->init();
