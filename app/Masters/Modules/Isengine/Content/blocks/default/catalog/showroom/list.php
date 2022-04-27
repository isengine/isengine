<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

$data = $item -> getData();

?>
<div class="col-12 xs-col-6 md-col-6 lg-col-4 xl-col-3 p-05" id="<?= $data['id']; ?>" is-name="<?= $data['name']; ?>">
	<div class="
		relative
		flex flex-column justify-content-between
		height-100
		p-1
		b border-gray-2 border-none-hover
	">
		
		<div class="
			flex flex-column align-items-end
			absolute at al
			mt-1 ml-125
		">
			<a href="javascript:void(0);" class="
				color-gray-6 color-second-hover
				fs-125
			">
				<i class="bi bi-star"></i>
			</a>
			<a href="javascript:void(0);" class="
				color-gray-6 color-second-hover
				fs-125
			">
				<i class="bi bi-bar-chart"></i>
			</a>
		</div>
		
		<div class="
			flex flex-column align-items-end
			absolute at ar
			mt-1 mr-1
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
		
		<a href="<?= $data['link'] ?>" class="
			flex flex-column
			height-100
			color-black
		"
		is-data="link:href"
		>
			<div class="my-auto" style="overflow: hidden;" is-data="image">
				<?= $data['image']; ?>
			</div>
			<h3 class="fs-1 my-05" is-data="title">
				<?= $data['title']; ?>
			</h3>
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
		</a>
		
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