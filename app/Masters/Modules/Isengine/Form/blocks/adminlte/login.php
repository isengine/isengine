<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$element->addCustom('placeholder', $data['description']);

?>
<div class="input-group mb-3">
	<?php $element->print(); ?>
	<div class="input-group-append">
		<div class="input-group-text">
			<span class="<?= $data['icon']; ?>"></span>
		</div>
	</div>
</div>
