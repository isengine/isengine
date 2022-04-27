<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();

$options = '[
	{
		"name" : "heading",
		"type" : "switch",
		"title" : "Показывать название колонок",
		"value" : true
	},
	{
		"name" : "inserting",
		"type" : "switch",
		"title" : "Разрешить добавление новых строк",
		"value" : false
	},
	{
		"name" : "editing",
		"type" : "switch",
		"title" : "Редактирование внутри таблицы",
		"value" : false
	},
	{
		"name" : "filtering",
		"type" : "switch",
		"title" : "Поиск и фильтрация",
		"value" : true
	},
	{
		"name" : "sorting",
		"type" : "switch",
		"title" : "Сортировка по колонкам",
		"value" : true
	},
	{
		"name" : "paging",
		"type" : "switch",
		"title" : "Разбивка на страницы",
		"value" : true
	},
	{
		"name" : "pageSize",
		"type" : "number",
		"title" : "Число строк на странице",
		"value" : 15
	}
	
]';

?>
<div class="card-header">
	<h3 class="card-title">Параметры отображения</h3>
</div>
<div class="card-body">
	<form id="jsGridOptions" onsubmit="return false">
		<?php Objects::each(Parser::fromJson($options), function($item, $key){ ?>
		<div class="row mb-3">
			<div class="col">
				<label for="jsGridOptions-<?= $item['name']; ?>" class="form-label">
					<?= $item['title']; ?>
				</label>
			</div>
			<div class="col">
				<?php
					if ($item['type'] === 'switch') {
				?>
				<input type="checkbox" name="<?= $item['name']; ?>" id="jsGridOptions-<?= $item['name']; ?>" <?= $item['value'] ? 'checked' : null; ?> data-bootstrap-switch data-on-color="success">
				<?php
					} else {
				?>
				<input type="<?= $item['type']; ?>" name="<?= $item['name']; ?>" id="jsGridOptions-<?= $item['name']; ?>" value="<?= $item['value']; ?>">
				<?php
					}
				?>
			</div>
		</div>
		<?php }); ?>
	</form>
</div>