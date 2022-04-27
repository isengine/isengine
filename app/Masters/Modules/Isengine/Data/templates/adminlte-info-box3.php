<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

?>
<div class="row">
	<?php Objects::each($this -> getData(), function($item) { ?>
	<div class="col-lg-3 col-6">
		<div class="small-box <?= $item['class']; ?>">
			<div class="inner">
				<h3><?= $item['value']; ?><sup style="font-size: 20px"><?= $item['second']; ?></sup></h3>
				<p><?= $item['name']; ?></p>
			</div>
			<div class="icon">
				<i class="<?= $item['icon']; ?>"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<?php }); ?>
</div>