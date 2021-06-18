<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;

// несколько параметров для запуска:
// ?install - даст полную установку с распаковкой
// ?unlink - удаляет папку установки
// без параметров выведет меню

// в дальнейшем планируется добавить конфигуратор configuration.ini и распаковку готовых шаблонов и настроек

//define('PATH_SITE', DR);
//define('PATH_THIS', realpath(__DIR__) . DS . 'install' . DS);
//define('PATH_INSTALL', realpath(__DIR__) . DS);
//define('PATH_COMPONENTS', realpath(__DIR__ . DS . '..') . DS);

require PATH_INSTALL . 'class' . DS . 'language.php';
require PATH_INSTALL . 'class' . DS . 'installer.php';

$installer = Installer::getInstance();
$installer -> setInfo();
$installer -> setLicense();
$installer -> setLang();
$installer -> setStatus();
$installer -> setBuffer();

unset($_GET['back']);

require PATH_INSTALL . 'install.php';
require PATH_INSTALL . 'template.php';

if (isset($_GET['unlink'])) {
	Local::deleteFolder(PATH_INSTALL);
	if (!Local::matchFolder(PATH_INSTALL)) {
		$installer -> buffer -> addDataKey('a5', $installer -> lang -> get('success:unlink'));
	}
}

$buffer = $installer -> buffer -> getData();
$buffer = Objects::sort($buffer, null, true);

Objects::each($buffer, function($item){
	echo $item;
});

exit;

?>
