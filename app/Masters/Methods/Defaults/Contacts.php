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

class Contacts extends Master {
	
	public function launch() {
		
		$data = $this -> getData();
		
		$this -> spam('check', 403);
		
		$this -> settings();
		$this -> fields();
		
		if (!$this -> errors()) {
			
			// сюда добавляем обработку данных
			$message = Strings::combine([
				'Заказчик' => $this -> getData('name'),
				'E-mail' => $this -> getData('email'),
				'Телефон' => $this -> getData('phone'),
				'Сообщение' => $this -> getData('message')
			], '<br>', ' : ');
			//System::debug($message);
			
			// сюда добавляем отправку сообщения
			$send = $this -> send([
				'subject' => 'Новое сообщение с сайта',
				'message' => $message
			]);
			
			if (!$send) {
				$this -> error('send', 'no send');
			}
			
		}
		
		$this -> returns();
		
	}
	
}

?>