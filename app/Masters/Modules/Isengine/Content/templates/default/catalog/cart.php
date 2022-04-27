<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Sessions;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$cart = $view -> get('vars|cart');
$cart_is = System::typeIterable($cart);

$data = Objects::keys($cart);
$this -> data -> leaveByList($data, 'name');

$isorder = $this -> settings['id'] === 'order';

$this -> block('default:catalog:cart:none');
?>

<div class="container<?= $isorder ? ' mb-025' : null; ?><?= !$cart_is ? ' none' : null; ?> catalog-cart">
	
	<?php
		if ($isorder) {
			$this -> block('default:catalog:cart:order', null);
		}
	?>
	
	<?php if ($isorder) { ?>
	<div class="bg-gray-1 p-05">
	<?php } ?>
	
	<table class="cart w-100 catalog-cart-main">
		<?php
			if ($cart_is) {
				$this -> iterate(['default:catalog:values', 'default:catalog:cart:list']);
			}
		?>
	</table>
	
	<?php if ($isorder) { ?>
	</div>
	<?php } ?>
	
	<?/*
	<div class="row flex-column justify-content-between bg-gray-1 p-05">
		<div>
			Вы уже получаете
		</div>
		<div>
			Закажите на XXX р и получите
		</div>
		<div>
			от 500 - бесплатную доставку
			<br>
			от 1000 по 1% - XX р на бонусный счет
			<br>
			от 2000 - дополнительную скидку 10 %
			<br>
			от 3000 - промокод на следующую покупку на скидку 10%
			<br>
			от 2000 - промокод на покупки у наших партнеров
			<br>
			от 3000 - бесплатный подарок
			<br>
			по акции - подарок к празднику
			<br>
			от 5000 на 10% - любой товар на выбор на сумму до 500 р
			<br>
			что-то еще?..
		</div>
		<div>
			CURR р ======= NEED р
			осталось XXX р
		</div>
	</div>
	*/?>
	
	<div class="row justify-content-between align-items-center <?= $isorder ? 'pt-15 pb-05' : 'py-05'; ?> catalog-cart-total">
		<div class="col fs-125">
			Итого товаров <strong class="catalog-cart-total-count">0</strong> 
			на общую сумму <strong><span class="catalog-cart-total-price">0</span>&nbsp;₽</strong>
			<?php // + дополнительные скидки <strong>__</strong>, к оплате <strong>____ Р</strong> // это все при оформлении ?>
		</div>
		<?php if (!$isorder) { ?>
		<div class="col-auto">
			<a href="/cart/" class="btn bg-theme">
				Оформить
			</a>
		</div>
		<?php } ?>
	</div>
	
	<?php
		if ($isorder) {
			$view -> get('module') -> launch('form', 'default:order');
		}
	?>
	
</div>

<?php if (!$isorder) { ?>
<table class="container none catalog-cart-template">
	<?php $this -> block('default:catalog:cart:list', null); ?>
</table>
<?php } ?>
