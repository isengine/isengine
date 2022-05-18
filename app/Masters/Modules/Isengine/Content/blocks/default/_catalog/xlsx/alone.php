<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Helpers\Parser;

use is\Masters\View;

$view = View::getInstance();

$data = $item->getData();

/*
$sets = &$this->settings;
$instance = &$this->instance;

System::debug($item, '!q');
?>
<div class="<?= Strings::join($sets['classes'], ' '); ?>">
	<?= $view->get('lang|title'); ?>
	АДЫН АДЫН САПСЕМ АДЫН!
</div>
*/

?>
<div class="container item" is-name="<?= $data['id']; ?>">

<div class="row">
	<div class="col-12">
		<h3 class="item-title">
			<span is-data="title"><?= $data['title']; ?></span>
		</h3>
	</div>
	<div class="col-12 flex">
		<a href="javascript:void(0);" class="color-gray-8 color-gray-6-hover pr-1">
			<i class="bi bi-star fs-125"></i>
			В избранное
		</a>
		<a href="javascript:void(0);" class="color-gray-8 color-gray-6-hover pr-1">
			<i class="bi bi-bar-chart fs-125"></i>
			Добавить в сравнение
		</a>
	</div>
	<div class="col-12">
		<div class="b-0 bb border-gray-2 pb-05"></div>
	</div>
</div>

<div class="row">
	<div class="col-12 xs-col-6 pt-15 relative">
		
		<?php if ($data['price']['sale'] || $data['special']) { ?>
		<div class="item-badges flex flex-column align-items-end">
			<?php Objects::each($data['special'], function($item){ ?>
				<span class="block mb-025 badge bg-theme"><?= $item; ?></span>
			<?php }); ?>
			<?php if ($data['price']['sale']) { ?>
				<span class="block mb-025 badge bg-second">скидка <?= $data['price']['sale']; ?>%</span>
			<?php } ?>
		</div>
		<?php } ?>
		
		<div class="item-info w-100">
			<div class="item-image" is-data="image">
				<?= $view->get('tvars')->launch($data['image']); ?>
			</div>
		</div>
		
	</div>
	
	<div class="col-12 xs-col-6 pt-15">
		
		<div class="pb-1">
			Это короткое описание данного товара, где рассказывается о его назначении и преимуществах.
		</div>
		
		<div class="pb-1">
			<div class="pb-025 fs-125">
				Характеристики
			</div>
			<?php $array = '{
				"Цвет" : "синий",
				"Размеры" : "3 х 3 см",
				"Вес" : "1 кг"
			}'; ?>
			<?php Objects::each(Parser::fromJson($array), function($item, $key){ ?>
				<div class="pb-025 pr-025">
					<span class="color-gray-6">
						<?= $key; ?>:
					</span>
					<?= $item; ?>
				</div>
			<?php }); ?>
			<div>
				<a href="<?= $view->get('state|url'); ?>#nav-tab" class="color-theme">
					Все характеристики
				</a>
			</div>
		</div>
		
		<div class="b border-gray-2 p-1">
			
			<div class="item-price<?= $data['price']['current'] ? ' mt-auto' : null; ?>">
				<?php if ($data['price']['current']) { ?>
					<span class="item-price__units pr-025">
						Цена:
					</span>
					<span class="item-price__current">
						<span is-data="price"><?= $data['price']['current']; ?></span> ₽</span>
						<?php if ($data['price']['old']) { ?>
							<span class="item-price__old"><s><span is-data="price-old"><?= $data['price']['old']; ?></span> ₽</s></span>
						<?php } ?>
					<span class="item-price__units pl-025">за 1 <span is-data="units"><?= $data['units']; ?></span></span>
				<?php } else { ?>
					<span class="item-price__none block">
						нет в наличии
					</span>
				<?php } ?>
			</div>
				
			<div class="item-cart" data-step="<?= $data['step']; ?>" data-price="<?= $data['price']['current']; ?>" data-price-old="<?= $data['price']['old']; ?>" is-data-from="true">
				<?/*
				<div class="item-cart__block flex justify-content-<?= $data['price']['current'] ? 'between' : 'end'; ?> mt-1">
					<?php if ($data['price']['current']) { ?>
					<a href="" class="item-cart__buy flex-grow-1 btn bg-second fs-125 mr-1">
						<i class="bi bi-cart-plus"></i>
					</a>
					<?php } ?>
					<a href="" class="btn item-cart__icon fs-125">
						<i class="bi bi-star"></i>
					</a>
					<a href="" class="btn item-cart__icon fs-125">
						<i class="bi bi-bar-chart"></i>
					</a>
				</div>
				*/?>
				<?php if ($data['price']['current']) { ?>
					<div class="item-first item-cart__block<?= $data['value'] ? ' none' : null; ?> mt-1">
						<a href="javascript:void(0);" class="item-cart__buy w-100 flex-grow-1 btn bg-second" is-action="buy">
							в корзину
						</a>
					</div>
					<div class="item-second item-cart__block<?= $data['value'] ? null : ' none'; ?> flex justify-content-between mt-1">
						<a href="javascript:void(0);" class="item-cart__button item-cart__dec btn bg-second" is-action="dec">
							-
						</a>
						
						<div class="align-left flex align-items-center">
							<input type="text" name="" id="catalog-current-item" class="item-cart__input b-0 p-0 m-0 ml-05 w-100 align-right align-self-stretch" value="<?= $data['value']; ?>" is-data="value:value" is-action="enter">
							<label class="p-0 m-0 mx-05" for="catalog-current-item" is-data="units"><?= $data['units']; ?></label>
						</div>
						
						<a href="javascript:void(0);" class="item-cart__button item-cart__inc btn bg-second" is-action="inc">
							+
						</a>
					</div>
				<?php } ?>
			</div>
			
		</div>
		
	</div>
	
	<div class="col-12 pt-15">
		
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<button class="nav-link active color-gray-6 color-black-hover" id="nav-tab-1" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
					<i class="bi bi-list-check"></i>
					Характеристики
				</button>
				<button class="nav-link color-gray-6 color-black-hover" id="nav-tab-2" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
					<i class="bi bi-hash"></i>
					Описание
				</button>
				<button class="nav-link color-gray-6 color-black-hover" id="nav-tab-3" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
					<i class="bi bi-chat-right"></i>
					Отзывы
				</button>
			</div>
		</nav>
		<div class="tab-content py-1" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-tab-1">
				Здесь будут полные характеристики
			</div>
			<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
				Здесь будет полное описание
			</div>
			<div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-tab-3">
				Здесь будет список отзывов
			</div>
		</div>
		
	</div>
	
</div>

</div>