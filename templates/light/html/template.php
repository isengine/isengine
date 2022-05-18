<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

// код

$view->get('block')->launch('items:opening', 'default', null);
?>
<main class="">
<?php $view->get('block')->launch('items:routing', 'default', null); ?>
</main>
<?php $view->get('block')->launch('items:ending', 'default', null); ?>
