<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<ul class="navbar nav m-0 p-0">
	<?php $view -> get('block') -> launch('nav:menu:items'); ?>
</ul>