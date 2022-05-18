<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Helpers\Local;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

$url = '/docs/data/';
$root = DR . 'docs' . DS . 'ru' . DS;

$map = Local::map($root, ['subfolders' => true, 'extension' => 'md', 'return' => '', 'merge' => true]);

//echo '<br>';
//echo '<br>';
//echo '[' . $url . ']<br>';
//echo '[' . $url_string . ']<br>';
//echo '[' . $base_url . ']<br>';
//echo '[' . $root . ']<br>';
//echo '[' . $file . ']<br>';
//echo '[' . $current . ']<br>';
//echo '[' . $parent . ']<br>';
//echo '[' . $parent_url . ']<br>'; //*
//echo '<br>';


?>
<h3 class="py-2">
	Оглавление
</h3>
<?php menumap($map, $url, $view); ?>

<?php
// ОБЪЯВЛЕНИЕ ФУНКЦИИ
function menumap($array, $url, $view, $level = 0) {
?>
<div class="accordion accordion-flush<?= $level ? ' ps-2' : null; ?>" id="accordion-level-<?= $level; ?>">
	<?php
		Objects::each($array, function($item, $key) use ($url, $view, $level) {
			
			$url_this = $view->get('state|string');
			$url .= Strings::replace($key, ' ', '%20') . '/';
			$match = Strings::match($url_this, '/' . $key . '/');
			$equal = '/' . Strings::replace($url_this, ' ', '%20') === $url;
			
			$dropdown = System::typeIterable($item);
			
			$id = 'id-' . Strings::replace($view->get('translit')->launch($key, 'en'), ' ', '-');
			
	?>
		<div class="accordion-item py-2 bg-transparent border-0">
			
			<div class="d-flex justify-content-between align-items-center">
			<a class="nav-link<?= $match ? null : ($level ? ' text-secondary' : ' text-dark'); ?><?= $equal ? ' fw-bold' : null; ?>" href="<?= $url; ?>">
				<?= Strings::replace(preg_replace('/-(\D)/ui', '. $1', $key), '-', '.'); ?>
			</a>
			<?php if ($dropdown) { ?>
				<h2 class="accordion-header py-0" id="flush-<?= $id; ?>">
					<button class="accordion-button p-0 bg-transparent shadow-none<?= $match ? null : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?= $id; ?>" aria-expanded="<?= $match ? 'true' : 'false'; ?>" aria-controls="flush-collapse-<?= $id; ?>"></button>
				</h2>
			<?php } ?>
			</div>
			
			
			<div id="flush-collapse-<?= $id; ?>" class="accordion-collapse collapse<?= $dropdown && $match ? ' show' : null; ?>" aria-labelledby="flush-<?= $id; ?>" data-bs-parent="#accordion-level-<?= $level; ?>">
				<?php if ($dropdown) { ?>
				<div class="accordion-body p-0 pt-2">
					<?php menumap($item, $url, $view, $id); ?>
				</div>
				<?php } ?>
			</div>
			
		</div>
	<?php
		});
	?>
</div>
<?php
}
?>