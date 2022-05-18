<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$week = $this->getData('week');

// общая статистика

$params = '';

Objects::each($week, function($item, $key, $pos) use (&$params) {
	$params .= ($pos !== 'first' ? ',' : null) . 'ym:s:' . $item['type'];
	return $item;
});

$ch = curl_init('https://api-metrika.yandex.net/stat/v1/data?' . urldecode(http_build_query([
	'ids'        => $this->getData('id'),
	'metrics'    => $params,
	'filters'    => 'ym:s:isRobot==\'No\''
])));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $this->getData('token')));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);
 
$res = json_decode($res, true);	
$res = $res['data'][0]['metrics'];

Objects::each($res, function($val, $key) use (&$week) {
	
	$item = &$week[$key];
	$item['value'] = round($val, 2);
	
	switch ($item['format']) {
		
		case 'percent':
			$item['value'] .= '%';
			break;
		
		case 'time':
			$item['value'] = gmdate('i:s', round($item['value']));
			break;
		
	}
	
	return $val;
	
});

$this->setData('week', $week);

?>