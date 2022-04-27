<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$data = '[
	{
		"icon" : "bi-clock",
		"title" : "Работаем 24/7",
		"description" : "Мы готовы принимать заказы и обрабатывать заявки в любое время суток"
	},
	{
		"icon" : "bi-globe",
		"title" : "По всей России",
		"description" : "Широкая сеть пунктов выдачи по всей России, а также в странах СНГ"
	},
	{
		"icon" : "bi-truck",
		"title" : "Быстрая доставка",
		"description" : "Высокая скорость доставки и отслеживание в режиме реального времени"
	},
	{
		"icon" : "bi-box",
		"title" : "20 000 ₽",
		"description" : "Минимальная сумма заказа, рассчитанная от небольшой партии товара"
	}
]';

?>

<div class="row">
	<?php Objects::each(json_decode($data, true), function($item){ ?>
	<div class="col-12 xs-col-6 md-col-3">
		<table>
			<tr style="vertical-align: top;">
				<td>
					<i class="<?= $item['icon']; ?> fs-15 pr-05 color-contrast"></i>
				</td>
				<td>
					<p class="fs-15 inline color-contrast">
						<?= $item['title']; ?>
					</p>
					<p class="d-block color-white">
						<?= $item['description']; ?>
					</p>
				</td>
			</tr>
		</table>
	</div>
	<?php }); ?>
</div>
