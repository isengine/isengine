<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Datetimes;
use is\Masters\View;

$view = View::getInstance();

$view -> get('block') -> launch('documents:agreement');

?>