<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;

use is\Masters\View;

$view = View::getInstance();

?>
<div class="border p-1 mx-05 mb-05">
	
	<div class="h3">
		Ваше обращение принято
	</div>
	<p class="fs-1 m-0 p-0">Чтобы написать еще одно обращение, нажмите на кнопку ниже</p>
	<p>
		<a
			class="btn bg-theme btn-lg mt-15"
			href="<?= $view->get('state|domain') . $view->get('state|path') . '#' . $this->settings['form']['id']; ?>"
			role="button"
		>Написать</a>
	</p>
	
</div>