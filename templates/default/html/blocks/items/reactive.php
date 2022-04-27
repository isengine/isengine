<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Parser;
use is\Helpers\Local;
use is\Components\Config;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$config = Config::getInstance();
$view = View::getInstance();

if (
	!$config -> get('develop:enable') ||
	!$config -> get('develop:reactive')
) {
	return;
}

// код

$timer = $view -> get('reactive') -> time;

if (!$timer) {
	return;
}

$timer = $timer * 1000;

?>
<meta name="reactive" content="<?= $view -> get('reactive') -> getList(); ?>">
<script>
console.log('isEngine reactive is on');
setInterval(function(){
	let request = new XMLHttpRequest();
	request.open('GET', '/?reactive');
	request.setRequestHeader('Content-Type', 'application/x-www-form-url');
	request.addEventListener("readystatechange", () => {
		if (request.readyState === 4 && request.status === 200) {
			let react = document.querySelector('meta[name="reactive"]').getAttribute('content');
			let response = request.responseText;
			if (response && react && react !== response) {
				location.reload();
				// window.location.reload()
			//} else {
			//	console.log('+');
			}
		}
	});
	request.send();
}, <?= $timer; ?>);
</script>