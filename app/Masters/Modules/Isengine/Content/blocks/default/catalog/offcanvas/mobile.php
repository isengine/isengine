<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$map = $this->getData()->map->parents['catalog'];

if (!System::typeOf($map, 'iterable')) {
	return;
}

// рекурсивная функция для вложенного многоуровневого меню

if (!function_exists('is\Masters\Modules\Isengine\Content\fnOffcanvasMenu')) {
function fnOffcanvasMenu ($map, $parents = []) {
	Objects::each($map, function($item, $key) use (&$parents){
		$current = Strings::join($parents, '/');
		$link = '/' . ($current ? $current . '/' : null) . $key . '/';
		$name = Strings::replace($key, ' ', '_');
?>

	<div class="accordion-item b-0 my-025">
		<div class="accordion-header" id="accordion-<?= $name; ?>">
			<?php if ($item) { ?>
			<button class="btn p-0 collapsed flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse-<?= $name; ?>" aria-expanded="false" aria-controls="accordionCollapse-<?= $name; ?>">
				<span class="color-gray-8 color-theme-hover px-025">
					<?= $key; ?>
				</span>
				<i class="bi-chevron-right rotate"></i>
			</button>
			<?php } else { ?>
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover px-025 block">
				<?= $key; ?>
			</a>
			<?php } ?>
		</div>
		<?php
			if ($item) {
				$parents[] = $key;
		?>
		<div id="accordionCollapse-<?= $name; ?>" class="accordion-collapse collapse accordion-mobile" aria-labelledby="accordion-<?= $name; ?>">
			<a href="<?= $link; ?>" class="color-gray-8 color-theme-hover px-025 fs-09 fw-bold">
				Показать все товары
			</a>
			<div class="accordion-body p-0">
				<?php fnOffcanvasMenu($item, $parents); ?>
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