<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Sessions;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$lang = $view -> get('lang|this:cart-attention');

?>

<div class="h3 py-1">
	Корзина
</div>

<?php Objects::each($lang, function($item){ ?>
<div class="row align-items-center mb-05">
	<div class="col-auto fs-175">
		<i class="bi bi-exclamation-circle-fill color-theme"></i>
	</div>
	<div class="col pl-0">
		<span>
			<?= $item; ?>
		</span>
	</div>
</div>
<?php }); ?>