<?php

namespace Gary\Relay;
use Pimple;

require_once ( __DIR__ ) . '/vendor/autoload.php';

function relay() {
	return \Gary\Relay\Core::instance( new Pimple\Container( [ 'plugin_file' => __FILE__ ]) );
}

relay()->init();
