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
$route = Objects::get($uri->path['array'], 2);
$root = DR . 'docs' . DS . 'ru' . DS;
$file = $root . Strings::join($route, DS) . '.md';
$current = $root . Strings::join($route, DS);

$markdown = Local::readFile($file);
$markdown = preg_replace('/\(([^\(\)]*)?\.md\)/ui', '(docs/data/$1)', $markdown);

$nav = [];
$i = 0;

$markdown = preg_replace_callback('/(\#\#.*)/ui', function ($match) use (&$nav, &$i, $url_string) {
	$key = Strings::get($match[0], 3);
	$item = preg_replace('/\s/ui', null, Strings::replace($key, ' ', '_'));
	$url = '/' . $url_string . '#' . $item;
	$nav[$key] = $url;
	$result = ($i ? '[в начало страницы](/' . $url_string . '#начало_страницы)' : null) . "\r\n" . '<h2><a class="id" id="' . $item . '" href="' . $url . '">' . $key . '</a></h2>';
	$i++;
	return $result;
}, $markdown);

if ($nav && $markdown) {
	$markdown = '<a id="начало_страницы"></a>' . "\r\n" . $markdown . "\r\n" . '[в начало страницы](/' . $url_string . '#начало_страницы)';
}

//echo '<pre>';
//echo print_r($file, 1);
//echo $markdown;
//echo '</pre>';
//echo '<hr>';

$parser = new \cebe\markdown\Markdown();
$content = $parser->parse($markdown);

if (!$content) {
	if ($current === $root) {
		$content = '<h1>' . 'Добро пожаловать!' . '</h1>' . 'Выберите пункт из оглавления';
	} else {
		$content = '<h1>' . 'Такой страницы не существует!';
	}
}

?>

<section class="container-lg my-5">
		
	<div class="row">
		
		<div class="collapse-button position-fixed top-50">
			<a class="btn btn-link text-dark" data-bs-toggle="collapse" href="#navCollapse" role="button" aria-expanded="true" aria-controls="navCollapse">
				<i class="fa fa-chevron-left"></i>
			</a>
		</div>
		<div class="col-12 col-sm-4 col-lg-3 sticky collapse show" id="navCollapse">
			<?php $view->get('block')->launch('nav'); ?>
			<hr>
			<?php if (System::typeIterable($nav)) { ?>
			<h3 class="py-2">
				Навигация по странице
			</h3>
			<ul class="nav flex-column">
				<?php
					Objects::each($nav, function($item, $key) use ($url) {
				?>
					<li class="nav-item">
						<a class="nav-link" href="<?= $item; ?>">
							<?= $key; ?>
						</a>
					</li>
				<?php
					});
				?>
			</ul>
			<?php } ?>
		</div>
		<div class="col-12 col-sm-8 col-lg-9">
			<?= $content; ?>
		</div>
	</div>
</section>

