<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$class = ['One', 'Two', 'Three', 'Four', 'Five'];

?>
<div class="panel-group" id="accordion">
	<?php Objects::each($this->getData(), function($item, $key, $pos) use ($class) { ?>
	<div class="panel panel-default">
		<div class="panel-heading<?= $pos === 'first' || $pos === 'alone' ? ' active' : null; ?>">
			<div class="panel-title">
				<a aria-expanded="false" class="accordion-toggle<?= $pos === 'first' || $pos === 'alone' ? null : ' collapsed'; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $class[$key]; ?>"><?= $item['title']; ?></a>
			</div>
		</div>
		<div aria-expanded="false" id="collapse<?= $class[$key]; ?>" role="tabpanel" class="panel-collapse collapse<?= $pos === 'first' || $pos === 'alone' ? ' show' : null; ?>">
			<div class="panel-body">
				<?= $item['description']; ?>
			</div>
		</div>
	</div>
	<?php }); ?>
</div>