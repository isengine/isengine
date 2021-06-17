<?php

// Set base namespace
// Рабочее пространство имен

namespace is;

// Set base constants
// Базовые константы

if (!defined('isENGINE')) { define('isENGINE', microtime(true)); }
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
if (!defined('DP')) { define('DP', '..' . DIRECTORY_SEPARATOR); }
if (!defined('DR')) { define('DR', realpath(__DIR__ . DS . DP) . DS); }

// Set extended constants
// Расширенные константы

if (!defined('PATH_INSTALL')) { define('PATH_INSTALL', __DIR__ . DS); }
if (!defined('PATH_SITE')) { define('PATH_SITE', str_replace(['/', '\\'], DS, $_SERVER['DOCUMENT_ROOT']) . DS); }

// Launch composer autoload
// Запускаем автозагрузчик компоузера

require DR . 'vendor' . DS . 'autoload.php';

// Launch install process
// Запускаем процесс установки

require_once PATH_INSTALL . 'init.php';

exit;

?>