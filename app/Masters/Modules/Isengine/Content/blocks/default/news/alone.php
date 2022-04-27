<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Local;

use is\Helpers\Parser;

use is\Masters\View;

$view = View::getInstance();

$data = $item -> getData();

?>

<div class="col-12">
	<h1 class="">
		<?= $data['title']; ?>
	</h1>
	<p class="mb-1 pb-1 b-0 bb border-second">
		<?= $data['date-display']; ?>
	</p>
</div>

<div class="col-12">
	<?= $data['description']; ?>
</div>

<div class="col-12">
	<?= $data['image']; ?>
</div>

<div class="col-12">
	<?= $data['content']; ?>
</div>

<div class="col-12">
	Автор: <?= $data['authors']; ?>
</div>

<?php
$path = DI . 'content' . DS . Strings::replace($this -> navigate -> current, ':', DS) . DS;
if (Local::matchFolder($path)) {
?>
<div class="col-12 pt-1">
	<h3 class="pb-05">Галерея</h3>
	<?php
		$view -> get('module') -> launch('media', 'default', '{
			"folder" : "content:' . $this -> navigate -> current . '",
			"slider" : { "enable" : false },
			"slideshow" : { "enable" : false },
			"gallery" : { "enable" : true }
		}');
	?>
</div>
<?php } ?>

<div class="col-12 pt-1">
	<h3 class="pb-05">Навигация</h3>
	<?php $this -> block('default:news:nav'); ?>
</div>

<?php
$count = 2;
if ($this -> navigate -> all > $count) {
?>
<div class="col-12 pt-1">
	<h3 class="pb-05">Похожие</h3>
	<div class="row">
	<?php
		$view -> get('module') -> launch('content', 'default:news:inner', '{
			"parents" : "' . $this -> parents . '",
			"exclude" : [
				"' . $this -> navigate -> current . '"
			]
		}');
	?>
	</div>
</div>
<?php } ?>