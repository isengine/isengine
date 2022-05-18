<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>

<section class="offcanvas offcanvas-start width-100 md-width-75" tabindex="-1" id="offcanvasCatalog" aria-labelledby="offcanvasCatalogLabel">
    <div class="offcanvas-header py-1 sm-pl-15">
        <h5 class="offcanvas-title" id="offcanvasCatalogLabel">
            <?php $view->get('block')->launch('logo:image'); ?>
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a href="/catalog/" class="h5 inline-block py-05 sm-pl-1 pr-15 color-gray-8 color-gray-6-hover">
            Каталог
        </a>
        <?php
            $view->get('module')->launch('content', 'default:catalog:inner|default:catalog:nav:offcanvas');
            //$view->get('module')->launch('data', 'default:catalog|default:catalog:offcanvas');
        ?>
        <h5 class="block py-05 sm-pl-1 mt-15 color-gray-8">
            Меню
        </h5>
        <?php $view->get('block')->launch('nav:menu:offcanvas'); ?>
        
        <?= $view->get('tvars')->launch('{phone|{lang|information:phone:0}:h3 block py-05 sm-pl-1 mt-15 mb-0 color-gray-8 color-theme-hover}'); ?>
        
        <div class="sm-pl-1 fs-15">
            <?php $view->get('block')->launch('info:social'); ?>
        </div>
        
        <div class="sm-pl-1 mt-025">
            <?php $view->get('block')->launch('info:feedback'); ?>
        </div>
        
        <div class="sm-pl-1 my-15 copyright">
            <p>
                <?= $view->get('lang|title'); ?>
                <br>
                <?= $view->get('lang|description'); ?>
            </p>
            <p>
                <?php $view->get('block')->launch('info:copyright'); ?>
            </p>
        </div>
        
    </div>
</section>
