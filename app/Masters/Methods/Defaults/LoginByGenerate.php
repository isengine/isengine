<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

use is\Helpers\Datetimes;
use is\Helpers\Parser;
use is\Helpers\Prepare;
use is\Helpers\Sessions;

use is\Components\Config;
use is\Components\Globals;
use is\Components\Session;

use is\Masters\Module;
use is\Masters\Database;

class LoginByGenerate extends Master {
	
	public function launch() {
		
		$this -> spam('check', 403);
		
		$login = $this -> getData('login');
		$login = Prepare::clear($login);
		$login = Prepare::notags($login);
		
		$password = $this -> getData('password');
		$password = Prepare::clear($password);
		$password = Prepare::notags($password);
		
		if (!$password) {
			
			// генерируем пароль
			// записываем его в специальное поле (временный пароль) данных пользователя в базу данных
			// но не в сессию, потому что сессии еще нет
			// и не в куки, потому что оттуда его может прочитать злоумышленние
			
			// далее мы отправляем этот пароль пользователю
			// например, через email, sms или печатаем его
			// последнее пригодится, чтобы перехватить его через js ajax
			// и вывести его во всплывающем окне
			
			$rand = $this -> generateCode();
			echo $rand . '<hr>';
			
		} else {
			
			// если поле с паролем не было пустым,
			// мы проверяем пароль по специальному полю
			// причем это поле не должно быть пустым
			// и дальше либо авторизуем пользователя
			// либо нет
			// но в любом случае временный пароль стираем
			
		}
		
		echo '***<br>';
		echo $login . '<br>';
		echo $password . '<br>';
		
	}
	
}

?>