<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;

use is\Components\Globals;

$globals = Globals::getInstance();

?>
<div class="row">
	
	<div class="col-12 md-col order-2 md-order-1">
		
		<div class="row">
		<?php
			$this -> iterate([
				'default:catalog:values',
				$this -> type === 'alone' ? 'default:catalog:showroom:alone' : 'default:catalog:table'
			]);
		?>
		</div>
		
	</div>
	
</div>
<?php

if ($this -> type === 'alone') {
	return;
}

$globals -> set('catalog-settings', '[
	{
		"name" : "title",
		"title" : "Название",
		"type" : "text",
		"width" : "45%"
	},
	{
		"name" : "parents",
		"title" : "Раздел",
		"type" : "text",
		"width" : "25%"
	},
	{
		"name" : "price",
		"title" : "Цена",
		"type" : "number",
		"width" : "10%"
	},
	{
		"name" : "units",
		"title" : "Единицы",
		"type" : "text",
		"width" : "10%"
	},
	{
		"name" : "cart",
		"title" : "",
		"type" : "text",
		"width" : "10%"
	}
]');

?>
<div id="jsGrid"></div>