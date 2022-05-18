<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Sessions;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Components\Config;
use is\Components\State;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();
$state = State::getInstance();
$config = Config::getInstance();

$lang = $view->get('state|lang');
$real = $view->get('state|real');
$previuos = $view->get('state|previous');
$mail = $view->get('lang|information:email:0');

$error = [
	'name' => Sessions::code($state->get('error')),
	'code' => $state->get('error'),
	'lang' => Prepare::upperFirst($view->get('lang|common:error'))
];

require_once $real . 'html' . DS . 'blocks' . DS . 'prepare.php';

$view->get('block')->launch('items:html', 'default', null);

?>
<head>
<?php
	
	$view->get('block')->launch('meta:default', 'default', null);
	$view->get('block')->launch('items:assets', 'default', null);
	
?>
	<title><?= $view->get('lang|title') . ' | ' . $error['lang'] . ' ' . $error['code']; ?></title>
</head>
<body>

<div>
	
	<p align="center">
		<strong>
		<?= $error['lang']; ?> <span class="code" data-text="<?= $error['code']; ?>"><?= $error['code']; ?><span class="colon">:</span></span> <?= $description; ?>
		</strong>
	</p>
	
	<?= $message; ?>
	
</div>

<!-- <?= $state->get('reason'); ?> -->

</body>
</html>