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

$social = null;

Objects::each($lang->get('social'), function($item) use (&$social){
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
	Вы зарегистрированы
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
	Добро пожаловать на ' . System::server('host') . '
</div>

<div style="line-height: 1.5em;">
    <p>Мы рады приветствовать Вас!</p>
    <p>Для продолжения, перейдите по ссылке ниже, чтобы подтвердить свою регистрацию.</p>
    <p>
        <a href="' . System::server('domain') . '/api/defaults/activate/?login=' . $message['login'] . '&confirm=' . $message['confirm'] . '">
            Подтвердить регистрацию
        </a>
    </p>
    <p>Если вы зарегистрировались по ошибке, можете просто проигнорировать данное письмо.</p>
    <p>Если это были не вы, срочно свяжитесь со службой техподдержки. Возможно, кто-то пробует зарегистрироваться от Вашего имени.</p>
    <p>
        <a href="' . System::server('domain') . '">
            Перейти на сайт
        </a>
    </p>
</div>

<div style="font-size: 21px;">
	Регистрационные данные:
</div>

<div>
<table>
<tbody>
	<tr>
		<td>
			Адрес&nbsp;email:
		</td>
		<td>
			' . ($message['login'] ? $message['login'] : 'не указан') . '
		</td>
	</tr>
	<tr>
		<td>
			Номер&nbsp;телефона:
		</td>
		<td>
			' . ($message['phone'] ? $message['phone'] : 'не указан') . '
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

?>