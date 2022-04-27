<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Masters\View;

// читаем

$view = View::getInstance();

$view -> get('module') -> launch('content', 'default:slider');

?>