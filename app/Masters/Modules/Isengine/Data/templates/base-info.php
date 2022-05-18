<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$len = Objects::len($this->getData());
$len = round(12 / $len);
if ($len < 1) {
	$len = 12;
} elseif ($len > 4) {
	$len = 4;
}

?>
<!-- About Area Start Here -->
<section class="about-wrap-layout2">
	<div class="container">
		<div class="row">
			<?php Objects::each($this->getData(), function($item) use ($len) { ?>
				<div class="col-md-<?= $len; ?> col-12">
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
			<?php }); ?>
		</div>
	</div>
</section>
<!-- About Area End Here -->