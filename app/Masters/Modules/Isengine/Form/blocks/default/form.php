<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$data = $item[1]['options'];
$item = $item[0];

?>
<div class="mb-1">
	<?php $item->print(); ?>
	<div class="form-text"><?= $data['description']; ?></div>
</div>