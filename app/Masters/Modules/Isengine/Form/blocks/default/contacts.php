<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$name = $data['name'];

?>
<div class="mb-05">
	<div>
		<?= $data['description']; ?>
		<?php if ($item['required']){ ?>
		<span class="color-theme">*</span>
		<?php } ?>
	</div>
	<?php $element -> print(); ?>
</div>