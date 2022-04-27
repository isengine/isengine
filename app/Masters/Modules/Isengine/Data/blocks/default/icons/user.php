<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

use is\Masters\View;

$view = View::getInstance();

?>
<div class="row py-025">
		<a href="/adminlte/" class="color-gray-8 color-gray-6-hover py-025 mb-025 col-12 align-left">
			Панель управления
		</a>
		<a href="/admin/" class="color-gray-8 color-gray-6-hover py-025 mb-025 col-12 align-left">
			Старая админка
		</a>
		<a href="/profile/" class="color-gray-8 color-gray-6-hover py-025 mb-025 col-12 align-left">
			Личный кабинет
		</a>
		<a href="/api/default/logout/" class="color-theme py-025 mb-025 col-12 align-left">
			Выйти
		</a>
</div>