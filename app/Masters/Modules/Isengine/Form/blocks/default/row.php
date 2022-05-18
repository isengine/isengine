<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$data = $item[1]['options'];
$item = $item[0];

?>
<?php if ($data['label']) { ?>
<div class="mb-1 row">
	<div class="col-12">
		<label for="form-order-name" class="form-label"><?= $data['label']; ?></label>
	</div>
<?php } ?>

<div class="col-6">
	<div class="row align-items-baseline">
		<div class="col-auto w-auto">
			<div class="form-text fs-1"><?= $data['description']; ?></div>
		</div>
		<div class="col pl-0">
			<?php $item->print(); ?>
		</div>
	</div>
</div>

<?php if (!$data['label']) { ?>
</div>
<?php } ?>
