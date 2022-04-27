<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$nav = $view -> get('vars|nav:0');

?>
<!--<ul class="nav flex-row sm-flex-column aw ah sm-mx-1">-->
<ul class="nav flex-row sm-flex-column sm-mx-1">
	<? /*
	<li class="nav-item">
		<span class="lh-1 py-025 pl-0 sm-pl-05 pr-05">
			Меню <?= $view -> get('lang|common:menu'); ?>
		</span>
	</li>
	*/ ?>
	<?php Objects::each($nav, function($item, $key) { ?>
	<li class="nav-item">
		<a class="nav-link lh-1 py-025 pl-0 sm-pl-05 pr-05 color-gray-6 color-black-hover" href="/<?= $key; ?>/"><?=  $item; ?></a>
	</li>
	<?php }, true); ?>
</ul>
