<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row">
	<div class="col">
		<a href="/create/" class="btn color-white border-white b radius-1 px-05 xs-px-1 py-05 mr-05 fs-075 xs-fs-09" role="button">
			Создать заказ
		</a>
		<a href="/register/" class="btn color-white p-05 fs-075 xs-fs-09" role="button">
			Регистрация
		</a>
		<a href="/login/" class="btn color-white p-05 fs-075 xs-fs-09" role="button">
			Вход
		</a>
	</div>
</div>
