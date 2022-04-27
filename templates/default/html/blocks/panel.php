<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

?>
<section class="panel at aw my-0 py-0 fs-09 bg-theme z-index-2" id="panel">
	<?php //$view -> get('block') -> launch('alerts'); ?>
	<div class="container py-1 xs-py-075">
		
		<div class="row justify-content-center xs-justify-content-between align-items-center">
			<div class="col-12 xs-col-auto align-center">
				<?php $view -> get('block') -> launch('nav:menu:logo'); ?>
				<?php //$view -> get('block') -> launch('logo:image'); ?>
			</div>
			<div class="col-12 xs-col-auto align-center mt-1 xs-mt-0">
				<?php $view -> get('block') -> launch('nav:contacts'); ?>
				<?php //$view -> get('block') -> launch('nav:buttons'); ?>
				<?php //$view -> get('block') -> launch('nav:menu:multiple'); ?>
			</div>
		</div>
		
	</div>
	<?php //$view -> get('block') -> launch('alerts'); ?>
</section>