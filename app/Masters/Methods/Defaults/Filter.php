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
use is\Components\Uri;

use is\Masters\Module;
use is\Masters\Database;

class Filter extends Master {
	
	public function launch() {
		
		/*
		* формируем ссылку
		* /data/page/1/items/0/sort/asc/... color/белый/
		* /data/1/0/asc/... белый/
		* ?page=1&items=0&sort=asc&... color=белый
		* /data/... color/белый/ ...?page=1&items=0&sort=asc
		* и возвращаем эту ссылку, точнее перезагружаем страницу по нужной ссылке
		* 
		* НЕ ЗАБЫВАЕМ ДЕЛАТЬ ОЧИСТКУ ПОСТУПИВШИХ ДАННЫХ!
		* мы не передаем 'prepare' => 'clear',
		* потому что сюда не передается инфа о конфигурации формы
		* а это в свою очередь из-за того, что форма генерируется
		* и нужных данных мы все равно не получим - их просто нет в настройках
		* ПОЭТОМУ мы должны сделать фильтрацию по 'clear' для ВСЕХ поступивших данных!
		*/
		
		// вот так формировалась изначальная строка
		// возможно, нам понадобятся еще несколько служебных полей
		// sort
		// http://0isengine.org/api/defaults/filter/?service=parents%3Acatalog%3A%D0%93%D1%80%D1%83%D0%BF%D0%BF%D0%B0+1%7Cpage%3Apage%7Citems%3Aitems%7Csort%3Asort&color%5B%5D=%D0%B1%D0%B5%D0%BB%D1%8B%D0%B9&matherial%5B%5D=%D0%B4%D0%B5%D1%80%D0%B5%D0%B2%D0%BE&matherial%5B%5D=%D0%BC%D0%B5%D1%82%D0%B0%D0%BB%D0%BB&matherial%5B%5D=%D1%80%D0%B5%D0%B7%D0%B8%D0%BD%D0%B0&size%5B%5D=10+10+30&size%5B%5D=20&sex=%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B8%D0%B9&season=&property1=&property2=%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F&submit=%D0%9E%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D1%82%D1%8C
		/*
		$link = Objects::convert($this -> parents);
		$rest = $this -> navigate -> rest;
		if ($rest) {
			if (System::type($rest, 'numeric')) {
				$link = Objects::get($link, 0, $rest);
				$c = Objects::len($link);
				while($c < $rest) {
					$link[] = null;
					$c++;
				}
			} else {
				$link[] = $rest;
			}
		}
		$join = Strings::join($link, '/');
		$url = '/' . ($join ? $join . '/' : null) . $this -> navigate -> name_page . '/1/' . $this -> navigate -> name_items . '/0/';
		unset($link, $join);
		*/
		
		// параметры фильтрации:
		// and/or/multi
		// search
		// numeric
		// range
		// select-option
		// 
		// rest (позже) - page items sort
		// : + - * _
		// 
		// нужно посмотреть, как передаются мультизначения
		// и самое главное, чтобы они правильно парсились для формы!
		// имеется ввиду
		// /data/prop/val:val
		// /data/prop/+val:+val
		// /data/prop/*val
		// и т.д.
		
		$data = $this -> getData();
		
		$service = $data['service'];
		unset($data['service']);
		
		$array = [];
		
		Objects::each($data, function($item, $key) use (&$array){
			
			if (!System::set($item)) {
				return;
			}
			
			// здесь нужно сохранить ключи с метками, например
			// :range :search
			$key = Strings::split($key, ':');
			$type = $key[1];
			$key = $key[0];
			
			$item = Objects::convert($item);
			if (System::typeOf($item, 'iterable')) {
				$item = Objects::each($item, function($item){
					return Prepare::clear($item);
				});
			}
			
			if ($type === 'range') {
				$item = $item[0] . '_' . $item[1];
			} elseif ($type === 'search') {
				$item = '*' . $item[0];
			} else {
				$item = Strings::join($item, ':');
			}
			
			$array[$key] = $item;
			
			//System::debug($key, $type);
			//System::debug($item);
			
		});
		
		// готовим строку для обратного перехода
		
		// определяем, разрешены ли rest-запросы
		// и ключи к ним
		$uri = Uri::getInstance();
		$rest = $uri -> rest;
		$rest_keys = $uri -> keys;
		
		// парсим служебную информацию
		$service = Parser::fromString($service, ['key' => true, 'simple' => null]);
		
		// родители, ссылка для обратного перехода
		$parents = $service['parents'];
		
		// массив параметров навигации
		$nav_page = $service['page'][0];
		$nav_items = $service['items'][0];
		$nav_sort = $service['sort'][0];
		
		// если заданы все параметры,
		// то массив параметров навигации
		// объединяется с массивом данных
		if ($nav_page && $nav_items && $nav_sort) {
			$array = Objects::add([
				$nav_page => 1,
				$nav_items => 0,
				$nav_sort => 'asc'
			], $array);
		}
		
		// проверяем параметры rest-запроса
		// и формируем строку
		$result = null;
		if ($rest) {
			
			// здесь дополняем массив данных строки до rest
			if (System::type($rest, 'numeric')) {
				$parents = Objects::get($parents, 0, $rest);
				$c = Objects::len($parents);
				while($c < $rest) {
					$parents[] = null;
					$c++;
				}
			} else {
				$parents[] = $rest;
			}
			
			if ($rest_keys) {
				$result = Strings::combine($array, '/', '/');
			} else {
				$result = Strings::join($array, '/');
			}
			$result = $result ? $result . '/' : null;
		} else {
			$result = '?' . http_build_query($array);
		}
		
		$join = Strings::join($parents, '/');
		$url = '/' . ($join ? $join . '/' : null) . $result;
		
		$this -> reload($url);
		
	}
	
}

?>