<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

?>

<div class="row align-items-center justify-content-center xs-justify-content-start">
	<div class="col-auto pr-0">
		<?php //$view -> get('block') -> launch('logo:image'); ?>
		<?php $view -> get('block') -> launch('logo:second'); ?>
	</div>
	<div class="col-auto pl-0">
		<?php $view -> get('block') -> launch('nav:menu:multiple'); ?>
	</div>
</div>
