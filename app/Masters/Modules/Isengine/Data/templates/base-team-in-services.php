<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$button = $view->get('lang|this:team:button:action');

$this->randomData();
$this->reduceData(0, 4);

?>
<div class="item-specialist-wrap">
	<h3 class="item-title title-bar-primary7"><?= $view->get('lang|this:team:title'); ?></h3>
</div>
<div class="row">
	<?php Objects::each($this->getData(), function($item) use ($button) { ?>
	<div class="col-xl-6 col-lg-12 col-12">
		<div class="item-specialist">
			<div class="media media-none--xs row">
				<div class="item-img col-4">
					<img src="<?= $item['image']; ?>" alt="image" class="img-fluid media-img-auto">
				</div>
				<div class="media-body col-8">
					<h4 class="item-title"><a href="<?= $item['link']; ?>"><?= $item['name']; ?></a></h4>
					<span><?= $item['sub']; ?></span>
					<?= $item['description']; ?>
					<a href="/appointment/" class="item-btn"><?= $button; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php }); ?>
</div>