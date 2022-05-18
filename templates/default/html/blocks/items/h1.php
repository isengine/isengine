<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

$h1 = $view->get('seo|h1');
if (!$h1) {
    return;
}

$class = $view->get('state|settings:classes:h1');
$style = $view->get('state|settings:styles:h1');

if ($h1 === true) {
    $seo = $view->get('seo|title');
    $lang = $view->get('lang|title');
    $h1 = $seo . ($seo !== $lang ? ' ' . $lang : null);
    unset($seo, $lang);
}

echo '<h1' . ($class ? ' class="' . $class . '"' : null) . ($style ? ' style="' . $style . '"' : null) . '>' . $h1 . '</h1>';

unset($class, $style, $h1);
