<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$name = 'form-login-' . $item['name'];

$element->addId($name);

?>
<div class="mb-05">
	<div class="form-check">
		<?php $element->print(); ?>
		<label class="form-check-label <?= $name; ?>-label" for="<?= $name; ?>">
			<?= $data['label']; ?>
			<?= $data['description']; ?>
		</label>
	</div>
</div>
