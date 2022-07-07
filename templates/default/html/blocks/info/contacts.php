<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<?= $view->get('tvars')->launch('{phone|{lang|information:phone:0}:color-second fs-15 lh-15 fw-bold}'); ?>
<br>
<span class="color-gray-6">
    <?= $view->get('tvars')->launch('{email|{lang|information:email:0}:color-gray-6 color-black-hover fs-09}'); ?>
</span>