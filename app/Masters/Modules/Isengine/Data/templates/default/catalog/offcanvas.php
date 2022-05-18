<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row accordion sm-pl-05" id="accordionNav">
    <div class="col-12 block sm-none">
        <?php
            // Каталог для мобильной версии, слитый вместе
            //require 'offcanvas-mobile.php';
            $this->block('default:offcanvas:mobile');
        ?>
    </div>
    <div class="col-auto none sm-block">
        <?php
            // Каталог для десктопной версии
            // отдельно элементы меню верхнего уровня
            //require 'offcanvas-first.php';
            $this->block('default:offcanvas:first');
        ?>
    </div>
    <div class="col none sm-block column-2">
        <?php
            // Каталог для десктопной версии
            // отдельно вложенные элементы двух уровней
            //require 'offcanvas-second.php';
            $this->block('default:offcanvas:second');
        ?>
    </div>
</div>
