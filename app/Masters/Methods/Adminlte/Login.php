<?php

namespace is\Masters\Methods\Adminlte;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

use is\Helpers\Prepare;
use is\Helpers\Sessions;

use is\Components\Session;
use is\Masters\Methods;

class Login extends Methods\Defaults\Login {
	
	public function launch() {
		
		$this -> spam('check', 403);
		
		$login = $this -> getData('login');
		$password = $this -> getData('password');
		
		$login = Prepare::clear($login);
		$login = Prepare::notags($login);
		$password = Prepare::clear($password);
		$password = Prepare::notags($password);
		
		if (!$login || !$password) {
			echo 'User or password not set';
		}
		
		//echo $login . '<br>';
		//echo $password . '<br>';
		
		// ищем пользователя
		
		$data = $this -> findUser($login);
		
		if (!$data['user']) {
			echo 'User not found';
		}
		
		// проверяем пароль пользователя
		
		$result = null;
		
		foreach ($data['password'] as $item) {
			$result = Prepare::matchCrypt($password, $data['user'] -> data[$item]);
			if ($result) {
				break;
			}
		}
		unset($item);
		
		// если пароль верный, то авторизуем пользователя
		
		if ($result) {
			
			$session = Session::getInstance();
			$session -> open();
			$session -> init();
			$session -> setValue('user', Prepare::toJson($data['user']));
			$session -> getValue('settings', Prepare::toJson($data['settings']));
			Sessions::setCookie('session', $session -> getSession('token'));
			Sessions::setCookie('login', true);
			$this -> returns(null, 'adminlte');
			
		}
		
		unset($data, $result, $login, $password);
		
	}
	
}

?>