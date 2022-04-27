<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view -> get('module') -> launch('breadcrumbs', 'default:breadcrumbs', null);
$view -> get('block') -> launch('custom:title', null, null);

?>