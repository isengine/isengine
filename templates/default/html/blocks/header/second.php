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
    
    <div class="col-12 md-col order-1">
        <div class="row align-items-center justify-content-between flex-nowrap">
            <div class="col-auto">
                <?php $view->get('block')->launch('nav:catalog-button'); ?>
            </div>
            <div class="col md-px-0">
                <?php $view->get('block')->launch('info:search'); ?>
            </div>
        </div>
    </div>
    
    <div class="col-12 md-col-auto md-order-1 my-1">
        <div class="row align-items-center justify-content-between mx-auto">
            <div class="col-auto block md-none pl-0">
                <?php $view->get('block')->launch('logo:multiple'); ?>
            </div>
            <div class="col px-0">
                <?php $view->get('block')->launch('info:location'); ?>
            </div>
            <div class="col-auto sm-pr-0">
                <?php $view->get('module')->launch('data', 'default:icons'); ?>
            </div>
        </div>
    </div>
    
</div>