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

class Activate extends Master {
	
	public function launch() {
		
		//$session = Session::getInstance();
		//$session -> close();
		//
		//Sessions::setCookie('logout', true);
		//$this -> returns(null);
		
		// хорошо бы сделать метод, позволяющий искать в коллекции
		// записи по данным и возвращать эти записи
		// либо все, либо первую найденную
		
		$name = null;
		$confirm_name = null;
		$login = $this -> getData('login');
		$confirm = $this -> getData('confirm');
		
		if (!$login || !$confirm) {
			echo 'user confirm not set';
			return;
		}
		
		$data = $this -> findUser($login);
		
		if (!$data['user']) {
			echo 'user not found';
			return;
		}
		
		foreach ($data['settings'] as $item) {
			if ($item -> data['special'] === 'confirm') {
				$name = $item -> name;
				$confirm_name = $data['user'] -> data[$name];
				break;
			}
		}
		unset($item);
		
		if (!$confirm_name) {
			echo 'confirm not need';
			return;
		}
		
		if ($confirm_name !== $confirm) {
			// сюда еще надо добавить сброс кода подтверждения
			// запись нового кода в данные пользователя
			// и отправку соответствующего письма
			// 
			// здесь штука в том, что если даже пользователь активен
			// и злоумышленник отправил такой запрос,
			// это никак не повредит пользователю
			// просто придет письмо об активации аккаунта
			// 
			// можно еще сделать код не хешированием,
			// а кодированием в base64 по времени
			// и потом декодировать его и сравнивать время, сколько прошло
			// и делать ограничение по времени - если слишком поздно,
			// то код меняется и активация нужна повторная
			echo 'confirm code is not correct';
			return;
		}
		
		// а здесь код, когда подтверждение совпало
		
		// мы сбрасываем код активации
		$array = json_decode(json_encode($data['user']), true);
		$db = Database::getInstance();
		$db -> collection('users');
		$db -> rights(true);
		
		$db -> query('delete');
		$db -> driver -> setData($array);
		$db -> launch();
		
		$result = $db -> driver -> success();
		
		if (!$result) {
			echo 'confirm by user entry was not removed';
			return;
		}
		
		$array['data'][$name] = null;
		$array['parents'] = ['registered'];
		
		$db -> query('create');
		$db -> driver -> setData($array);
		$db -> launch();
		
		$result = $db -> driver -> success();
		
		if (!$result) {
			echo 'user entry was not activated';
			return;
		}
		
		$db -> query('read');
		$db -> clear();
		
		if ($result) {
			// отправка еще одного письма после активации
			
			$message = '
				<h3>Активация прошла успешно!' . System::server('host') . '</h3>
				<p>Теперь Вы можете пользоваться своим личным кабинетом и другими возможностями зарегистрированного пользователя.</p>
				<p>Запомните свой логин для входа: <strong>' . $login . '</strong></p>
				<p>Также Вы можете использовать для входа свой номер телефона, который Вы указали при регистрации</p>
				<p>Для продолжения, перейдите по ссылке ниже.</p>
				<a href="' . System::server('domain') . '/profile/">
					Войти в личный кабинет
				</a>
			';
			
			$send = $this -> send([
				'to' => $login,
				'subject' => 'Активация прошла успешно!',
				'message' => $message
			]);
			
			if ($send) {
				Sessions::setCookie('activate', true);
				$this -> returns();
			} else {
				$this -> error('send', 'no send');
			}
			
		}
		
		//System::debug($name);
		//System::debug($confirm);
		//System::debug($data);
		
	}
	
}

?>