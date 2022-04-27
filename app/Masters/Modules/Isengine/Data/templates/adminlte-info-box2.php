<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

?>
<div class="row">
	<?php Objects::each($this -> getData(), function($item) { ?>
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box <?= $item['class']; ?>">
			<span class="info-box-icon"><i class="<?= $item['icon']; ?>"></i></span>
			<div class="info-box-content">
				<span class="info-box-text"><?= $item['name']; ?></span>
				<span class="info-box-number"><?= $item['value']; ?></span>
				<div class="progress">
					<div class="progress-bar" style="width: <?= $item['second']; ?>%"></div>
				</div>
				<span class="progress-description">
					<?= $item['second']; ?>% Increase in 30 Days
				</span>
			</div>
		</div>
	</div>
	<?php }); ?>
</div>