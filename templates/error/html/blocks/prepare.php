<?php

// читаем настройки и тексты для кодов ошибок
//$options = (object) dataprepare($real . 'settings.ini');
//$data = (object) dataprepare($real . 'lang.ini');

$options = dataprepare($real . 'settings.ini');
$data = dataprepare($real . 'lang.ini');
$data = $data[ (string) $error['code'] ][$lang];

// задаем базовые значения объектов для использования в шаблоне

$description = trim($data['description']);
$message = trim($data['message']);

unset($data);

// производим замену содержимого текста
if ($message) {
	$message = str_replace(
		[
			'{timer}',
			'{previous}',
			'{restore}',
			'{host}',
			'{block}',
			'{support}'
		],
		[
			'<span id="timer">' . $options['timer'] . '</span>',
			'<a href="' . $previous . '">' . $previous . '</a>',
			'<a href="/?query=restore">' . $options['restore'][$lang] . '</a>',
			'<a href="/">http://' . $_SERVER['SERVER_NAME'] . '</a>',
			$options['block'][$lang],
			'<a href="mailto: ' . $mail . '?subject=' . $error['lang'] . ' ' . $error['code'] . ' (' . $_SERVER['SERVER_NAME'] . ')">' . $mail . '</a>',
		],
		$message
	);
}

// функция dataprepare, объединяющая dataloadjson и clear
// с урезанными возможности только для данного конкретного случая
// внимание! теперь можно загружать функцию dataloadjson отдельно через init, а clear является системной и грузится в самом начале

function dataprepare($data){
	
	if (!file_exists($data)) {
		return false;
	}
	
	$data = file_get_contents($data);
	
	// выполняем предварительное очищение - от переносов и табуляций
	$data = preg_replace('/\r\n/', '', $data);
	$data = preg_replace('/\n/', '', $data);
	$data = preg_replace('/\t/', ' ', $data);
	
	// выполняем предварительное очищение - от скриптов, программного кода
	$data = preg_replace('/<\?.+?\?>/','', $data);
	$data = preg_replace('/<script.+?\/script>/','', $data);
	
	// продолжаем предварительное очищение - от всех тегов, кроме разрешенных
	// задаем разрешенные теги
	$tags = ['br', 'p', 'span', 'b', 'i', 's', 'u', 'strong', 'em', 'del', 'small', 'sub', 'sup', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'ul', 'ol', 'li', 'pre', 'hr'];
	// подготавливаем список
	$striptags = '';
	foreach ($tags as $tag) {
		$striptags .= '<' . $tag . '>';
	}
	// очищаем
	$data = strip_tags($data, $striptags);
	// завершаем
	unset($tags, $tag, $striptags);
	
	// продолжаем предварительное очищение - чистим текст от пробелов и отступов в начале и в конце
	$data = trim($data);
	$data = preg_replace('/^(&nbsp;)+/', '', $data);
	$data = preg_replace('/(&nbsp;)+$/', '', $data);
	
	// продолжаем предварительное очищение - чистим текст от двойных пробелов
	$data = preg_replace('/(\s|&nbsp;){2,}/', '$1', $data);
	
	$data = json_decode($data, true);
	
	return $data;
	
}

?>