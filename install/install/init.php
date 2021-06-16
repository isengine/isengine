<?php

require PATH_THIS . 'framework.php';

global $get;
global $lang;
global $langs;
global $currlang;

$get = $_GET;
$path = null;
$status = [[],[]];
$lang = null;
$langs = [];
$currlang = 'en';

require PATH_THIS . 'print.php';

require PATH_THIS . 'languages.php';
require PATH_THIS . 'path.php';

if (empty($get)) {
	dataprint($status[0]);
}

require PATH_THIS . 'actions.php';

dataprint(array_merge($status[0], $status[1]), empty($status[1]) ? true : null);

exit;

?>