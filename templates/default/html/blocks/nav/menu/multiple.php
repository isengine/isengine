<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="none md-block">
	<?php $view -> get('block') -> launch('nav:menu:expanded'); ?>
</div>
<div class="block md-none">
	<?php $view -> get('block') -> launch('nav:menu:collapsed'); ?>
</div>