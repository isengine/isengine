<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

$view = View::getInstance(); 

?>
<section class="features-wrap-layout1">
	<div class="features-box-layout2 d-lg-flex">
		<div class="item-img">
			<img src="/img/progress/title.jpg" class="img-responsive" alt="progress">
		</div>
		<div class="item-content d-flex align-items-center">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="item-content-inner inner-title-dark">
							<h2 class="item-title"><?= $view -> get('lang|this:progress:title'); ?></h2>
							<p><?= $view -> get('lang|this:progress:description'); ?></p>
							<div class="skill-layout1">
								<?php Objects::each($this -> getData(), function($item, $key) { ?>
									<div class="progress">
										<div class="lead"><?= $item['title']; ?></div>
										<div style="width: <?= $item['value']; ?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 0.<?= $key++; ?>s;" data-progress="<?= $item['value']; ?>%" class="progress-bar progress-bar-striped wow fadeInLeft animated">
											<span><span data-num="<?= $item['value']; ?>" class="counting-text counter"><?= $item['value']; ?></span>%</span>
										</div>
									</div>
								<?php }); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>