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
use is\Components\State;

use is\Masters\Module;
use is\Masters\Database;

class Order extends Master {
	
	public $order;
	
	public function initModule() {
		$config = Config::getInstance();
		$module = Module::getInstance();
		$module -> init(
			$config -> get('path:vendors'),
			$config -> get('path:app') . 'Masters' . DS . 'Modules' . DS,
			$config -> get('path:cache') . 'modules' . DS,
			$config -> get('cache:modules')
		);
		// объединяем информацию из двух баз данных
		$module -> launch('content', 'default:catalog:xlsx|default:catalog:combine', null, null);
		// читаем информацию из специального шаблона для api
		$module -> launch('content', 'default:catalog:inner|default:catalog:api', null, null);
	}
	
	public function getFromCookie() {
		
		$state = State::getInstance();
		$cookie = Sessions::getCookie();
		$val = Prepare::urlencode('catalog:');
		
		$cart = [];
		$this -> order = [];
		
		Objects::each($cookie, function($item, $key) use (&$cart, $val){
			if (Strings::find($key, $val, 0) && $item) {
				$cart[ Prepare::urldecode($key) ] = $item;
				$this -> order[] = $key;
			}
		});
		
		$state -> set('cart', Parser::toJson($cart));
		
	}
	
	public function launch() {
		
		$data = $this -> getData();
		
		$this -> spam('check', 403);
		
		$this -> settings();
		$this -> fields();
		
		if (!$this -> errors()) {
			
			// сюда добавляем данные заказа
			$this -> getFromCookie();
			$this -> initModule();
			
			// читаем глобальные данные
			$globals = Globals::getInstance();
			$globals -> set('id', date('Ymd-Hi-') . mt_rand(100, 999));
			
			//System::debug($globals);
			//System::debug($this -> getData());
			
			if (!System::typeIterable( $globals -> get('order') )) {
				echo 'ОШИБКА В ЗАКАЗЕ';
				$this -> error('order', 'error in order');
				return;
			}
			
			// сюда добавляем отправку сообщения
			$send = $this -> send([
				'subject' => 'Новый заказ с сайта ' . System::server('host'),
				'template' => 'app:Masters:Methods:Defaults:templates:order:admin',
				'message' => $this -> getData()
				//'message' => $message
			]);
			
			if ($send) {
				
				if ($this -> getData('email')) {
					$this -> send([
						'to' => $this -> getData('email'),
						'subject' => 'Ваш заказ на ' . System::server('host'),
						'template' => 'app:Masters:Methods:Defaults:templates:order:user',
						'message' => $this -> getData()
						//'message' => $message
					]);
				}
				
				Sessions::unCookie($this -> order);
				Sessions::setCookie('order-complete', true);
			} else {
				$this -> error('send', 'no send');
			}
			
		}
		
		$this -> returns();
		
	}
	
}

?>