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

$settings = '{
	"folder" : "' . $data['images']['link'] . '",
	"gallery" : {
		"enable" : true,
		"classes" : {
			"container" : "",
			"item" : "slider-item"
		}
	},
	"slider" : {
		"enable" : true,
		"classes" : {
			"container" : "slider-container row flex-nowrap",
			"item" : "slider-item",
			"image" : "slider-image width-100 width-max-100"
		},
		"settings" : {
			"arrows" : false,
			"dots" : false,
			"infinite" : true,
			"slidesToShow" : 1,
			"slidesToScroll" : 1
		}
	},
	"slideshow" : {
		"enable" : true,
		"lazy" : false,
		"classes" : {
			"container" : "slideshow-container relative row flex-nowrap mt-2 pb-3",
			"item" : "slideshow-item px-025",
			"image" : "slideshow-image w-auto h-max-5"
		},
		"settings" : {
			"arrows" : false,
			"dots" : true,
			"infinite" : true,
			"slidesToShow" : 3,
			"slidesToScroll" : 1
		}
	}
}';
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
	<div class="col-12 sm-col-6 pt-15 relative">
		
		<div class="container-fill">
			<?//= $view->get('tvars')->launch($data['image']); ?>
			<?php $view->get('module')->launch('media', null, $settings); ?>
		</div>
		
	</div>
	
	<div class="col-12 sm-col-6 pt-15">
		
		<div class="pb-1">
			<?= $data['description']; ?>
		</div>
		
		<div class="pb-1">
			<div class="pb-025 fs-125">
				Характеристики
			</div>
			<?php $array = '{
				"Артикул" : "artucul",
				"Пол" : "sex",
				"Цвет" : "color",
				"Размеры" : "size",
				"Полнота" : "wide",
				"Сезон" : "season",
				"Материал" : "matherial",
				"Материал верха" : "matherial-top"
			}'; ?>
			<?php Objects::each(Parser::fromJson($array), function($item, $key) use ($data) { ?>
				<div class="pb-025 pr-025">
					<span class="color-gray-6">
						<?= $key; ?>:
					</span>
					<?= $data[$item]; ?>
				</div>
			<?php }); ?>
			<div>
				<a href="<?= $view->get('state|url'); ?>#nav-tab" class="color-theme">
					Все характеристики
				</a>
			</div>
		</div>
		
		<div class="b border-gray-2 p-1">
			
			<div class="item-price<?= $data['price'] ? ' mt-auto' : null; ?>">
				<?php if ($data['price']) { ?>
					<span class="item-price__units pr-025">
						Цена:
					</span>
					<br>
					<span class="item-price__current"><span is-data="price"><?= $data['price']; ?></span> ₽</span>
					<span class="item-price__units">за упаковку</span>
					<br>
					<span class="item-price__current"><span><?= $data['price-one']; ?></span> ₽</span>
					<span class="item-price__units">за пару</span>
				<?php } else { ?>
					<span class="item-price__none block">
						нет в наличии
					</span>
				<?php } ?>
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
						
						<div class="align-left flex align-items-center">
							<input type="text" name="" id="catalog-current-item" class="item-cart__input b-0 p-0 m-0 ml-05 w-100 align-right align-self-stretch" value="<?= $data['value']; ?>" is-data="value:value" is-action="enter">
							<label class="p-0 m-0 mx-05" for="catalog-current-item">упак</label>
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
				<?php Objects::each(Parser::fromJson($array), function($item, $key) use ($data) { ?>
					<div class="pb-025 pr-025">
						<span class="color-gray-6">
							<?= $key; ?>:
						</span>
						<?= $data[$item]; ?>
					</div>
				<?php }); ?>
			</div>
			<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
				<?= $data['description']; ?>
			</div>
			<div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-tab-3">
				Отзывов пока нет
			</div>
		</div>
		
	</div>
	
</div>

</div>