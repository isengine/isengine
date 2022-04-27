<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$settings = '[
	{
		"name" : "submit",
		"type" : "submit",
		"class" : "btn-success",
		"icon" : "fas fa-check pr-1",
		"title" : "Сохранить и закрыть"
	},
	{
		"name" : "save",
		"type" : "button",
		"class" : "btn-primary",
		"icon" : "fas fa-pen pr-1",
		"title" : "Сохранить"
	},
	{
		"name" : "copy",
		"type" : "button",
		"class" : "btn-primary",
		"icon" : "fas fa-copy pr-1",
		"title" : "Скопировать"
	},
	{
		"name" : "new",
		"type" : "button",
		"class" : "btn-primary",
		"icon" : "fas fa-plus pr-1",
		"title" : "Создать"
	},
	{
		"name" : "close",
		"type" : "button",
		"class" : "btn-secondary",
		"icon" : "fas fa-times pr-1",
		"title" : "Закрыть"
	},
	{
		"name" : "reset",
		"type" : "button",
		"class" : "btn-danger",
		"icon" : "fas fa-undo pr-1",
		"title" : "Сбросить"
	},
	{
		"name" : "delete",
		"type" : "button",
		"class" : "btn-danger",
		"icon" : "fas fa-trash pr-1",
		"title" : "Удалить"
	}
]';

?>
<div class="row pb-3 mb-3">
	<div class="col-12">
	<?php Objects::each(Parser::fromJson($settings), function($item){ ?>
		<button type="<?= $item['type']; ?>" id="<?= 'adminlte-form-editor-' . $item['name']; ?>" class="btn <?= $item['class']; ?> mr-2 mb-2">
			<?= $item['icon'] ? '<i class="' . $item['icon'] . '"></i>' : null; ?>
			<?= $item['title']; ?>
		</button>
	<?php }); ?>
	</div>
</div>