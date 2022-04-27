<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Components\User;
use is\Masters\View;

$user = User::getInstance();

if ($user -> isset()) {
	return;
} elseif ($_GET['success']) {
?>
<div class="row">
	<div class="col-12 mb-05">
		<div class="h4">
			Регистрация пользователя
		</div>
		<p class="color-theme pt-1">
			Регистрация прошла успешно.
		</p>
		<p>
			Теперь вы должны получить письмо со ссылкой на активацию. Без активации Вы не сможете пользоваться личным кабинетом! Это сделано для защиты от мошенников. Приносим извинения за неудобства.
		</p>
		<p>
		<a href="/" class="btn bg-theme">
			Вернуться на главную
		</a>
		</p>
	</div>
</div>
<?php
} else {
?>
<div class="row">
	<div class="col-12 mb-05">
		<div class="h4">
			Регистрация пользователя
		</div>
		<p class="color-theme">Все поля являются обязательными к заполнению</p>
	</div>
</div>
<div class="row">
	<div class="col-12 xs-col-10 sm-col-8 md-col-6">
<?php
	$view = View::getInstance();
	$view -> get('module') -> launch('form', 'default:register');
?>
	</div>
</div>
<?php
}
?>