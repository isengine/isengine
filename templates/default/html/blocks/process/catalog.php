<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

if (Objects::match($view -> get('vars|special'), 'catalog')) {
	// объединяем информацию из двух баз данных
	$view -> get('module') -> launch('content', 'default:catalog:xlsx|default:catalog:combine');
}

?>