<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

$element = $item[0];
$item = $item[1];
$data = $item['options'];

$instance = Strings::after(Strings::after($this->instance, ':', null, true), '-', null, true);

$forms = [
	'login' => 'Войти',
	'reset' => 'Забыли пароль?',
	'register' => 'Зарегистрироваться'
];

?>
<div class="row justify-content-between align-items-center py-025">
	<div class="col-auto">
		<div id="emailHelp" class="form-text align-left">
			<?php
				Objects::each(
					Objects::removeByIndex($forms, [$instance]),
					function($item, $key){
			?>
				<a href="/<?= $key; ?>/" class="color-gray-6 color-black-hover"><?= $item; ?></a>
				<br>
			<?php
					}
				);
			?>
		</div>
	</div>
	<div class="col-auto">
		<?php $element->print(); ?>
	</div>
</div>