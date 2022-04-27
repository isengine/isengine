<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Local;

use is\Helpers\Parser;

use is\Masters\View;

$view = View::getInstance();

$data = $item -> getData();

?>

<div class="col-12" is-name="<?= $data['name']; ?>">

<div class="row">
	
	<div class="col-12">
		<h1 class="mb-1" is-data="title">
			<?= $data['title']; ?>
		</h1>
	</div>
	
	<div class="col-12">
		<div class="row justify-content-between align-items-center">
			
			<div class="col-auto">
				<a href="javascript:void(0);" class="color-gray-8 color-second-hover pr-1">
					<i class="bi bi-star fs-125"></i>
					В избранное
				</a>
				<a href="javascript:void(0);" class="color-gray-8 color-second-hover pr-1">
					<i class="bi bi-bar-chart fs-125"></i>
					Добавить в сравнение
				</a>
			</div>
			
			<div class="col-auto">
				<?php $this -> block('default:catalog:navigate:alone'); ?>
			</div>
			
		</div>
	</div>
	
	<div class="col-12">
		<div class="mb-2 pb-05 b-0 bb border-second"></div>
	</div>
	
</div>

<div class="row">
	
	<div class="col-12 xs-col-6 relative">
		
		<div class="
			flex flex-column align-items-end
			absolute at ar
			mt-05 mr-15
		">
			<?php if ($data['sale']) { ?>
			<span class="
				block mb-025 badge bg-second
				fw-normal
			">
				скидка <?= $data['sale']; ?>%
			</span>
			<?php } ?>
			
			<?php Objects::each($data['tags'], function($item){ ?>
			<span class="
				block mb-025 badge bg-theme
				fw-normal
			">
				<?= $item; ?>
			</span>
			<?php }); ?>
		</div>
		
		<div class="width-100">
			<div class="" is-data="image">
				<?= $data['image']; ?>
			</div>
		</div>
		
	</div>
	
	<div class="col-12 xs-col-6">
		
		<div class="pb-1">
			<?= $data['description']; ?>
		</div>
		
		<div class="pb-1">
			<div class="pb-025 fs-125">
				Характеристики
			</div>
			
			<?php Objects::each(Objects::get($this -> settings['filtration']['lang'], 0, 3), function($item, $key) use ($data) { ?>
			<div class="pb-025">
				<span class="color-gray-6 pr-025">
					<?= $item; ?>:
				</span>
				<?= $data[$key] ? $data[$key] : 'нет данных'; ?>
			</div>
			<?php }); ?>
			
			<div>
				<a href="<?= $view -> get('state|url'); ?>#nav-tab" class="color-theme">
					Все характеристики
				</a>
			</div>
		</div>
		
		<div class="b border-gray-2 p-1">
			
			<div class="
				fs-15
				mt-auto
			">
				<?php if ($data['price']) { ?>
					<span class="block lh-125 mt-05">
						<?php if ($data['price-old']) { ?>
							<span class="text-line-through"><span is-data="price-old"><?= $data['price-old']; ?></span> ₽</span>
						<?php } ?>
						<span is-data="price"><?= $data['price']; ?></span> ₽
						<span class="color-gray-6 fs-1">
							за <span is-data="units"><?= $data['units']; ?></span>
						</span>
					</span>
					<span class="block lh-125 mt-05">
						<?php if ($data['price-opt-old']) { ?>
							<span class="text-line-through"><span><?= $data['price-opt-old']; ?></span> ₽</span>
						<?php } ?>
						<span><?= $data['price-opt']; ?></span> ₽
						<span class="color-gray-6 fs-1">
							за упаковку
							<?= $data['opt'] ? '(в упаковке ' . $data['opt'] . ' ' . $data['units'] . ')' : null; ?>
						</span>
					</span>
				<?php } else { ?>
					<span class="
						block
						color-gray-6
						fs-1 lh-2
					">нет в наличии</span>
				<?php } ?>
			</div>
			
			<div class="mt-1" data-step="<?= $data['step']; ?>" is-data-from="true">
				<div class="item-first<?= $data['value'] ? ' none' : null; ?>">
					<a href="javascript:void(0);" class="width-100 btn bg-second" is-action="buy">
						в корзину
					</a>
				</div>
				<div class="item-second<?= $data['value'] ? null : ' none'; ?> flex justify-content-between">
					<a href="javascript:void(0);" class="btn bg-second w-min-25" is-action="dec">
						-
					</a>
					<input type="text" name="" class="width-100 mx-025 sm-mx-1 b-0 align-center" value="0" is-data="value:value" is-action="enter">
					<a href="javascript:void(0);" class="btn bg-second w-min-25" is-action="inc">
						+
					</a>
				</div>
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="row">
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
			
			<div class="tab-pane fade show active" id="nav-1" role="tabpanel" 
			aria-labelledby="nav-tab-1">
				
				<div class="container">
				<?php Objects::each($this -> settings['filtration']['lang'], function($item, $key) use ($data) { ?>
					<div class="row pb-025">
						<div class="col-6 md-col-4">
							<span class="color-gray-6">
								<?= $item; ?>:
							</span>
						</div>
						<div class="col-6 md-col-8">
							<?= $data[$key] ? $data[$key] : 'нет данных'; ?>
						</div>
					</div>
				<?php }); ?>
				</div>
				
			</div>
			
			<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
				
				<?= $data['description']; ?>
				<?= $data['content']; ?>
				
				<?php
					Objects::each($data['gallery'], function($item) use ($view, $data) {
						echo $view -> get('tvars') -> launch( '{img|' . $item . ':/content/items/default.jpg:lazyload width-100 align-image-contain my-1:' . $data['title'] . '}' );
					});
				?>
				
			</div>
			
			<div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-tab-3">
				
				Здесь будет список отзывов
				
			</div>
			
		</div>
		
	</div>
	
	<div class="col-12">
		<div class="mb-2 pb-05 b-0 bb border-second"></div>
	</div>
	
</div>

<div class="row">
	<?php
		$path = DI . 'content' . DS . Strings::replace($this -> navigate -> current, ':', DS) . DS;
		if (Local::matchFolder($path)) {
	?>
	<div class="col-12 pt-1">
		<h3 class="pb-05">Галерея</h3>
		<?php
			$view -> get('module') -> launch('media', 'default', '{
				"folder" : "content:' . $this -> navigate -> current . '",
				"slider" : { "enable" : false },
				"slideshow" : { "enable" : false },
				"gallery" : { "enable" : true }
			}');
		?>
	</div>
	<?php } ?>
</div>

</div>

<div class="col-12">
	
<div class="row">
	<?php
		$count = 4;
		if ($this -> navigate -> all > $count) {
	?>
	<div class="col-12 pt-1">
		<h3 class="pb-05">Похожие</h3>
		<div class="row">
		<?php
			$view -> get('module') -> launch('content', 'default:catalog:inner|default:catalog:view:inner', '{
				"parents" : "' . $this -> parents . '",
				"exclude" : [
					"' . $this -> navigate -> current . '"
				],
				"limit" : ' . $count . ',
				"sort" : "random"
			}');
		?>
		</div>
	</div>
	<?php } ?>
</div>

</div>