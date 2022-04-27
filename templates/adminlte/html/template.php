<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

// код

$view -> get('block') -> launch('variables', null, null);

//$view -> get('block') -> launch('items:opening', 'default', null);
$view -> get('block') -> launch('opening', null, null);

$view -> get('block') -> launch('items:routing', 'default', null);

//$view -> get('block') -> launch('items:ending', 'default', null);
$view -> get('block') -> launch('ending', null, null);

?>