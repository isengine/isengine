<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

$button = $view -> get('lang|this:plans:button');

?>
<div class="row gutters-20">
	<?php Objects::each($this -> getData(), function($item) use ($button) { ?>
		<div class="col-xl-3 col-lg-6 col-md-6 col-12">
			<div class="pricing-box-layout1">
				<h3><?= $item['title']; ?></h3>
				<div class="pricing title-bar-primary6">
					<span class="currency"><?= $item['currency']; ?></span>
					<span class="amount"><?= $item['price']; ?></span>
				</div>
				<div class="box-content">
					<ul>
						<?php Objects::each($item['options'], function($i) { ?>
							<li><?= $i; ?></li>
						<?php }); ?>
					</ul>
					<a href="#" class="item-btn"><?= $button; ?></a>
				</div>
			</div>
		</div>
	<?php }); ?>
</div>