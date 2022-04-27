<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<a href="/">
	<img class="none md-inline-block h-auto xs-h-5 h-max-5 width-max-100" src="<?= $view -> get('lang|logo:0'); ?>" alt="<?= $view -> get('lang|title'); ?>">
	<img class="inline-block md-none h-auto xs-h-5 h-max-5 width-max-100" src="<?= $view -> get('lang|logo:1'); ?>" alt="<?= $view -> get('lang|title'); ?>">
</a>
