<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row flex-column sm-flex-row align-items-center xs-align-items-end">
	<div class="col-auto pl-0">
		<?php $view -> get('block') -> launch('info:feedback'); ?>
	</div>
	<div class="col-auto pl-0">
		<?php $view -> get('block') -> launch('info:phones'); ?>
	</div>
	<div class="col-auto pl-0">
		<?php $view -> get('block') -> launch('info:social'); ?>
	</div>
</div>