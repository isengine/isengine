<?php

namespace is;

/*
* DS, DIRECTORY SEPARATOR - разделитель папок
* DP, DIRECTORY PARENT - предыдущая папка
* DI, DIRECTORY INDEX - индексная, публичная папка проекта
* DR, DIRECTORY ROOT - корневая папка проекта
*/
define('DS', DIRECTORY_SEPARATOR);
define('DP', '..' . DIRECTORY_SEPARATOR);
define('DI', __DIR__ . DS);
define('DR', realpath(__DIR__ . DS . '..') . DS);

require_once DR . 'vendor' . DS . 'isengine' . DS . 'core' . DS . 'init.php';

?>