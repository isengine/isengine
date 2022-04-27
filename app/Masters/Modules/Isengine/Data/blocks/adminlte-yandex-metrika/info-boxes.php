<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

$week = $this -> getData('week');
$info = $this -> getData('info');

?>
<div class="row">
	<?php Objects::each($info, function($index) use ($week) { ?>
	<div class="col-12 col-sm-4">
		<div class="info-box">
			<span class="info-box-icon elevation-1 <?= $week[$index]['color']; ?>"><i class="<?= $week[$index]['icon']; ?>"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">
					<?= $week[$index]['title']; ?>
					<a class="btn btn-tool" data-toggle="collapse" href="#collapse-<?= $index; ?>" role="button" aria-expanded="false" aria-controls="collapse-<?= $index; ?>">
						<i class="fas fa-question-circle"></i>
					</a>
				</span>
				<div class="collapse" id="collapse-<?= $index; ?>">
					<?= $week[$index]['description']; ?>
				</div>
				<span class="info-box-number">
					<?= $week[$index]['value']; ?>
					<small>(за неделю)</small>
				</span>
			</div>
		</div>
	</div>
	<?php }); ?>
</div>