<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Components\User;
use is\Masters\View;

$user = User::getInstance();

if ($user -> isset()) {
	$this -> block('default:icons:user');
} else {
	$view = View::getInstance();
	$view -> get('module') -> launch('form', 'default:login');
}

?>