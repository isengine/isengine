<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="relative">
    <div class="container py-6 align-center sm-align-right">
        <div class="fs-25 lh-3 xs-fs-3 xs-lh-35 sm-fs-4 sm-lh-45 fw-bold text-uppercase color-white"><?= $view->get('lang|description'); ?></div>
        <a class="btn bg-second mt-2 p-1 text-uppercase" href="#"><?= $view->get('lang|calltoaction'); ?></a>
    </div>
    <div class="z-index-last absolute aw ah align-bg-cover" style="background-image: url('<?= $view->get('lang|image'); ?>');">
        <div class="bg-black relative width-100 height-100 opacity-25">
        </div>
    </div>
</div>
