<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row fs-09 lh-12">
	
	<div class="col-12 xs-col-6 md-col-12 mb-05 align-left md-align-right">
		<div class="block">
			<span class="color-gray-6">
				Мин. сумма заказа
			</span>
			<strong>
				500&nbsp;₽
			</strong>
		</div>
		<div class="block">
			<span class="color-gray-6">
				Стоимость доставки
			</span>
			<strong>
				0&nbsp;₽
			</strong>
		</div>
	</div>
	
	<div class="col-12 xs-col-6 md-col-12 mb-05 flex align-items-center justify-content-start xs-justify-content-end">
		<div class="block radius-1 bg-theme align-center w-25 h-25 mr-05">
			<?php
				$t = time();
				if (date('H') > 13) {
					$t += 43200;
				}
			?>
			<span class="fs-15 lh-15 fw-bold block">
				<?= date('d', $t); ?>
			</span>
			<span class="fs-08 lh-08 fw-bold block">
				<?= $view -> get('lang|datetime:n:' . date('n', $t)); ?>
			</span>
		</div>
		<div class="block align-left color-gray-6">
			Ближайшая доставка
			<strong class="block color-gray-8">
				<?= $view -> get('lang|information:work:1'); ?>
			</strong>
		</div>
	</div>
	
</div>