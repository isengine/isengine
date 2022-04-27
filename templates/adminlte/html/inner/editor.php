<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view -> get('block') -> launch('editor:init');
$view -> get('block') -> launch('editor:settings');

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="sticky-top mb-3">
				<?php $view -> get('block') -> launch('editor:form'); ?>
			</div>
		</div>
	</div>
</div>