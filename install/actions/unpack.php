<?php
// UNPACK
// распаковываем необходимые для работы файлы

if (
	isset($get['install']) ||
	isset($get['unpack'])
) {

	//$install = $path . 'core' . DS . 'install' . DS . 'install.zip';
	$install = PATH_INSTALL . 'presets' . DS . 'default.zip';

	$status[0][] = '<br>' . $lang['status']['unpack'];

	if (!extension_loaded('zip')) {
		$status[1][] = $lang['errors']['nozip'];
	}

	if (!file_exists($install)) {
		$status[1][] = $lang['errors']['noinstall'];
	}

	if (empty($status[1])) {
		
		$zip = new ZipArchive;
		$res = $zip -> open($install);
		
		if ($res === true) {
			
			$time = time();
			if (!file_exists(DR . 'backup')) {
				mkdir(DR . 'backup');
			}
			if (!file_exists(DR . 'backup' . DS . $time)) {
				mkdir(DR . 'backup' . DS . $time);
			}
			$f = glob(DR . '*.ini');
			if (!empty($f) && is_array($f)) {
				foreach ($f as $item) {
					$i = mb_substr($item, mb_strrpos($item, DS) + 1);
					rename($item, DR . 'backup' . DS . $time . DS . $i);
					$status[0][] = $lang['status']['file'] . '"' . $i . '"' . $lang['errors']['file'];
					unset($i);
				}
				unset($item);
			}
			unset($f, $time);
			
			$zip -> extractTo(DR);
			$zip -> close();
			
			$status[0][] = $lang['success']['unpack'];
			$status[0][] = $lang['status']['libraries'];
			
		} else {
			$status[1][] = $lang['errors']['unzip'];
		}

	}

	unset($install);

	if (!empty($status[1])) {
		$status[0][] = $lang['errors']['abort'];
	}

}

?>