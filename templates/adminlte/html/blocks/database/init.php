<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;

use is\Masters\View;
use is\Masters\Database;

$view = View::getInstance();

// формат адреса: /adminlte/database/?collection=content&parents=wedding:subwedd

// запускаем базу данных

$db = Database::getInstance();

$collection = $_GET['collection'];

if (!$collection) {
	return;
}

$db -> collection($collection);
$db -> launch();

// готовим родителей

$parents = $db -> data -> map -> getData();

function adminlteDbMap(&$array) {
	foreach ($array as $key => &$item) {
		if (System::typeOf($item, 'iterable')) {
			adminlteDbMap($item);
			if (!Objects::len($item)) {
				$item = null;
			}
		} else {
			unset($array[$key]);
		}
	}
	unset($key, $item);
}

adminlteDbMap($parents);

$view -> get('vars') -> set('collection', $collection);
$view -> get('vars') -> set('parents', $parents);

//System::debug($parents);
unset($parents);

// фильтруем материалы по заданным родителям

$parents = $_GET['parents'];
//System::debug($parents);

if ($parents) {
	$db -> data -> addFilter('parents', '+' . Strings::replace($parents, ':', ':+'));
	$db -> data -> filtration();
	$db -> data -> leaveByList($db -> data -> getNames(), 'name');
}

$view -> get('vars') -> set(
	'db',
	Parser::toJson( Objects::reset($db -> data -> getData()) )
);

//$v = $view -> get('vars') -> getData('db');
//System::debug($v);

// составляем все данные контента в формате json
// составляем список ключей в данных

$content = [];
$keys = [];

Objects::each($db -> data -> getData(), function($item) use (&$content, &$keys, $collection) {
	$data = [];
	Objects::each($item -> getData(), function($i, $k) use (&$data, &$keys, $collection) {
		$data['data-' . $k] = $i;
		$keys['data-' . $k] = [
			'name' => 'data-' . $k,
			'type' => "text",
			'title' => $k
		];
	});
	$item = Objects::convert($item);
	$item['name'] = '<a href="/adminlte/editor/?collection=' . $collection . '&parents=' . Strings::join($item['parents'], ':') . '&name=' . $item['name'] . '">' . $item['name'] . '</a>';
	unset($item['data']);
	$content[] = Objects::add($item, $data);
});

//System::debug($content);
//System::debug($keys);

$view -> get('vars') -> set('content', $content);
$view -> get('vars') -> set('keys', Objects::values($keys));

/*
$keys = [];

Objects::each($db -> data -> getData(), function($item, $key) use (&$keys) {
	$item = $item -> getData();
	if (System::typeOf($item, 'iterable')) {
		//$keys = Objects::merge($keys, Objects::join(Objects::keys($item), null));
		$keys = Objects::merge($keys, $item);
	}
});

$view -> get('vars') -> set('keys', Objects::keys($keys));
*/

// очищаем базу данных

$db -> clear();

// составляем массив колонок

$columns = '[
	{
		"name" : "control",
		"type" : "control",
		"title" : "Управление",
		"value" : true
	},
	{
		"name" : "id",
		"type" : "number",
		"title" : "#",
		"width" : 25,
		"value" : true
	},
	{
		"name" : "name",
		"type" : "text",
		"title" : "Название",
		"value" : true
	},
	{
		"name" : "parents",
		"type" : "text",
		"title" : "Раздел",
		"width" : 50,
		"value" : true
	},
	{
		"name" : "type",
		"type" : "text",
		"title" : "Тип",
		"width" : 50,
		"value" : true
	},
	{
		"name" : "owner",
		"type" : "text",
		"title" : "Авторы",
		"width" : 50,
		"value" : false
	},
	{
		"name" : "ctime",
		"type" : "text",
		"title" : "Время создания",
		"width" : 50,
		"value" : true
	},
	{
		"name" : "mtime",
		"type" : "text",
		"title" : "Время изменения",
		"width" : 50,
		"value" : true
	},
	{
		"name" : "dtime",
		"type" : "text",
		"title" : "Время отключения",
		"width" : 50,
		"value" : false
	}
]';

$view -> get('vars') -> set('columns', Parser::fromJson($columns));

?>