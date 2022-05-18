<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;

$map = $this->getData();

if (!System::typeOf($map, 'iterable')) {
	return;
}

// рекурсивная функция для вложенного многоуровневого меню

if (!function_exists('is\Masters\Modules\Isengine\Data\fnOffcanvasMenu')) {
function fnOffcanvasMenu ($map, $parents = []) {
	Objects::each($map, function($data) use (&$parents){
		
		if (!$data) {
			return;
		}
		
		$current = Strings::join($parents, '/');
		$item = Prepare::urlencode($data['title'], '/');
		$link = $data['link'] ? $data['link'] : '/' . ($current ? $current . '/' : null) . $item . '/';
		$name = $data['title'];
		$key = Strings::replace($name, ' ', '_');
?>

	<div class="accordion-item b-0 my-025">
		<div class="accordion-header" id="accordion-<?= $key; ?>">
			<?php if ($data['data']) { ?>
			<button class="btn p-0 collapsed flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse-<?= $key; ?>" aria-expanded="false" aria-controls="accordionCollapse-<?= $key; ?>">
				<span class="color-gray-8 color-theme-hover px-025">
					<?= $name; ?>
				</span>
				<i class="bi-chevron-right rotate"></i>
			</button>
			<?php } else { ?>
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover px-025 block">
				<?= $name; ?>
			</a>
			<?php } ?>
		</div>
		<?php
			if ($data['data']) {
				$parents[] = $item;
		?>
		<div id="accordionCollapse-<?= $key; ?>" class="accordion-collapse collapse accordion-mobile" aria-labelledby="accordion-<?= $key; ?>">
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover px-025 fs-09 fw-bold">
				Показать все товары
			</a>
			<div class="accordion-body p-0">
				<?php fnOffcanvasMenu($data['data'], $parents); ?>
			</div>
		</div>
		<?php
				$parents = Objects::unlast($parents);
			}
		?>
	</div>
<?php
	}, true);
}
}

fnOffcanvasMenu($map, ['catalog']);

?>