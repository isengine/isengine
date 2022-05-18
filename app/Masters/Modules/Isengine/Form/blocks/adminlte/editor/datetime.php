<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Datetimes;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$name = 'adminlte-form-editor-' . Strings::replace($item['name'], ['[', ']'], '_');

$element->addId($name);

if ($item['value']) {
	//$element->addCustom('value', date('d.m.Y H:i:s', $item['value']));
	$element->addCustom(
		'value',
		Datetimes::convert(
			$item['value'],
			'{abs}',
			'{day}.{month}.{year} {hour}:{min}:{sec}'
		)
	);
}

//System::debug($item);
//echo '<hr>';
//System::debug($element);

?>
<div class="row justify-content-between align-items-center d-table-row">
	<div class="col-auto d-table-cell">
		<label for="<?= $name; ?>" class="col-form-label"><?= $data['title']; ?></label>
	</div>
	<div class="col d-table-cell">
		<?php $element->print(); ?>
	</div>
</div>