<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

?>
<!-- change justify-content-... -->
<div class="row align-items-center justify-content-between relative">
    
    <!-- change or delete block/none -->
    <div class="col-auto md-none">
        <?php $view->get('block')->launch('nav:offcanvas-button'); ?>
    </div>
    <div class="col-auto none md-block">
        <?php $view->get('block')->launch('nav:menu:expanded'); ?>
    </div>
    
    <div class="col-auto">
        <?php $view->get('module')->launch('data', 'default:icons'); ?>
    </div>
    
</div>