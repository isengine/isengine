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
$element -> addClass('d-none');

?>
<div class="row">
	<div class="col">
		<?php $element -> print(); ?>
	</div>
</div>