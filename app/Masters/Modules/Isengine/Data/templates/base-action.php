<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$len = Objects::len($this->getData());
$len = $len ? round(12 / $len) : 12;

?>
<section class="call-to-action-wrap-layout3">
	<div class="container">
		<div class="row">
			<?php Objects::each($this->getData(), function($item) use ($len) { ?>
				<div class="col-lg-<?= $len; ?> col-12">
					<div class="call-to-action-box-layout3">
						<div class="single-item">
							<a href="<?= $item['link']; ?>"><i class="<?= $item['icon']; ?>"></i> <?= $item['title']; ?></a>
						</div>
					</div>
				</div>
			<?php }); ?>
		</div>
	</div>
</section>