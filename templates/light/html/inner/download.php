<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Helpers\Local;
use is\Components\Display;
use is\Components\Log;
use is\Components\Uri;
use is\Masters\View;

// читаем

$view = View::getInstance();

$view->get('module')->launch('data');

?>
