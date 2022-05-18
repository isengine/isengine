<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Components\Language;

// читаем глобальные данные

$lang = Language::getInstance();

$logo = $lang->get('logo:0');
if (Strings::get($logo, 0, 1) === '/') {
    $logo = System::server('domain') . $logo;
}

$message = $this->message;
$this->message = null;

$social = null;

Objects::each($lang->get('social'), function ($item) use (&$social) {
    $social .= '<a href="' . $item['url'] . '" target="blank" rel="noopener noreferrer"><span>' . $item['name'] . '</span></a> ';
});

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
	</style>
</head>
<body>

<div style="margin: auto; padding: 0; max-width: 600px; font-family: Arial; font-size: 14px; color: #000000; background: #ffffff;">

<div style="font-size: 10px; color: #777777;">
	Вы создали новый заказ
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
	Вы опубликовали новый заказ на ' . System::server('host') . '
</div>

<div style="line-height: 1.5em;">
    <p>Номер заказа: <strong>' . $message['name'] . '</strong></p>
    <p>Для просмотра, перейдите по ссылке ниже.</p>
        <a href="' . System::server('domain') . '/' . Strings::join($message['parents'], '/') . '/' . $message['name'] . '/" target="blank">
            Перейти на страницу заказа
        </a>
    </p>
    <p>Если это были не вы, срочно свяжитесь со службой техподдержки. Возможно, кто-то пробует создать заказ от Вашего имени.</p>
    <p>
        <a href="' . System::server('domain') . '">
            Перейти на сайт
        </a>
    </p>
</div>

<div style="font-size: 21px;">
	Данные заказа:
</div>

<div>
<table>
<tbody>
	<tr>
		<td>
			Название:
		</td>
		<td>
			' . ($message['data']['name'] ? $message['data']['name'] : 'не указано') . '
		</td>
	</tr>
	<tr>
		<td>
			Номер&nbsp;телефона:
		</td>
		<td>
			' . ($message['data']['phone'] ? $message['data']['phone'] : 'не указан') . '
		</td>
	</tr>
	<tr>
		<td>
			Срок&nbsp;выполнения (в&nbsp;днях):
		</td>
		<td>
			' . ($message['data']['days'] ? $message['data']['days'] : 'не указан') . '
		</td>
	</tr>
	<tr>
		<td>
			Стоимость (в&nbsp;руб):
		</td>
		<td>
			' . ($message['data']['price'] ? $message['data']['price'] : 'не указана') . '
		</td>
	</tr>
</tbody>
</table>
</div>

<div style="color: #808080;">
	С уважением,<br> 
	команда <a href="' . System::server('domain') . '">' . System::server('host') . '</a>
</div>

<div class="footer">
	<div style="font-size: 10px; color: #999999;">
		<div>' . $social . '</div>
		Вы получили это письмо, потому что зарегистрированы на сайте 
		<a href="' . System::server('domain') . '" target="blank" rel="noopener noreferrer">
		<span>' . System::server('host') . '</span></a>. Данное письмо не требует ответа. 
		<br>
		' . $lang->get('information:formname:0') . ' ' . $lang->get('information:company') . '; ' . $lang->get('information:postcode') . ', ' . $lang->get('information:address') . '; ОГРН ' . $lang->get('information:ogrn') . '.
		<p>
			<a href="' . System::server('domain') . '/privacy/" target="blank" rel="noopener noreferrer">
				<span>Политика конфиденциальности в отношении обработки персональных данных</span>
			</a>
		</p>
		<p>
			<a href="' . System::server('domain') . '/agreement/" target="blank" rel="noopener noreferrer">
				<span>Пользовательское соглашение</span>
			</a>
		</p>
		<p>
			<a href="' . System::server('domain') . '/terms/" target="blank" rel="noopener noreferrer">
				<span>Условия оплаты, доставки, обмена и возврата товара и/или выполнения услуги</span>
			</a>
		</p>
		<p>
			<a href="' . System::server('domain') . '/contacts/" target="blank" rel="noopener noreferrer">
				<span>Обратная связь</span>
			</a>
		</p>
		<p>
			<a href="' . System::server('domain') . '/about/" target="blank" rel="noopener noreferrer">
				<span>О компании</span>
			</a>
		</p>
	</div>
</div>

</div>
</body>
</html>';
