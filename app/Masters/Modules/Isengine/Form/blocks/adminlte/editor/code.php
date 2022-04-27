<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$name = 'adminlte-form-editor-' . Strings::replace($item['name'], ['[', ']'], '_');

$element -> addId($name);

$element -> addContent($item['value']);
$element -> addCustom('value', null);
$element -> addClass('codemirror');

?>
<div class="row justify-content-between align-items-center px-2">
	<div class="col-12">
		<label for="<?= $name; ?>" class="col-form-label"><?= $data['title']; ?></label>
	</div>
	<div class="col-12">
		<?php $element -> print(); ?>
	</div>
</div>