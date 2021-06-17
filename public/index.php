<?php

// Set base namespace
// Рабочее пространство имен

namespace is;

// Set base constants
// Базовые константы

if (!defined('isENGINE')) { define('isENGINE', microtime(true)); }
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
if (!defined('DP')) { define('DP', '..' . DIRECTORY_SEPARATOR); }

if (!defined('isPATH')) {
	
	// Set base path configuration
	// Only one option needs to be uncommented
	
	// Выбор базового пути
	// Только один вариант должен быть раскомментирован
	
	define('isPATH', realpath(__DIR__ . DS . '..') . DS . 'install' . DS);
	//define('isPATH', __DIR__ . DS . 'install' . DS);
	
}

// Launch install process
// Запускаем процесс установки

//echo '[' . hash_file('md5', isPATH . DS . 'index.php') . ']';
//00ad9e8eecc21f24810619548e779ab7

require_once isPATH . 'index.php';
exit;

?>