<?php

// апдейтим систему

if (PATH_COMPONENTS === $path) {
	$status[0][] = $lang['errors']['install'];
} elseif (
	isset($get['install']) ||
	isset($get['update'])
) {
	
	if (!file_exists(PATH_SITE . 'backup')) {
		mkdir(PATH_SITE . 'backup');
	}
	if (!file_exists(PATH_SITE . 'backup' . DS . $time)) {
		mkdir(PATH_SITE . 'backup' . DS . $time);
	}
	
	$list = scandir(PATH_COMPONENTS);
	$time = time();
	
	if (!empty($list) && is_array($list)) {
		$status[0][] = $lang['status']['update'];
		foreach ($list as $key => $item) {
			if ($item === '.' || $item === '..' || $item === 'install') {
				// удаляем корневые элементы
				unset($list[$key]);
			} elseif (!is_dir(PATH_COMPONENTS . $item)) {
				// удаляем файлы
				unset($list[$key]);
				//unlink(PATH_COMPONENTS . $item);
			} else {
				// если элемент - папка, перемещаем ее
				$do = $lang['success']['install'];
				if (file_exists($path . $item)) {
					rename($path . $item, PATH_SITE . 'backup' . DS . $time . DS . $item);
					$status[0][] = $lang['status']['folder'] . '"' . $item . '"' . $lang['errors']['folder'];
					$do = $lang['success']['update'];
				}
				rename(PATH_COMPONENTS . $item, $path . $item);
				$status[0][] = $lang['status']['folder'] . '"' . $item . '"' . $do;
				unset($do);
			}
		}
		unset($key, $item);
	}
	
	if (empty($list)) {
		$status[0][] = $lang['errors']['abort'];
		$status[0][] = $lang['errors']['empty'];
	}
	
	unset($list, $time);
	
}

?>