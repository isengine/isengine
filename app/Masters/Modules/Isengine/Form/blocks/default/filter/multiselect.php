<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$options = $item[1]['options'];
$item = $item[0];

$data = $options['data'];
$value = $options['value'] ? $options['value'] : [];

$item -> setTag('select');
$item -> setClass('form-select');
$item -> addCustom('multiple', 'multiple');

$content = null;
Objects::each($value, function($value) use ($data, &$content){
	$content .= '<option value="' . $value . '"' . ($data === $value ? ' selected' : null) . '>' . $value . '</option>';
});

$item -> setContent($content);

?>
<div class="mb-05">
	<div class="color-gray-6 py-05">
		<?= $options['description']; ?>
	</div>
	<?php $item -> print(); ?>
</div>
