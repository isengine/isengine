<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$id = $item[1]['name'];
$options = $item[1]['options'];
$item = $item[0];

$data = $options['data'];
$value = $options['value'] ? $options['value'] : [];

$item->setTag('input');
$item->addClass('form-control');
$item->addCustom('type', 'number');
$item->addCustom('name', $id . '[]');
$item->addCustom('value', $value[0]);

// value записываем в default/placeholder
// в value записываем data, но распарсенный через '_'

$second = $item->copy();
$second->addCustom('value', $value[1]);

?>
<div class="mb-05">
	<div class="color-gray-6 py-05">
		<?= $options['description']; ?>
	</div>
	<div class="input-group">
		<?php $item->print(); ?>
		<span class="input-group-text"> - </span>
		<?php $second->print(); ?>
	</div>
</div>