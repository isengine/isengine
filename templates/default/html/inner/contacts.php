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
	<div class="col-12 xs-col-5 sm-col-4">
		<h3><?= $view -> get('lang|information:formname:0') . ' ' . $view -> get('lang|information:company'); ?></h3>
		<p>
			ИНН <?= $view -> get('lang|information:inn'); ?>
			<br>
			ОГРН <?= $view -> get('lang|information:ogrn'); ?>
		</p>
		
		<h3>Наши телефоны:</h3>
		<p class="row flex-column mx-0">
			<?php $view -> get('block') -> launch('info:phones'); ?>
		</p>
		
		<h3>Почта:</h3>
		<p class="row flex-column mx-0">
			<?php $view -> get('block') -> launch('info:emails'); ?>
		</p>
		
		<h3>Наш адрес:</h3>
		<p><?= $view -> get('lang|information:address'); ?></p>
		
		<h3>График работы:</h3>
		<p><?= Strings::join($view -> get('lang|information:work'), ', '); ?></p>
	</div>
	<div class="col-12 xs-col-7 sm-col-8">
		<?php $view -> get('module') -> launch('map', 'default:map'); ?>
	</div>
</div>

<div class="row border-top mt-1 pt-1">
	<div class="py-05">
		<h3>Обратная связь</h3>
		<p>Оставьте свои вопросы, пожелания и комментарии</p>
	</div>
	<?php $view -> get('module') -> launch('form', 'default:contacts'); ?>
</div>