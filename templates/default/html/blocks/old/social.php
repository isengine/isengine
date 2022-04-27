<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<?php Objects::each($view -> get('lang|social'), function($item) { ?>
	<a href="<?= $item['url']; ?>" class=""<?= $item['color'] ? ' style="background-color:' . $item['color'] . '"' : null; ?> target="blank" alt="<?= $item['name']; ?>" title="<?= $item['local'] ? $item['local'] : $item['name']; ?>">
		<i class="<?= $item['class']; ?>" aria-hidden="true"></i>
	</a>
<?php }); ?>