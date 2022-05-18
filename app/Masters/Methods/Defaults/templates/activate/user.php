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
	Вы активированы
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
	Активация прошла успешно!
</div>

<div style="line-height: 1.5em;">
    <p>Теперь Вы можете пользоваться своим личным кабинетом и другими возможностями зарегистрированного пользователя.</p>
    <p>Запомните свой логин для входа: <strong>' . $message['login'] . '</strong></p>
    <p>Также Вы можете использовать для входа свой номер телефона, который Вы указали при регистрации.</p>
    <p>Для продолжения, перейдите по ссылке ниже.</p>
    <a href="' . System::server('domain') . '/profile/">
        Войти в личный кабинет
    </a>
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
