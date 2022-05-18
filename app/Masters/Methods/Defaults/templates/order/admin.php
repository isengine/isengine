<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Local;
use is\Helpers\Prepare;
use is\Helpers\Parser;
use is\Components\Globals;
use is\Components\Language;

// читаем глобальные данные

$globals = Globals::getInstance();
$lang = Language::getInstance();

$logo = $lang->get('logo:0');
if (Strings::get($logo, 0, 1) === '/') {
    $logo = System::server('domain') . $logo;
}

$message = $this->message;
$this->message = null;
$content = '<table class="order"><tbody>';

Objects::each($globals->get('order'), function ($item) use (&$content) {
    $content .= '<tr style="border-bottom: solid 1px #d7d7d7;">
	<td><a target="blank" rel="noopener noreferrer" href="' . System::server('domain') . $item['link'] . '">' . $item['title'] . '</a></td>
	<td>' . $item['value'] . '&nbsp;' . $item['units'] . '</td>
	<td>' . $item['total'] . '&nbsp;руб</td>
	<td>' . $item['value'] . '&nbsp;x&nbsp;' . $item['price'] . '&nbsp;руб</td>
</tr>';
});

$content .= '</tbody></table>
<table class="total"><tbody>
	<tr>
		<td>
			К оплате:
		</td>
		<td>
			' . $globals->get('total') . '&nbsp;руб.
		</td>
	</tr>
</tbody></table>';

$social = null;

Objects::each($lang->get('social'), function ($item) use (&$social) {
    $social .= '<a href="' . $item['url'] . '" target="blank" rel="noopener noreferrer"><span>' . $item['name'] . '</span></a> ';
});

$map = null;
$coords = $message['coords'];
if ($coords) {
    $coords = Strings::split($coords, ':');
    $coords = $coords[1] . '%2C' . $coords[0];
    $map = '<a href="https://yandex.ru/maps/?ll=' . $coords . '&mode=whatshere&whatshere%5Bpoint%5D=' . $coords . '&whatshere%5Bzoom%5D=16&z=16" target="blank">открыть карту</a>';
}

$this->message = '<html>
<head>
	<style>
		img { display: block; width: 100%; border: 0; }
		div { padding-bottom: 22px; }
		p { margin: 6px 0; }
		span { display: inline-block; }
		a { color: #0099ff; text-decoration: none; }
		a span { color: #808080; }
		/* footer */
		.footer { background: #f1f1f1; padding: 12px; }
		.footer div { padding-bottom: 12px; }
		.footer img { width: 21px; height: 21px; }
		/* tables */
		table { width: 100%; border: 0; border-collapse: collapse; font-size: inherit; }
		tr { vertical-align: top; }
		td { box-sizing: border-box; padding: 0; line-height: 1.25rem; padding-bottom: 12px; }
		tr td:first-child { color: #808080; width: 25%; padding-right: 12px; }
		table.order td { padding: 12px; padding-left: 0px; }
		table.order td:first-child { width: auto; }
		table.order td:last-child { padding-right: 0px; text-align: right; }
		table.total { width: auto; margin-left: auto; }
		table.total td { padding: 6px 12px 0px 0px; }
		table.total td:first-child { width: auto; }
		table.total td:last-child { padding-right: 0px; text-align: right; }
	</style>
</head>
<body>

<div style="margin: auto; padding: 0; max-width: 600px; font-family: Arial; font-size: 14px; color: #000000; background: #ffffff;">

<div style="font-size: 10px; color: #777777;">
	Новый заказ с сайта
</div>

<div style="padding-bottom: 30px;">
	<a href="' . System::server('domain') . ' " target="blank" rel="noopener noreferrer">
		<img
			src="' . $logo . '"
			alt="' . $lang->get('title') . '"
			title="' . $lang->get('title') . '"
			style="max-width: 30%;"
		>
	</a>
</div>

<div style="font-size: 21px;">
	С сайта ' . System::server('host') . ' поступил новый заказ
</div>

<div>
<table>
<tbody>
	<tr>
		<td>
			Номер&nbsp;заказа:
		</td>
		<td>
			' . $globals->get('id') . '
		</td>
	</tr>
	<tr>
		<td>
			Дата&nbsp;составления&nbsp;заказа:
		</td>
		<td> 
			' . date('d.m.Y H:i') . '
		</td>
	</tr>
	<tr>
		<td>
			Адрес&nbsp;доставки:
		</td>
		<td>
			' . $message['address'] . '<br>' . $map . '
		</td>
	</tr>
	<tr>
		<td>
			Получатель:
		</td>
		<td>
			' . $message['name'] . '
		</td>
	</tr>
	<tr>
		<td>
			Телефон&nbsp;для&nbsp;связи:
		</td>
		<td>
			' . ($message['phone'] ? '<a href="tel:' . $message['phone'] . '" target="blank">' . $message['phone'] . '</a><br><a href="https://wa.me/' . Prepare::numeric($message['phone']) . '" target="blank">написать в whatsapp (если есть)</a>' : 'не указан') . '
		</td>
	</tr>
	<tr>
		<td>
			Email&nbsp;для&nbsp;связи:
		</td>
		<td>
			' . ($message['email'] ? '<a href="mailto:' . $message['email'] . '" target="blank">' . $message['email'] . '</a>' : 'не указан') . '
		</td>
	</tr>
	<tr>
		<td>
			Примечания&nbsp;к&nbsp;заказу:
		</td>
		<td>
			<p>' . $message['message'] . '</p>
		</td>
	</tr>
</tbody>
</table>
</div>

<div style="font-size: 21px;">
	Состав заказа:
</div>

<div>' . $content . '</div>

<div style="color: #808080;">
	С уважением,<br> 
	команда <a href="' . System::server('domain') . '">' . System::server('host') . '</a>
</div>

<div class="footer">
	<div style="font-size: 10px; color: #999999;">
		
		<div>' . $social . '</div>
		
		<a href="' . System::server('domain') . '" target="blank" rel="noopener noreferrer">
		<span>' . System::server('host') . '</span></a>. Данное письмо не требует ответа. 
		<br>
		' . $lang->get('information:formname:0') . ' ' . $lang->get('information:company') . '; ' . $lang->get('information:postcode') . ', ' . $lang->get('information:address') . '; ОГРН ' . $lang->get('information:ogrn') . '.
		<p>
			<span>Технические данные сессии</span>
		</p>
		<p>
			<span>current: [' . Sessions::getCookie('current-url') . ']</span>
		</p>
		<p>
			<span>previous: [' . Sessions::getCookie('previous-url') . ']</span>
		</p>
		<p>
			<span style="overflow: hidden; width: 100%; max-height: 100px;">session: [' . Parser::toJson($_SERVER) . ']</span>
		</p>
	</div>
</div>

</div>
</body>
</html>';

$target = DR . 'app' . DS . 'Orders' . DS . $globals->get('id') . '_' . Prepare::numeric($message['phone']) . '.ini';
Local::createFile($target);
Local::writeFile($target, $this->message, 'replace');
