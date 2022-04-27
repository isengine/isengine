<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;

use is\Masters\View;

$view = View::getInstance();

$cart = $view -> get('vars|cart');
$cart_is = System::typeIterable($cart);
$success = Sessions::getCookie('order-complete');

?>

<div class="container pb-15<?= $cart_is ? ' none' : null; ?> catalog-cart-none">
	<div class="h1">
		<?php if ($success) { ?>
			Ваш заказ принят
		<?php } else { ?>
			В корзине ничего нет
		<?php } ?>
	</div>
	<p class="fs-1 m-0 p-0">Для выбора товаров, перейдите на главную</p>
	<p><a class="btn bg-theme btn-lg mt-15" href="/" role="button">На главную</a></p>
</div>
