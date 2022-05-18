<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row align-items-center justify-content-between relative">
    
    <!-- change col-... and align-... -->
    <div class="col-12 xs-col-auto align-center xs-align-left">
        <?php $view->get('block')->launch('logo:multiple'); ?>
    </div>
    
    <!-- change col-... and align-... -->
    <div class="col-12 xs-col flex-grow-6 align-center xs-align-left">
        <?php $view->get('block')->launch('info:description'); ?>
    </div>
    
    <!-- change sm-col-... -->
    <div class="col-12 sm-col-auto flex-grow-0 md-flex-grow-1 mt-1 sm-mt-0">
        <?php $view->get('block')->launch('nav:icons'); ?>
    </div>
    
</div>