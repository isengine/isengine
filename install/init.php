<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;
use is\Install\Language;

// несколько параметров для запуска:
// ?unlink - удаляет папку установки
// ?unpack - даст только распаковку
// ?update - установит или проапдейтит компоненты системы без распаковки
// ?install - как и сочетание параметров даст полную установку с распаковкой
// без параметров выведет меню

// в дальнейшем планируется добавить конфигуратор configuration.ini и распаковку готовых шаблонов и настроек

//define('PATH_SITE', DR);
//define('PATH_THIS', realpath(__DIR__) . DS . 'install' . DS);
//define('PATH_INSTALL', realpath(__DIR__) . DS);
//define('PATH_COMPONENTS', realpath(__DIR__ . DS . '..') . DS);

require PATH_INSTALL . 'class' . DS . 'installer.php';
require PATH_INSTALL . 'class' . DS . 'language.php';

$installer = Installer::getInstance();
$installer -> setInfo();

$lang = Language::getInstance();
$lang -> setLangs();
$lang -> setCurrent();
$lang -> read();

require PATH_INSTALL . 'actions' . DS . 'update.php';
require PATH_INSTALL . 'actions' . DS . 'unpack.php';
require PATH_INSTALL . 'actions' . DS . 'unlink.php'; 

require PATH_INSTALL . 'template.php';

//echo '<pre>';
//echo print_r($lang -> get('langs'), 1);
//echo print_r($lang -> get('current'), 1);
//echo print_r($lang -> get(), 1);

/*

require PATH_INSTALL . 'install' . DS . 'print.php';
require PATH_INSTALL . 'install' . DS . 'languages.php';
require PATH_INSTALL . 'install' . DS . 'path.php';

if (empty($get)) {
	dataprint($status[0]);
}

require PATH_INSTALL . 'install' . DS . 'actions.php';

dataprint(array_merge($status[0], $status[1]), empty($status[1]) ? true : null);
*/

exit;

?>