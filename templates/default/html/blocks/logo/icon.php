<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<a href="/" alt="<?= $view->get('lang|title'); ?>" class="mr-05">
    <i class="fs-2 lh-2 align-middle <?= $view->get('lang|icon'); ?>"></i>
</a>
