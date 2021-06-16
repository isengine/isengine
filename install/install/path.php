<?php

// формируем путь установки и заодно создаем нужные папки

foreach (['vendor', 'isengine'] as $item) {
	if (empty($path)) {
		$path = PATH_SITE;
	}
	$path .= $item . DS;
	if (!file_exists($path)) {
		mkdir($path);
	}
}
unset($item);

?>