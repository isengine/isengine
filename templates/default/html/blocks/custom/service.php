<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>

<h3 class="color-second align-center pb-05">
    Мы предоставляем нашим клиентам
    <br>
    услуги высочайшего уровня
</h3>

<p class="fs-15 align-center">
    <?php $view->get('block')->launch('info:phones'); ?>
</p>

<p class="fs-15 align-center">
    <?php $view->get('block')->launch('info:social'); ?>
</p>
