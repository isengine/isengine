<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>

<h3 class="color-second align-center mt-3 mb-2 text-uppercase">
	НАШ АДРЕС
</h3>

<p class="fs-1 align-center mb-2">
	<?= $view -> get('lang|information:address'); ?>
</p>

<div style="height: 500px;">
	<?php $view -> get('module') -> launch('map', 'default:map'); ?>
</div>

