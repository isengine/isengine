<?php

// несколько параметров для запуска:
// ?unlink - удаляет папку установки
// ?unpack - даст только распаковку
// ?update - установит или проапдейтит компоненты системы без распаковки
// ?install - как и сочетание параметров даст полную установку с распаковкой
// без параметров выведет меню

// в дальнейшем планируется добавить конфигуратор configuration.ini и распаковку готовых шаблонов и настроек

if (!defined('isENGINE')) { define('isENGINE', microtime(true)); }
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
if (!defined('DP')) { define('DP', '..' . DIRECTORY_SEPARATOR); }
//if (!defined('DR')) { define('DR', realpath(__DIR__ . DS . DP . DP . DP) . DS); }
if (!defined('DR')) { define('DR', realpath(__DIR__ . DS . DP) . DS); }

if (!defined('PATH_SITE')) { define('PATH_SITE', DR); }

define('PATH_THIS', realpath(__DIR__) . DS . 'install' . DS);
define('PATH_INSTALL', realpath(__DIR__) . DS);
define('PATH_COMPONENTS', realpath(__DIR__ . DS . '..') . DS);

require PATH_THIS . 'init.php';

exit;

?>
