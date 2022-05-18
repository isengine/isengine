<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Parser;
use is\Helpers\Paths;
use is\Components\Config;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();
$config = Config::getInstance();

// код

$array = $view->get('state|settings:libraries');

if (!System::typeIterable($array)) { return; }

$print = null;

$reinit = [
	'from' => [
		$config->get('path:vendors'),
		'\\'
	],
	'to' => [
		$config->get('path:site') . 'libraries' . DS,
		'\\'
	],
	'url' => [
		'/libraries/',
		'/'
	]
];

foreach ($array as $key => $item) {
	
	if (!System::typeIterable($item)) {
		continue;
	}
	
	$key = Parser::fromString($key);
	
	// variants:
	// name      vend vers
	// bootstrap twbs 4.0-dev
	// bootstrap twbs
	// bootstrap -    4.0-dev
	// bootstrap
	// не реализована проверка версий!
	
	$from = $key[1] ? $key[1] . DS . $key[0] . DS : null;
	$to = ($key[1] ? $key[1] . DS : null) . $key[0] . DS;
	$url = ($key[1] ? $key[1] . '/' : null) . $key[0] . '/';
	
	foreach ($item as $i) {
		
		$i = Parser::fromString($i);
		
		$file = Objects::last($i, 'value');
		$path = Objects::unlast($i);
		
		$reinit_copy = $reinit;
		$reinit_copy['from'][0] = $from ? $reinit_copy['from'][0] . $from . Strings::join($path, DS) : null;
		$reinit_copy['to'][0] .= $to . Strings::join($path, DS);
		$reinit_copy['url'][0] .= $url . Strings::join($path, '/');
		
		$print .= $view->get('render')->launch('libraries', $file, $reinit_copy) . "\r\n";
		
		unset($reinit_copy, $file, $path);
		
	}
	unset($i, $from, $to, $url);
	
}
unset($key, $item);

?>


<!-- LIBRARIES -->
<?php
echo $print;
unset($array, $print, $reinit);
?>