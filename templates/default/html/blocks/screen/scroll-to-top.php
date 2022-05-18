<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<a href="<?= $view->get('state|url'); ?>#"
    id="scroll-to-top" class="
        scroll-to-top
        radius-1 bg-theme
        fixed
        z-index-3
        fs-1
        lh-2
        h-2
        w-2
        align-center
    "
>
    <i class="bi-chevron-up"></i>
</a>
