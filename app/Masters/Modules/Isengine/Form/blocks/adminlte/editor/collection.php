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

?>
<div class="row justify-content-between align-items-center py-025">
	<div class="col-auto">
		<label for="<?= $name; ?>" class="col-form-label"><?= $data['title']; ?></label>
	</div>
	<div class="col xs-col-auto">
		<?php $element -> print(); ?>
	</div>
</div>