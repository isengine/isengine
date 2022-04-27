<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<span class="color-black fs-09">
	<?= $view -> get('lang|description'); ?>
</span>