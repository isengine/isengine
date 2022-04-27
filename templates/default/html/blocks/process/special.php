<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

$page = $view -> get('state|route-string');

if (!$page) {
	$page = 'index';
}

$special = [];

Objects::each($view -> get('state|settings:special'), function($item, $key) use ($page, &$special) {
	if (Objects::match($item, $page)) {
		$special[] = $key;
	}
});

$view -> get('vars') -> set('special', $special);

?>