<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();
$button = $view->get('lang|this:services:button:more');

?>
<section class="departments-wrap-layout7 bg-light-secondary100">
	<div class="container menu-list-wrapper">
		<div class="section-heading heading-dark text-center heading-layout1">
			<h2><?= $view->get('lang|this:services:title'); ?></h2>
			<p><?= $view->get('lang|this:services:description'); ?></p>
		</div>
		<div class="row menu-list">
			<?php Objects::each($this->getData(), function($item, $key) use ($button) { ?>
				<div class="col-xl-3 col-lg-6 col-md-6 col-12 menu-item<?= $key > 3 ? ' hidden' : null; ?>">
					<div class="departments-box-layout1">
						<div class="item-img">
							<img src="<?= $item['image']; ?>" alt="department" class="img-fluid">
							<div class="item-btn-wrap">
								<a href="<?= $item['link']; ?>" class="item-btn"><?= $button; ?></a>
							</div>
						</div>
						<div class="item-content">
							<h3 class="item-title">
								<a href="<?= $item['link']; ?>"><?= $item['title']; ?></a>
							</h3>
							<ul class="department-info">
								<li><?= $item['description']; ?></li>
							</ul>
						</div>
					</div>
				</div>
			<?php }); ?>
		</div>
		<?php if (Objects::len($this->getData()) > 4) { ?>
		<div class="loadmore loadmore-layout1 margin-t-20" data-count="4">
			<a href="#" class="item-btn"><?= $view->get('lang|this:services:button:loadmore'); ?></a>
		</div>
		<?php } ?>
	</div>
</section>