<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;

use is\Masters\View;
use is\Masters\Database;

$view = View::getInstance();

// формат адреса: /adminlte/editor/?collection=content&parents=wedding:subwedd&name=news

// запускаем базу данных

$db = Database::getInstance();

$collection = $_GET['collection'];
$parents = $_GET['parents'];
$name = $_GET['name'];

if (!$collection || !$name) {
	return;
}

// читаем материал

$db->collection($collection);
if ($parents) {
	$db->driver->filter->addFilter('parents', '+' . Strings::replace($parents, ':', ':+'));
}
$db->driver->filter->addFilter('name', $name);
$db->launch();

$view->get('vars')->set('collection', $collection);
$view->get('vars')->set('parents', $parents);

$content = $db->data->getData();

$view->get('vars')->set('db', $content);
$view->get('vars')->set('content', Parser::toJson($content));

$db->clear();

// читаем настройки

$db->collection('adminlte');
$db->driver->filter->addFilter(
	'parents',
	'+' . $collection
        . (
            $parents
            ? ':+' . Strings::replace($parents, ':', ':+')
            : null
        )
);

$db->driver->filter->addFilter('name', 'settings');
$db->launch();

// сюда нужно добавить логику, которая будет работать так
// читаем все настройки для коллекции
// фильтруем по родителям
// если настроек нет, поднимаемся по фильтру родителей вверх
// т.е. фильтруем по предыдущему родителю
// и так до самого верха

$view->get('vars')->set('columns', $db->data->getFirstData());

$db->clear();

?>