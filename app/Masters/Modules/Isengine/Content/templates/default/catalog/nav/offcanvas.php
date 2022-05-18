<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

//$this->data->map->parents['catalog'] = [
//  'a' => [
//      'a-1' => [
//          'a-1-1' => null,
//          'a-1-2' => null,
//          'a-1-3' => null
//      ],
//      'a-2' => null,
//      'a-3' => null
//  ],
//  'b' => null,
//  'c' => [
//      'c-1' => [
//          'c-1-2' => [
//              'c-1-2-3' => [
//                  'c-1-2-3-4' => null
//              ]
//          ]
//      ]
//  ],
//  'd' => [
//      'a-1' => null,
//      'a-2' => null,
//      'a-3' => null
//  ]
//];

?>
<div class="row accordion sm-pl-05" id="accordionNav">
    <div class="col-12 block sm-none">
        <?php
            // Каталог для мобильной версии, слитый вместе
            //require 'offcanvas-mobile.php';
            $this->block('default:catalog:offcanvas:mobile');
        ?>
    </div>
    <div class="col-auto none sm-block">
        <?php
            // Каталог для десктопной версии
            // отдельно элементы меню верхнего уровня
            //require 'offcanvas-first.php';
            $this->block('default:catalog:offcanvas:first');
        ?>
    </div>
    <div class="col none sm-block col-double">
        <?php
            // Каталог для десктопной версии
            // отдельно вложенные элементы двух уровней
            //require 'offcanvas-second.php';
            $this->block('default:catalog:offcanvas:second');
        ?>
    </div>
</div>
