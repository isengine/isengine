<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Components\Globals;

$data = $item ? $item -> getData() : ['price' => true];

$globals = Globals::getInstance();

$total = $globals -> get('total');
$total += $data['total'];
$globals -> set('total', $total);
$globals -> set('order', [$data['name'] => $data]);

?>