<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance(); 

?>
<?php Objects::each($this -> getData(), function($item) { ?>
	<li><?= $item; ?></li>
<?php }); ?>