<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

Objects::each($this->getData(), function($item) {
?>
	<div class="col-md-6 col-12">
		<div class="about-box-layout4">
			<div class="media">
				<div class="item-icon">
					<a href="<?= $item['link']; ?>"><i class="<?= $item['icon']; ?>"></i></a>
				</div>
				<div class="media-body space-md">
					<h3 class="item-title">
						<a href="<?= $item['link']; ?>" class="text-dark"><?= $item['title']; ?></a>
					</h3>
					<?= $item['description']; ?>
				</div>
			</div>
		</div>
	</div>
<?php
});
?>
