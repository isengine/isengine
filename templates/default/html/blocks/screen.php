<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\Objects;
use is\Masters\View;

// читаем

$view = View::getInstance();

$view -> get('block') -> launch('screen:offcanvas');
$view -> get('block') -> launch('screen:toast');
$view -> get('block') -> launch('screen:feedback');
$view -> get('block') -> launch('screen:scroll-to-top');
$view -> get('block') -> launch('screen:call');
$view -> get('block') -> launch('screen:bottom');

?>