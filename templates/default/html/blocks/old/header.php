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
<header class="header">

    <section class="menu">
        <div class="container">
            <div class="row">
                <?php $view->get('block')->launch('menu', 'default'); ?>
            </div>
        </div>
    </section>

    <section class="box">
        <div class="container">
            <div class="row">
                <?php $view->get('block')->launch('box', 'default'); ?>
            </div>
        </div>
    </section>

</header>

<section class="subscribe">
    <div class="container">
        <div class="row">
            <?php $view->get('block')->launch('subscribe', 'default'); ?>
        </div>
    </div>
</section>