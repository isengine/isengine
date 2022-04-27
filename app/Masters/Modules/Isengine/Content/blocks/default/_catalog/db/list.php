<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

$data = $item -> getData();

//System::debug($item);

if (!$data['price']) {
	return;
}

?>
<div class="col-6 xs-col-4 md-col-3 p-05 item" is-name="<?= $data['id']; ?>">
	<div class="p-1 item-inner flex flex-column justify-content-between">
		
		<div class="item-icons flex flex-column align-items-end">
			<a href="javascript:void(0);" class="item-icons__button fs-125">
				<i class="bi bi-star"></i>
			</a>
			<a href="javascript:void(0);" class="item-icons__button fs-125">
				<i class="bi bi-bar-chart"></i>
			</a>
		</div>
		
		<div class="item-info h-100">
			<a href="<?= $data['link'] ?>" class="item-link flex flex-column h-100" is-data="link:href">
				<div class="item-image" is-data="image">
					<?= $view -> get('tvars') -> launch($data['image']); ?>
				</div>
				<h3 class="h6 item-title">
					<span is-data="title">Модель <?= $data['name']; ?></span>
				</h3>
				<div class="item-price<?= $data['price'] ? ' mt-auto' : null; ?>">
					<?php if ($data['price']) { ?>
						<span class="item-price__current">
							<span is-data="price"><?= $data['price']; ?></span> ₽</span>
						<span class="item-price__units">за упаковку</span>
						<br>
						<span class="item-price__current">
							<span><?= $data['price-one']; ?></span> ₽</span>
						<span class="item-price__units">за пару</span>
					<?php } else { ?>
						<span class="item-price__none block">
							нет в наличии
						</span>
					<?php } ?>
				</div>
			</a>
		</div>
			
		<div class="item-cart" data-step="<?= $data['step']; ?>" data-price="<?= $data['price']; ?>" is-data-from="true">
			<?php if ($data['price']) { ?>
				<div class="item-first item-cart__block<?= $data['value'] ? ' none' : null; ?> mt-1">
					<a href="javascript:void(0);" class="item-cart__buy w-100 flex-grow-1 btn bg-second" is-action="buy">
						в корзину
					</a>
				</div>
				<div class="item-second item-cart__block<?= $data['value'] ? null : ' none'; ?> flex justify-content-between mt-1">
					<a href="javascript:void(0);" class="item-cart__button item-cart__dec btn bg-second" is-action="dec">
						-
					</a>
					<input type="text" name="" class="item-cart__input w-100 mx-1 sm-mx-1 b-0 align-center" value="<?= $data['value']; ?>" is-data="value:value" is-action="enter">
					<a href="javascript:void(0);" class="item-cart__button item-cart__inc btn bg-second" is-action="inc">
						+
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>