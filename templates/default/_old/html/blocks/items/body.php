<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Config;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$config = Config::getInstance();
$view = View::getInstance();

// код

$class = [
	$view->get('state|template') !== $config->get('default:template') ? $view->get('state|template') : null,
	$view->get('state|page'),
	$view->get('device|type'),
	$view->get('device|os'),
	$view->get('state|settings:classes:body')
];

$class = Objects::add($class, $view->get('special')->search( $view->get('state|page') ));
$class = Strings::join(Objects::unique(Objects::clear($class)), ' ');

$style = $view->get('state|settings:styles:body');

echo '<body' . ($class ? ' class="' . $class . '"' : null) . ($style ? ' style="' . $style . '"' : null) . '>';

unset($class, $style);

?>