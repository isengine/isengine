<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$cart = $view -> get('vars|cart');
$len = Objects::len($cart);

if ($len) {
	$this -> mergeDataKey('cart', ['badge' => $len]);
}

?>
<div class="row icons align-center" id="block-collapse">
	<?php Objects::each($this -> getData(), function($item, $key) use ($view) { ?>
	<a href="<?= $key ? '#block-collapse-' . $key : ($item['link'] ? $item['link'] : '#'); ?>" class="col color-gray-6 color-gray-6-hover icons-link collapsed" id="block-collapse-<?= $key; ?>__icons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="block-collapse-<?= $key; ?>">
		<div class="icons-box relative w-15 m-auto">
			<i class="fs-15 <?= $item['icon']; ?>"></i>
			<span class="bg-second absolute fs-075 w-125 h-125 lh-125 radius<?= $item['badge'] ? null : ' none'; ?>"><?= $item['badge']; ?></span>
		</div>
		<p class="none sm-block m-0 p-0 fs-075"><?= $item['title']; ?></p>
	</a>
	<?php if ($key) { ?>
	<div class="collapse icons-block absolute at ar mt-5 sm-mt-6 md-mt-5" id="block-collapse-<?= $key; ?>" data-bs-parent="#block-collapse">
		<div class="row m-0">
			<div class="col flex-shrink-1"></div>
			<div class="col-auto icons-container z-index-2 bg-white border radius-1 shadow-2-25 py-05">
				<div class="row justify-content-between my-025">
					<div class="col-auto color-gray-6">
						<?= $item['header']; ?>
					</div>
					<div class="col-auto">
						<button
							class="btn-close"
							type="button"
							data-bs-toggle="collapse"
							data-bs-target="#block-collapse-<?= $key; ?>"
							aria-label="Close"
							aria-expanded="true"
							aria-controls="block-collapse-<?= $key; ?>"
						></button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php $this -> block('default:icons:' . $key) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php }); ?>
</div>