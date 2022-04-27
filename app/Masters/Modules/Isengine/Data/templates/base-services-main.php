<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$button = $view -> get('lang|common:readmore', 'upper');

?>
<?php Objects::each($this -> getData(), function($item) use ($button) { ?>
	<div class="col-xl-3 col-lg-4 col-md-6 col-12 menu-item">
		<div class="departments-box-layout1">
			<div class="item-img">
				<img src="<?= $item['image']; ?>" alt="service" class="img-fluid">
				<div class="item-btn-wrap">
					<a href="<?= $item['link']; ?>" class="item-btn"><?= $button; ?></a>
				</div>
			</div>
			<div class="item-content">
				<h3 class="item-title">
					<a href="<?= $item['link']; ?>"><?= $item['title']; ?></a>
				</h3>
				<ul class="department-info">
					<li>
						<i class="<?= $item['number']['icon']; ?>"></i>
						<?= $item['number']['title']; ?>
						<span><?= $item['number']['value']; ?></span>
					</li>
				</ul>
			</div>
		</div>
	</div>
<?php }); ?>
