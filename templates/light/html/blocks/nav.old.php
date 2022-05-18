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
use is\Components\Uri;
use is\Masters\View;

// читаем

$view = View::getInstance();

$uri = Uri::getInstance();

$url = $uri->path['string'];
if (!Strings::match($url, 'docs/data', 0)) {
	$url = 'docs/data/' . Strings::get($url, 5);
}

$url_string = Strings::replace($url, ' ', '%20');
$base_url = '/' . Strings::join($uri->route, '/') . '/data/';
$route = Objects::get($uri->path['array'], 2);
$root = DR . 'docs' . DS . 'ru' . DS;
$file = $root . Strings::join($route, DS) . '.md';
$current = $root . Strings::join($route, DS);
$parent = Paths::parent($current);

if (Strings::len($parent) < Strings::len($root)) {
	$parent = $root;
}

$parent_url = Paths::toUrl(Strings::get($parent, Strings::len($root)));

//$map = Local::map($root, ['subfolders' => true, 'extension' => 'md', 'return' => '', 'merge' => true]);
//echo '<pre>';
//echo print_r($map, 1);
//exit;

if (Strings::match($file, $current)) {
	$res = Local::search($current, ['subfolders' => null, 'extension' => 'md', 'return' => 'files', 'merge' => true]);
}


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
<?php if (System::typeIterable($res)) { ?>
	<h3 class="py-2">
		Оглавление
	</h3>
	<ul class="nav flex-column">
		<?php
			Objects::each($res, function($item) use ($url) {
				$item['file'] = Strings::replace($item['name'], '.md', '');
		?>
			<li class="nav-item">
				<a class="nav-link" href="/<?= $url . $item['file']; ?>">
					<?= Strings::replace(
							preg_replace('/-(\D)/ui', '. $1', $item['file']),
							'-',
							'.'
						);
					?>
				</a>
			</li>
		<?php
			});
		?>
	</ul>
	<hr>
<?php } ?>
	<ul class="nav flex-column">
		<?php
			if ($parent !== $root) {
		?>
			<li class="nav-item nav-item-addition">
				<a class="nav-link" href="<?= $base_url . $parent_url; ?>">
					Назад
				</a>
			</li>
		<?php
			}
			if ($current !== $root) {
		?>
			<li class="nav-item nav-item-addition">
				<a class="nav-link ps-0" href="<?= $base_url; ?>">
					В начало
				</a>
			</li>
		<?php
			}
		?>
	</ul>
