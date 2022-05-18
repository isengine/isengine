<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

?>
<div class="mb-075">
	<div>
		<?= $data['label']; ?>
        <?php if (!empty($data['description'])) { ?>
		<p class="color-gray-6 fs-09 py-0 my-0">
			<?= $data['description']; ?>
		</p>
        <?php }; ?>
	</div>
	<?php $element->print(); ?>
</div>
