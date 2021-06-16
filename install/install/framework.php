<?php

$pfw = PATH_SITE . 'vendor' . DS . 'autoload.php';

if (file_exists($pfw)) {
	require $pfw;
} else {
	require PATH_COMPONENTS . 'framework' . DS . 'php' . DS . 'init.php';
}

unset($pfw);

?>