<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance();

?>
<section class="departments-wrap-layout6 bg-light-secondary100">
	<div class="container">
		<div class="row">
			<div class="departments-box-layout6 col-xl-4 d-none d-xl-block">
				<div class="item-img">
					<img src="/img/services/title.png" alt="department" class="img-fluid">
				</div>
			</div>
			<div class="col-xl-8 col-12">
				<div class="departments-box-layout7">
					<div class="section-title">
						<h2 class="title"><?= $view->get('lang|this:services:title'); ?></h2>
						<div class="sub-title"><?= $view->get('lang|this:services:description'); ?></div>
					</div>
					<div class="row gutters-5">
						<?php Objects::each($this->getData(), function($item) { ?>
							<div class="col-lg-3 col-md-6 col-sm-6 col-12">
								<div class="single-box">
									<a href="<?= $item['link']; ?>">
										<i class="<?= $item['icon']; ?>"></i>
									</a>
									<p>
										<a href="<?= $item['link']; ?>"><?= $item['title']; ?></a>
									</p>
								</div>
							</div>
						<?php }); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>