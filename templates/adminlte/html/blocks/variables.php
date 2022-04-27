<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

// читаем

$view = View::getInstance();
$view -> get('module') -> launch('data', 'adminlte');

$route = Strings::join(Objects::unfirst($view -> get('state|route')), ':');
$view -> get('vars') -> set('pagename', $route ? $route : 'index');

?>