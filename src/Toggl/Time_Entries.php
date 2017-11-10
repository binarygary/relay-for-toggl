<?php

namespace Gary\Relay\Toggl;

class Time_Entries extends Request {

	public function init() {
		switch ( (string) $_POST['action'] ) {
			case 'start':
				$this->start_clock();
				break;
		}
	}

	public function start_clock() {

	}

}