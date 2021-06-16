<?php

$i = null;

if (!empty($get['lang'])) {
	$currlang = $get['lang'];
	unset($get['lang']);
} elseif (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	foreach (preg_split('/\,/ui', $_SERVER['HTTP_ACCEPT_LANGUAGE']) as $item) {
		$currlang = mb_substr($item, 0, 2);
		if (
			!empty(mb_strpos($item, ';')) &&
			file_exists(PATH_INSTALL . 'languages' . DS . $currlang . '.ini')
		) {
			break;
		} else {
			$currlang = 'en';
		}
	}
	unset($item);
}

$i = PATH_INSTALL . 'languages' . DS . $currlang . '.ini';

if (file_exists($i)) {
	$i = file_get_contents($i);
	if (!empty($i)) {
		$lang = json_decode($i, true);
	}
}

unset($i);

$f = glob(PATH_INSTALL . 'languages' . DS . '*.ini');
if (!empty($f) && is_array($f)) {
	foreach ($f as $item) {
		$i = mb_substr($item, mb_strrpos($item, DS) + 1, -4);
		if (!empty($i)) {
			$langs[] = $i;
		}
		unset($i);
	}
	unset($item);
}
unset($f);

?>