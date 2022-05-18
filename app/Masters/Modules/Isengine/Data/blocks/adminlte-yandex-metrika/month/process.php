<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$month = $this->getData('month');

// визиты по дням

$params = '';

Objects::each($month, function($item, $key, $pos) use (&$params) {
	$params .= ($pos !== 'first' ? ',' : null) . 'ym:s:' . $item['type'];
	return $item;
});

$ch = curl_init('https://api-metrika.yandex.net/stat/v1/data/bytime?' . urldecode(http_build_query([
	'ids'        => $this->getData('id'),
	'metrics'    => $params,
	'date1'      => '30daysAgo',
	'date2'      => 'yesterday',
	'group'      => 'day',
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

Objects::each($res, function($val, $key) use (&$month) {
	$month[$key]['value'] = $val;
	return $val;
});

$this->setData('month', $month);

//System::debug( $this->getData() );

?>