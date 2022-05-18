<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$nav = $view->get('state|structure');
$lang = $view->get('lang|nav');

?>
<ul class="nav">
    <?php Objects::each($nav, function ($item, $key) use ($lang) { ?>
    <li class="nav-item">
        <a class="nav-link color-gray-8 color-theme-hover p-0 pr-05 sm-py-05 sm-px-1" href="/<?= $key; ?>/"><?= $lang[$key]; ?></a>
    </li>
    <?php }, true); ?>
</ul>
