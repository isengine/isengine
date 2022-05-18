<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

?>
<a class="color-gray-6 color-black-hover" href="<?= $view->get('lang|agency:site'); ?>">
    <?= $view->get('lang|agency:name'); ?>
</a>
<br>
<?= $view->get('lang|agency:version'); ?>
<br>
<?= $view->get('lang|common:ph'); ?>: 
<?= $view->get('tvars')->launch('{phone|{lang|agency:phone}:color-gray-8 color-gray-6-hover}'); ?>
<br>
<?= $view->get('tvars')->launch('{mail|{lang|agency:email}:color-gray-8 color-gray-6-hover}'); ?>
