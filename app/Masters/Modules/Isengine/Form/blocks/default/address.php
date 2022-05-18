<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$data = $item[1]['options'];
$item = $item[0];

?>
<div class="mb-1">
	<label for="form-order-name" class="form-label"><?= $data['label']; ?></label>
	<a class="ml-05 color-second" data-bs-toggle="modal" href="#mapModal" role="button">
		<?= $data['button']; ?>
	</a>
	<?php $item->print(); ?>
	<div class="form-text"><?= $data['description']; ?></div>
</div>
