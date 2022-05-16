<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<div
	id="call" class="
		call
		flex
		flex-column
		align-items-end
		fixed
		z-index-3
	"
>
	<div class="collapse" id="bottom-buttons-collapse">
		<?= $view -> get('tvars') -> launch('{phone|{lang|information:phone:0}:button button--phone:<i class="bi-telephone"></i>}'); ?>
		<a class="button button--email" data-bs-toggle="modal" href="#feedback" role="button">
			<i class="bi-envelope"></i>
		</a>
		<?//= $view -> get('tvars') -> launch('{mail|{lang|information:email:0}:button button--email:<i class="bi-envelope"></i>:Вопрос с сайта {state|site}}'); ?>
		<?php
			Objects::each($view -> get('lang|social'), function($item) use ($view) {
				echo $view -> get('tvars') -> launch('{url|' . Strings::replace($item['url'], ['http:', 'https:'], '') . ':button button--' . $item['name'] . ':<i class="' . $item['class'] . '"></i>}');
			});
		?>
	</div>
	<a class="button bg-second" data-bs-toggle="collapse" href="#bottom-buttons-collapse" role="button" aria-expanded="false" aria-controls="bottom-buttons-collapse">
		<i class="bi-chat"></i>
	</a>
</div>