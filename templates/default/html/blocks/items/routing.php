<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Components\Router;
use is\Components\Config;
use is\Masters\View;

$router = Router::getInstance();
$view = View::getInstance();

$route = Strings::join($view->get('state|path-to-page'), DS);

if (!$route) {
    $config = Config::getInstance();
    $index = $config->get('router:index');
    $route = $index ? $index : 'index';
    unset($config, $index);
}

if (!$view->get('page')->launch($route . '.' . $view->get('state|lang'))) {
    $view->get('page')->launch($route);
}
