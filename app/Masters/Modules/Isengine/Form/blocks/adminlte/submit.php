<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

?>
<div class="row">
	<div class="col-8">
	</div>
	<div class="col-4">
		<?php $element->print(); ?>
	</div>
</div>