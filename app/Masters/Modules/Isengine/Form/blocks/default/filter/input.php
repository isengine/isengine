<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$options = $item[1]['options'];
$item = $item[0];

$data = $options['data'];

$item->setTag('input');
$item->setClass('form-control');
$item->addCustom('value', $data);

?>
<div class="mb-05">
	<div class="color-gray-6 py-05">
		<?= $options['description']; ?>
	</div>
	<?php $item->print(); ?>
</div>