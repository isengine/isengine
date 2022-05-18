<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

Objects::each($view->get('lang|information:email'), function ($item, $key, $pos) use ($view) {
    if ($pos !== 'last' && $pos !== 'alone') {
        $item .= ',';
    }
    echo $view->get('tvars')->launch('{mail|' . $item . ':col-auto color-gray-8 color-gray-6-hover pl-0 pr-05 pr-last}');
});
