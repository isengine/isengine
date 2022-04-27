<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>

<div class="modal fade px-0" id="eshopFeedback" tabindex="-1" aria-labelledby="eshopFeedbackLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-fullscreen-lg-down">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="eshopFeedbackLabel">
					<h4>
						Обратная связь
					</h4>
					<span class="block">Оставьте свои вопросы, пожелания и комментарии</span>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php $view -> get('module') -> launch('form', 'default:contacts'); ?>
			</div>
		</div>
	</div>
</div>