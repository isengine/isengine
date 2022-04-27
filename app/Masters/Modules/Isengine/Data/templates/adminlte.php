<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

$view -> get('vars') -> set('adminlte', $this -> getData());

?>