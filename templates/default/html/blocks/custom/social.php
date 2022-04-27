<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="flex">
<?php Objects::each($view -> get('lang|social'), function($item) { ?>
	<a
		href="<?= $item['url']; ?>"
		class="
			color-gray-8 color-white-hover
			border-gray-8 border-gray-6-hover
			bg-none bg-gray-6-hover
			block align-center radius b
			w-2 h-2 fs-1 lh-2 p-0 ml-0 mr-05 mr-last
		"
		target="blank"
		alt="<?= $item['name']; ?>"
		title="<?= $item['local'] ? $item['local'] : $item['name']; ?>"
	>
		<i class="<?= $item['class']; ?>" aria-hidden="true"></i>
	</a>
<?php }); ?>
</div>