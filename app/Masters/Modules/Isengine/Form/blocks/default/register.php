<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$name = 'ehop-form-login-' . $item['name'];

$element -> addId($name);

?>
<div class="mb-05">
	<div>
		<?= $data['label']; ?>
		<span class="color-gray-6">
			(<?= $data['description']; ?>)
		</span>
	</div>
	<?php $element -> print(); ?>
</div>
