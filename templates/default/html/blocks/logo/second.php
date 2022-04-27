<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<a href="/" class="mr-05">
	<img class="h-25 width-max-100 xs-w-auto" src="<?= $view -> get('lang|logo:1'); ?>" alt="<?= $view -> get('lang|title'); ?>">
</a>
