<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Components\State;
use is\Masters\View;

$view = View::getInstance();

// код

$view->get('block')->launch('items:html', 'default');

?>
<head>
<?php
	
	$view->get('block')->launch('items:google', 'default');
	$view->get('block')->launch('items:yandex', 'default');
	$view->get('block')->launch('items:meta', 'default', null);
	$view->get('block')->launch('items:webapp', 'default');
	$view->get('block')->launch('items:icons', 'default');
	$view->get('block')->launch('items:ie', 'default');
	
	$view->get('block')->launch('items:preload', 'default');
	
	$view->get('block')->launch('items:libraries', 'default');
	$view->get('block')->launch('items:variables', 'default');
	$view->get('block')->launch('items:assets', 'default', null);
	
	$view->get('block')->launch('items:reactive', 'default');
	
	$view->get('block')->launch('head', null, null);
	
?>
</head>
<?php
	
	$view->get('block')->launch('items:body', 'default', null);
	$view->get('block')->launch('items:assets', 'default', null);
	$view->get('block')->launch('items:darkmode', 'default');
	
	$view->get('block')->launch('header', null, null);
	
	$view->get('block')->launch('items:h1', 'default', null);
	
?>