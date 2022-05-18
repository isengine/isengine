<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<a class="btn p-0 m-0 fs-2 lh-1" href="#" role="button" id="navbarToggler" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
    <i class="bi bi-list"></i>
</a>
<div class="dropdown-menu p-0" aria-labelledby="navbarToggler">
    <ul class="navbar-nav m-0 color-black">
        <?php $view->get('block')->launch('nav:menu:items'); ?>
    </ul>
</div>
