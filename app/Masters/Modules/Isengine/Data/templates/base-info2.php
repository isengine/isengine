<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$len = Objects::len($this -> getData());
$len = $len ? round(12 / $len) : 12;

?>
<!-- Action Area Start Here -->
<section class="call-to-action-wrap-layout5 bg-light-secondary100">
	<div class="container">
		<div class="row">
			<?php Objects::each($this -> getData(), function($item) use ($len) { ?>
				<div class="col-md-<?= $len; ?> col-12 single-item">
					<div class="call-to-action-box-layout5">
						<div class="media media-none-md">
							<i class="<?= $item['icon']; ?>"></i>
							<div class="media-body box-content">
								<h4 class="item-title"><?= $item['title']; ?></h4>
								<?= $item['description']; ?>
							</div>
						</div>
					</div>
				</div>
			<?php }); ?>
		</div>
	</div>
</section>
<!-- Action Area End Here -->