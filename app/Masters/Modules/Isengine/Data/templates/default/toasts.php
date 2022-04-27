<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

?>
<div class="toast-container fixed at ar p-1 z-index-2">
	
	<div class="toast bg-white toast-template none" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<div class="bd-placeholder-img radius-1 mr-05 toast-icon w-125 h-125 bg-theme" aria-hidden="true"></div>
			<strong class="me-auto toast-title"></strong>
			<small class="text-muted toast-datetime"></small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
		</div>
	</div>
	
	<?php Objects::each($this -> getData(), function($item, $key) { ?>
	<div class="toast bg-white" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<div class="bd-placeholder-img radius-1 mr-05 toast-icon w-125 h-125 bg-second" aria-hidden="true"<?= $item['color'] ? ' style="background-color: ' . $item['color'] . '"' : null; ?>></div>
			<strong class="me-auto toast-title"><?= $item['title']; ?></strong>
			<small class="text-muted toast-datetime"><?= $item['time']; ?></small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			<?= $item['message']; ?>
		</div>
	</div>
	<?php }); ?>
</div>