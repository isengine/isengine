<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$data = '[
	"Популярное",
	"Новинки",
	"Хиты продаж"
]';

?>

<div id="list-collapse" class="mb-3">

<div class="list-collapse-buttons align-center mb-3">
	<?php Objects::each(json_decode($data, true), function($item, $key){ ?>
	<a
		class="btn bg-theme me-2<?= $key ? ' collapsed' : null; ?>"
		data-bs-toggle="collapse"
		href="#list-collapse-<?= $key; ?>"
		role="button"
		aria-expanded="true"
		aria-controls="list-collapse-<?= $key; ?>"
	>
		<?= $item; ?>
	</a>
	<?php }); ?>
</div>

<?php Objects::each(json_decode($data, true), function($item, $key) use ($view) { ?>
<div class="collapse multi-collapse<?= $key ? null : ' show'; ?>" id="list-collapse-<?= $key; ?>" data-bs-parent="#list-collapse">
	<div class="row">
		<div class="col">
			<?php $view -> get('block') -> launch('custom:list-items'); ?>
		</div>
	</div>
</div>
<?php }); ?>

</div>
