<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$name = 'adminlte-form-editor-' . Strings::replace($item['name'], ['[', ']'], '_');

$element->addId($name);
$element->addCustom('type', 'adminlte-form-editor-array');

?>
<div class="row justify-content-between align-items-center d-table-row">
	<div class="col-auto d-table-cell">
		<label for="<?= $name; ?>" class="col-form-label"><?= $data['title']; ?></label>
	</div>
	<div class="col d-table-cell">
		<?php $element->print(); ?>
		<button for="<?= $name; ?>" class="btn btn-secondary btn-sm mt-1 adminlte-form-editor-array-add" type="button">
			<i class="fas fa-plus"></i>
			Добавить
		</button>
	</div>
</div>