<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Config;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

// код

$view -> get('module') -> launch('data', 'cookie', null, null);
//$view -> get('module') -> launch('data', 'modal', null, null);

?>