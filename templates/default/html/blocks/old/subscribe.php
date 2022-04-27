<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

$form = [
	'ru' => [
		'email' => 'Введите свой адрес email...',
		'subscribe' => 'подписаться на обновления',
		'error' => 'При отправке формы произошла ошибка. Проверьте свои данные и попробуйте еще раз.'
	],
	'en' => [
		'email' => 'Enter your email address...',
		'subscribe' => 'subscribe to updates',
		'error' => 'An error occurred while submitting the form. Check your details and try again.'
	]
];

$form = $form[ $view -> get('state|lang') ];

?>
<form class="form">
	<input class="item email" type="email" name="email" placeholder="<?= $form['email']; ?>">
	<label class="item error hidden" for="email">
		<?= $form['error']; ?>
	</label>
	<a class="item submit">
		<?= $form['subscribe']; ?>
	</a>
</form>