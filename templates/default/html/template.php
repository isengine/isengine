<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view->get('block')->launch('process:cart', null, null);
$view->get('block')->launch('process:nav');
$view->get('block')->launch('process:special');
$view->get('block')->launch('process:catalog');

$view->get('block')->launch('items:opening', 'default', null);

$special = $view->get('vars|special');
$main = !Objects::match($special, 'sections');

if ($main) {
    ?>
    <main class="container">
        <?php
}

if (Objects::match($special, 'breadcrumbs')) {
    $view->get('block')->launch('custom:breadcrumbs', null);
}

$view->get('block')->launch('items:routing', 'default', null);

if ($main) {
    ?>
    </main>
    <?php
}

$view->get('block')->launch('items:ending', 'default', null);

?>
