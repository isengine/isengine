<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<section class="top block fs-075 py-025" id="top">
	<div class="container">
		<div class="row align-items-center">
			<div class="col">
				<?php $view -> get('block') -> launch('nav:structure:line'); ?>
			</div>
			<div class="col-auto">
				<?php $view -> get('block') -> launch('nav:contacts'); ?>
			</div>
		</div>
	</div>
</section>