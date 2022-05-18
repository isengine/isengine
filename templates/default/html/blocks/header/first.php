<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row align-items-center justify-content-between flex-wrap md-flex-nowrap">
    
    <div class="col-auto none md-block flex-shrink-1">
        <?php $view->get('block')->launch('logo:multiple'); ?>
    </div>
    
    <div class="col-auto none md-block">
        <?php $view->get('block')->launch('info:contacts'); ?>
    </div>
    
    <div class="col-12 md-col-auto flex-shrink-0 py-05 md-py-0 lh-12 fs-09">
        <?php //$view->get('block')->launch('info:work'); ?>
        <?php $view->get('block')->launch('custom:points'); ?>
    </div>
    
    <div class="col-12 md-col-auto flex-shrink-6">
        <?php //$view->get('block')->launch('info:address'); ?>
        <?php $view->get('block')->launch('custom:date'); ?>
    </div>
    
</div>