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
function menumap($array, $url, $view) {
?>
<ul class="nav flex-column">
	<?php
		Objects::each($array, function($item, $key) use ($url, $view) {
			
			$url .= Strings::replace($key, ' ', '%20') . '/';
			$dropdown = System::typeIterable($item);
			
			if ($dropdown) {
				$id = 'id-' . Strings::replace($view->get('translit')->launch($key, 'en'), ' ', '-');
			}
			
	?>
		<li class="nav-item">
			<div class="d-flex justify-content-between align-items-center">
			<a class="nav-link" href="<?= $url; ?>">
				<?= Strings::replace(preg_replace('/-(\D)/ui', '. $1', $key), '-', '.'); ?>
			</a>
			<?php if ($dropdown) { ?>
				<a class="btn btn-link" data-bs-toggle="collapse" href="#<?= $id; ?>" role="button" aria-expanded="false" aria-controls="<?= $id; ?>">
					<i class="fa fa-chevron-down fs-6" aria-hidden="true"></i>
				</a>
				<?/*
				<button class="navbar-toggler btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $id; ?>" aria-controls="<?= $id; ?>" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-chevron-down fs-6" aria-hidden="true"></i>
				</button>
				*/?>
			<?php } ?>
			</div>
			<?php if ($dropdown) { ?>
			<div class="collapse navbar-collapse" id="<?= $id; ?>">
				<?php menumap($item, $url, $view); ?>
			</div>
			<?php
				}
			?>
		</li>
	<?php
		});
	?>
</ul>
<?php
}
?>