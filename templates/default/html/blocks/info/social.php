<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<?php Objects::each($view -> get('lang|social'), function($item, $key, $pos) { ?>
	<a href="<?= $item['url']; ?>" class="color-gray-8 color-gray-6-hover pl-0 pr-05 pr-last" target="blank" alt="<?= $item['name']; ?>" title="<?= $item['name']; ?>">
		<i class="<?= $item['class']; ?>" aria-hidden="true"></i>
	</a>
<?php }); ?>