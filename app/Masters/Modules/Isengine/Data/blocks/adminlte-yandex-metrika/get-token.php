<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$id = $this -> getData('id');

?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			
			<div class="card-header">
				<h5 class="card-title">
					График посещаемости сайта
				</h5>
				<div class="card-tools">
					<a href="https://metrika.yandex.ru/<?= $id ? 'dashboard?id=' . $id : null; ?>" target="blank" class="btn btn-tool">
						<i class="fas fa-external-link-alt"></i>
					</a>
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						
						<p>
							<a href="https://metrika.yandex.ru/" target="blank">
								get id
							</a>
						</p>
						<p>
							<a href="https://oauth.yandex.ru/authorize?response_type=token&client_id=30f13b9c89f84a70902db8b0b4e60f4a" target="blank">
								get token
							</a>
						</p>
						<p>
							<a href="https://oauth.yandex.ru/client/new" target="blank">
								create new app
							</a>
						</p>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>