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

$item->setClass('btn-check');
$item->addCustom('type', 'checkbox');

?>
<div class="mb-05">
	<div class="color-gray-6 py-05">
		<?= $options['description']; ?>
	</div>
	<div class="flex flex-wrap">
		<?php
			Objects::each($value, function($value, $key) use ($item, $id, $data){
				$element = $item->copy();
				$element->setId($id . '-' . $key);
				$element->addCustom('name', $id . '[]');
				$element->addCustom('value', $value);
				$element->addCustom('autocomplete', 'off');
				
				if (
					(System::typeIterable($data) && Objects::match($data, $value))
                    || $data === $value
				) {
					$element->addCustom('checked', 'checked');
				}
		?>
		<div class="m-025">
			<?php $element->print(); ?>
			<label
				class="btn btn-sm btn-outline-primary"
				for="<?= $id . '-' . $key; ?>"
			>
				<?= $value; ?>
			</label>
		</div>
		<?php }); ?>
	</div>
</div>