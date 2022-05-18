<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

Objects::each($view->get('vars|special'), function ($item) use ($view) {
    $view->get('block')->launch('scripts:' . $item);
});
