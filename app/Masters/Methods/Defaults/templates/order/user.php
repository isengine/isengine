<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
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
	Ваш заказ принят
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
	Здравствуйте, ' . $message['name'] . '
</div>

<div style="line-height: 1.5em;">
	Благодарим Вас за заказ с сайта ' . System::server('host') . '<br>
	Ваш заказ ' . $globals->get('id') . ' принят в обработку.
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
			' . $message['address'] . '
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
			' . ($message['phone'] ? $message['phone'] : 'не указан') . '
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

<div>
<p style="color: #bb3742;">Уважаемые жители! В связи с тем, что ФАКТИЧЕСКИЙ вес обычно ОТЛИЧАЕТСЯ от заказанного, итоговая сумма пересчитывается и может меняться как в большую, так и в меньшую сторону.</p>
<p style="color: #bb3742;">Все заказы, созданные после 13:00, будут доставлены на следующий день.</p>	
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
