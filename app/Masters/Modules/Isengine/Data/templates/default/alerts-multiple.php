<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

use is\Masters\View;

?>
<section class="container-fluid bg-second mb-05 pb-0 alert radius-0" id="alert" role="alert">
	<div class="sm-container">
		<div class="row">
			<div class="col">
				<?php Objects::each($this -> getData(), function($item) { ?>
					<div class="row pb-1">
						<div class="col">
							<?= $item['message']; ?>
							<?php
								if ($item['link']) {
									$view = View::getInstance();
							?>
							<a href="<?= $item['link']; ?>" class="color-white">
								<u><?= $view -> get('lang|common:readmore'); ?></u>
							</a>
							<?php } ?>
						</div>
					</div>
				<?php }); ?>
			</div>
			<div class="col-auto">
				<button type="button" class="btn-close btn-close-white" id="alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
</section>

<script>
	let button = document.getElementById("alert-button"); 
	button.onclick = function() {
		<?= $item['cookie']; ?>
		let block = document.getElementById("alert");
		block.remove();
	};
</script>
