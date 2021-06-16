<?php

// удаляем папку установки

function dataunlink($folder) {
	
	global $lang;
	
	if (mb_substr($folder, -1) !== DS) {
		$folder .= DS;
	}
	
	$log = [];
	$list = scandir($folder);
	
	if (!empty($list) && is_array($list)) {
		foreach ($list as $item) {
			if ($item === '.' || $item === '..') {
				// пропускаем корневые элементы
				continue;
			} elseif (!is_dir($folder . $item)) {
				// удаляем файлы
				if (unlink($folder . $item)) {
					$log[] = $lang['status']['file'] . '"' . $folder . $item . '"';
				} else {
					$log['errors'] = '<br>';
				}
			} else {
				// удаляем файлы внутри папки
				$sublog = dataunlink($folder . $item);
				if (!empty($sublog) && is_array($sublog)) {
					$log = array_merge($log, $sublog);
				}
				unset($sublog);
			}
		}
		unset($item);
	}
	
	unset($list);
	
	// удаляем саму папку
	if (rmdir($folder)) {
		$log[] = $lang['status']['folder'] . '"' . $folder . '"';
	} else {
		$log['errors'] = '<br>';
	}
	
	return $log;
	
}

if (isset($get['unlink'])) {
	
	$path = mb_substr(PATH_INSTALL, mb_strlen(PATH_SITE));
	$path = PATH_SITE . mb_substr($path, 0, mb_strpos($path, DS));
	
	$status[0][] = '<br>' . $lang['status']['unlink'];
	$status[1] = dataunlink($path);
	
	if (!empty($status[1]['errors'])) {
		$status[1][] = $lang['errors']['abort'];
		$status[1][] = $lang['errors']['unlink'];
	} else {
		$status[1][] = '<br>' . $lang['success']['unlink'];
	}
	
	unset($path);
	
	dataprint(array_merge($status[0], $status[1]), true);
	
}

?>