<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<?php //$view -> get('module') -> launch('menu', 'default:nav-header'); ?>
<ul class="nav">
	<?php Objects::each($view -> get('vars|nav:1'), function($item, $key) { ?>
	<li class="nav-item">
		<a class="nav-link lh-1 py-025 px-025 mx-025 color-gray-6 color-black-hover" href="/<?= $key; ?>/"><?=  $item; ?></a>
	</li>
	<?php }, true); ?>
</ul>
