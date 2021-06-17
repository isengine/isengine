<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;
use is\Install\Language;

$installer = Installer::getInstance();
$lang = Language::getInstance();

// UNLINK
// удаляем папку установки

if (isset($_GET['unlink'])) {
	
	$status[0][] = '<br>' . $lang -> get('status:unlink');
	
	Local::deleteFolder(PATH_INSTALL);
	
	if (Local::matchFolder(PATH_INSTALL)) {
		$status[1][] = '<br>' . $lang -> get('success:unlink');
	} else {
		$status[1][] = '<br>' . $lang -> get('errors:unlink');
	}
	
}

?>