<?php

namespace is\Masters\Modules\Isengine\Map;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$instance = Strings::after($this -> instance, ':', null, true);
$this->settings = Objects::merge(
    [
        'classes' => null,
        'width' => null,
        'height' => null,
        'service' => null,
        'api' => null,
        'type' => null,
        'zoom' => null,
        'coordinates' => null,
        'position' => null,
        'controls' => null
    ],
    $this->settings
);
$sets = &$this -> settings;

?>

<div class="modal fade px-0" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-fullscreen-lg-down">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mapModalLabel">
					<span class="location">Карта</span>
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
				<div
					id="<?= $instance; ?>"
					class="
						<?= $sets['classes'] ? $sets['classes'] : null; ?>
					"
					<?php if ($sets['width'] || $sets['height']) { ?>
					style="
						<?= $sets['width'] ? 'width: ' . $sets['width'] . ';' : null; ?>
						<?= $sets['height'] ? 'height: ' . $sets['height'] . ';' : null; ?>
					"
					<?php } ?>
				></div>

				<?php $this -> block( $sets['service'] . ($sets['api'] ? '.' . $sets['api'] : null) ); ?>
				
			</div>
			<div class="modal-footer justify-content-between">
				<span class="">
					Перемещайте карту, чтобы метка указывала в то место, куда нужно заказать доставку
				</span>
				<button type="button" class="btn bg-theme" data-bs-dismiss="modal">Применить</button>
			</div>
		</div>
	</div>
</div>
