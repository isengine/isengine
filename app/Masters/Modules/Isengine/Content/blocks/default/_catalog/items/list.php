<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

$data = $item -> getData();

$even = true;
$col = $even ? 'col-6 xs-col-3' : 'col-12 xs-col-4';

?>

<div class="<?= $col; ?> align-center mb-2">
		<a href="<?= $data['link'] ?>" class="block m-05">
			<div class="block border radius-1 mt-1">
				<?= $view -> get('tvars') -> launch($data['image']); ?>
			</div>
		</a>
		<a href="<?= $data['link'] ?>" class="btn bg-second">
			<div class="">
				Модель <?= $data['name']; ?>
			</div>
		</a>
</div>

<?php /*
<div class="col-6 xs-col-4 md-col-3 p-05 item">
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
			<a href="<?= $data['link'] ?>" class="item-link flex flex-column h-100">
				<div class="item-image">
					<?= $view -> get('tvars') -> launch($data['image']); ?>
				</div>
				<h3 class="h6 item-title">
					<span>Модель <?= $data['name']; ?></span>
				</h3>
				<div class="item-price<?= $data['price'] ? ' mt-auto' : null; ?>">
					<?php if ($data['price']) { ?>
						<span class="item-price__current">
							<span><?= $data['price']; ?></span> ₽</span>
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
		
	</div>
</div>
*/ ?>