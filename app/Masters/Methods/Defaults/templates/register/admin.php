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

$content = null;

Objects::each($message, function ($item, $key) use (&$content) {
    $content .= '<tr>
    <td>' . $key . ':</td>
    <td>' . (
        !empty($item)
        ? (System::typeIterable($item) ? Strings::join($item, ', ') : $item)
        : 'не задан'
    ) . '</td>
</tr>';
});

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
	Новая регистрация на сайте ' . System::server('host') . '
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
	Регистрационные данные:
</div>

<div>
<table>
<tbody>
    ' . $content . '
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
