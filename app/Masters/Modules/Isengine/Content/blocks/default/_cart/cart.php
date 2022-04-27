<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

$data = $item ? $item -> getData() : ['price' => ['current' => true]];
$id = ':' . $this -> settings['id'];
?>
<tr class="item item-delete py-05" is-name="<?= $data['id']; ?>" data-step="<?= $data['step']; ?>" data-price="<?= $data['price']['current']; ?>" data-price-old="<?= $data['price']['old']; ?>" is-data-from="true">
	<td class="align-left">
		<a href="<?= $data['link'] ?>" class="item-link color-gray-8 color-gray-6-hover" is-data="link:href">
			<div class="pl-0 pr-05 item-image block xs-inline-block" is-data="image">
				<?= $view -> get('tvars') -> launch($data['image']); ?>
			</div>
			<span class="item-title" is-data="title">
				<?= $data['title']; ?>
			</span>
		</a>
	</td>
	
	<?php if ($data['price']['current']) { ?>
	
	<td class="item-cart px-1">
		<div class="row justify-content-end">
			
			<a href="javascript:void(0);" class="col-auto mx-025 xs-mx-0 my-0 order-2 xs-order-1 item-cart__button item-cart__dec btn btn-round bg-second" is-action="dec">
				-
			</a>
			
			<div class="col-12 xs-col-auto px-0 order-1 xs-order-2 align-left flex justify-content-end">
				<input type="text" name="" id="<?= Strings::replace($data['id'] . $id, ':', '-'); ?>" class="item-cart__input b-0 px-0 xs-px-025 py-025 xs-py-05 mx-025 align-right" value="<?= $data['value']; ?>" is-data="value:value" is-action="enter">
				<label class="px-0 py-05 ml-0 mr-05" for="<?= Strings::replace($data['id'] . $id, ':', '-'); ?>" is-data="units"><?= $data['units']; ?></label>
			</div>
			
			<a href="javascript:void(0);" class="col-auto mx-025 xs-mx-0 my-0 order-3 item-cart__button item-cart__inc btn btn-round bg-second" is-action="inc">
				+
			</a>
			
		</div>
	</td>
	<td class="item-price align-center">
		<span is-data="sum"><?= $data['price']['current'] * $data['value']; ?></span>&nbsp;₽
		<span class="sum-old color-gray-6 pl-025 block<?= $data['price']['old'] ? null : ' xs-none none'; ?>"><s><span is-data="sum-old"><?= $data['price']['old'] * $data['value']; ?></span>&nbsp;₽</s></span>
	</td>
	<td class="">
		<a href="javascript:void(0);" class="col-auto item-cart__del btn p-0" is-action="del">
			<i class="bi bi-trash"></i>
		</a>
	</td>
	
	<?php } else { ?>
	
	<td class="item-price__none color-gray-6 block" colspan="3">
		нет в наличии
	</td>
	
	<?php } ?>
	
</tr>

