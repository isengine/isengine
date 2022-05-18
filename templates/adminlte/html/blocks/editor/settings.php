<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();

$content = $view->get('vars|content');
$content = Parser::fromJson($content);
$content = Objects::first($content, 'value');

$columns = $view->get('vars|columns');

// мы используем настройки модуля форм,
// где вначале используются служебные поля
// поэтому мы должны пропустить эти поля,
// чтобы начать записывать данные после этих полей

$settings = [[], [], [], []];

Objects::each($columns, function($item, $key) use (&$settings, $content){
	
	// определяем имя
	
	$name = $item['name'];
	
	if (Strings::match($name, ':')) {
		
		// имя вида 'data:title' мы определяем как сложное
		// и значение для него будем смотреть внутри массива данных
		
		$name = Strings::split($name, ':');
		$value = Objects::extract($content, $name);
		
		// также поле name для такого имени должно передаваться как массив
		// например data[title]
		
		$name = Objects::first($name, 'value') . '[' . Strings::join(Objects::unfirst($name), '][') . ']';
		
	} else {
		$value = $content[ $name ];
	}
	
	// множественные данные значений (массив)
	// записываем в данные элемента
	
	if (System::typeOf($value, 'iterable')) {
		$item['data'] = $value;
	} elseif ($item['multiple']) {
		//$item['data'] = [$value ? $value : 'none'];
		$item['data'] = $value ? [$value] : [null];
	} else {
		$item['value'] = $value;
	}
	
	//System::debug($item);
	//System::debug($name);
	//System::debug($value);
	//echo '--';
	
	$item['name'] = $name;
	//$item['options']['default'] = $value;
	//System::debug($item);
	
	$settings[] = $item;
	
});

//System::debug($content);
//System::debug($settings);

$view->get('vars')->set('columns', Parser::toJson(['data' => $settings]));

?>