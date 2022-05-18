<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$button = $view->get('lang|common:readmore', 'upper');

?>
<?php Objects::each($this->getData(), function($item) use ($button) { ?>
	<div class="col-xl-4 col-lg-6 col-md-6 col-12">
		<div class="departments-box-layout5">
			<div class="item-img">
				<img src="<?= $item['image']; ?>" alt="department" class="img-fluid">
				<div class="item-content">
					<h3 class="item-title title-bar-primary3">
						<a href="<?= $item['link']; ?>"><?= $item['title']; ?></a>
					</h3>
					<p><?= $item['sub']; ?></p>
					<a href="<?= $item['link']; ?>" class="item-btn"><?= $button; ?></a>
				</div>
			</div>
		</div>
	</div>
<?php }); ?>
