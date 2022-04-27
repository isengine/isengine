<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$this -> custom();

//$this -> custom('format', 'ftim');
//$this -> custom('ctime', 'ctim');
//$this -> custom('dtime', 'dtim');

?>
<div class="row">
	<?php
		Objects::each($this -> getData(), function($data){
			
			if (!$data) {
				return;
			}
			
			$link = $data['link'] ? $data['link'] : '/catalog/' . Prepare::urlencode($data['title'], '/') . '/';
			$name = $data['title'];
			$image = '{img|/content/groups/catalog/' . $data['title'] . '.jpg:/content/groups/default.jpg:lazyload w-100 align-image-contain radius-1:' . $name . '}';
			$this -> tvars($image);
	?>
		<div class="col-6 sm-col-4 md-col-3 align-center mb-2">
			<a href="<?= $link ?>" class="block m-05">
				<div class="block border radius-1 mt-1">
					<?= $image; ?>
				</div>
			</a>
			<a href="<?= $link ?>" class="btn bg-theme">
				<div class="">
					<?= $name; ?>
				</div>
			</a>
		</div>
	<?php
		});
	?>
</div>