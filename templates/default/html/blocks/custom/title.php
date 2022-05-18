<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

if ($view->get('state|type') === 'content') {
    return;
}

?>
<h1 class="mb-1 pb-1 b-0 bb border-second">
    <?= $view->get('lang|nav:' . $view->get('state|page')); ?>  
</h1>
