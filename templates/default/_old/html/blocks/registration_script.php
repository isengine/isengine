<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

$lang = $view->get('vars')->get('modal');

// Тестовые данные для раскрывающегося меню

$plans = array(
	$langTariffs[0] => 'free',
	$langTariffs[1] => 'test',
	$langTariffs[2] => 1,
	$langTariffs[3] => 3,
	$langTariffs[4] => 6,
	$langTariffs[5] => 12,
);

// Настройка пустых значений по умолчанию при отсутствии выбранного варианта
$salt = dechex(time());
$defaultsRegistration = array(
	'hash' => $salt . substr(MD5($_SESSION['token'] . $salt), 0, 30),
	'email' => '',
	'phone' => '',
	'password' => '',
	'plan' => array(),
);
foreach ($plans as $plan) {
	$defaultsRegistration['plan'][$plan] = '';
}

if (count($errorsRegistration)) {
	if ( isset($_POST['dataregistration']['email']) ) {
		$defaultsRegistration['email'] = $_POST['dataregistration']['email'];
	}
	if ( isset($_POST['dataregistration']['phone']) ) {
		$defaultsRegistration['phone'] = $_POST['dataregistration']['phone'];
	}
	if ( isset($_POST['dataregistration']['password']) ) {
		$defaultsRegistration['password'] = $_POST['dataregistration']['password'];
	}
	foreach ($plans as $plan) {
		if ( isset($_POST['dataregistration']['plan']) && ($_POST['dataregistration']['plan'] == $plan) ) {
			$defaultsRegistration['plan'][$plan] = "selected='selected'";
		}
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$errorsRegistration = array();
	if ( isset($attempts['ban']) && $attempts['ban'] > 1 ) {
		$errorsRegistration['ban'] = $lang['signup']['error'] . ' ';
	}
}

?>