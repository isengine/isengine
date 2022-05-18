<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view->get('block')->launch('custom:line');

?>

<h3 class="color-theme-dark align-center py-15 text-uppercase">
    Новинки
</h3>

<?php $view->get('module')->launch('content', 'default:catalog:last|default:catalog:view:inner'); ?>
