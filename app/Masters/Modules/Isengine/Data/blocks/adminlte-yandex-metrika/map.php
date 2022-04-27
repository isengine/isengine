<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

$week = $this -> getData('week');
$footer = $this -> getData('footer');

?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			
			<div class="card-header">
				<h5 class="card-title">
					График посещаемости сайта
				</h5>
				<div class="card-tools">
					<a href="https://metrika.yandex.ru/dashboard?id=<?= $this -> getData('id'); ?>" target="blank" class="btn btn-tool">
						<i class="fas fa-external-link-alt"></i>
					</a>
					<?php /*
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
					*/ ?>
				</div>
			</div>
			
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<?php if ($this -> getData('month')) { ?>
						<p class="text-center">
							<strong><?= date('d.m.Y', time() - 2592000) . ' - ' . date('d.m.Y', time() - 86400); ?></strong>
						</p>
						<div class="chart">
							<canvas id="monthlyChart" height="180" style="height: 180px;"></canvas>
						</div>
						<?php } ?>
						<?php if ($this -> getData('year')) { ?>
						<p class="text-center">
							<strong><?= date('m.Y', time() - 31104000) . ' - ' . date('m.Y', time() - 2592000); ?></strong>
						</p>
						<div class="chart">
							<canvas id="yearlyChart" height="180" style="height: 180px;"></canvas>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			
			<div class="card-footer">
				<div class="row">
					
					<?php Objects::each($footer, function($index) use ($week) { ?>
					<div class="col-sm-3 col-6">
						<div class="description-block border-right">
							<h5 class="description-header">
								<?= $week[$index]['value']; ?>
								<a class="btn btn-tool" data-toggle="collapse" href="#collapse-<?= $index; ?>" role="button" aria-expanded="false" aria-controls="collapse-<?= $index; ?>">
									<i class="fas fa-question-circle"></i>
								</a>
							</h5>
							<span class="description-text">
								<?= $week[$index]['title']; ?>
							</span>
							<div class="pt-2 px-4 collapse" id="collapse-<?= $index; ?>">
								<?= $week[$index]['description']; ?>
							</div>
						</div>
					</div>
					<?php }); ?>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
