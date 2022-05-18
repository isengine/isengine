<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$len = Objects::len($this->getData());
$len = $len ? round(12 / $len) : 12;

?>
<!-- Service Area Start Here -->
<section class="service-wrap-layout1 bg-light-primary100">
	<div class="container">
		<div class="row no-gutters service-inner-layout1">
			<?php Objects::each($this->getData(), function($item) use ($len) { ?>
				<div class="single-item col-lg-<?= $len; ?> col-md-6 col-12">
					<div class="service-box-layout1">
						<div class="item-icon">
							<a href="<?= $item['link']; ?>" class="text-white"><i class="<?= $item['icon']; ?>"></i></a>
						</div>
						<h4 class="item-title">
							<a href="<?= $item['link']; ?>"><?= $item['title']; ?></a>
						</h4>
						<?= $item['description']; ?>
					</div>
				</div>
			<?php }); ?>
		</div>
	</div>
</section>
<!-- Service Area End Here -->