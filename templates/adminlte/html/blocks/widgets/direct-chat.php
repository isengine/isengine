<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="row">
	<div class="col-md-3">
		<?php
			$sets = '
				"common" : "card-primary card-outline direct-chat-primary",
				"badge" : "bg-primary",
				"button" : "btn-primary"
			';
			$view->get('module')->launch('data', 'adminlte-direct-chat', '{"classes":{' . $sets . '}}');
		?>
	</div>
	<div class="col-md-3">
		<?php
			$sets = '
				"common" : "card-success card-outline direct-chat-success",
				"badge" : "bg-success",
				"button" : "btn-success"
			';
			$view->get('module')->launch('data', 'adminlte-direct-chat', '{"classes":{' . $sets . '}}');
		?>
	</div>
	<div class="col-md-3">
		<?php
			$sets = '
				"common" : "card-warning direct-chat-warning",
				"badge" : "bg-danger",
				"button" : "btn-warning"
			';
			$view->get('module')->launch('data', 'adminlte-direct-chat', '{"classes":{' . $sets . '}}');
		?>
	</div>
	<div class="col-md-3">
		<?php
			$sets = '
				"common" : "card-danger direct-chat-danger",
				"badge" : "badge",
				"button" : "btn-danger"
			';
			$view->get('module')->launch('data', 'adminlte-direct-chat', '{"classes":{' . $sets . '}}');
		?>
	</div>
</div>