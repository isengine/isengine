<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>

<h2 class="py-1">
	<?= $view -> get('lang|offer'); ?>
</h2>

<p>Мы рады предложить вам недорогие, но качественные товары с подробными описаниями, характеристиками и фотографиями. У нас Вы можете купить замечательные товары: технику, электронику, одежду, обувь, игрушки, книги и многое другое в вашем регионе по ценам производителей и без наценки.</p>

<p>Продажа большого ассортимента разнообразных товаров – основная специализация нашего интернет-магазина. Мы доставим ваш заказ бесплатно в любой уголок мира, осуществим подробную консультацию по товарам и поможем с выбором.</p>

<p>Магазин «<?= $view -> get('lang|title'); ?>» предлагает Вам купить качественную и доступную технику, электронику, одежду, обувь, игрушки, книги и многое другое с доставкой! Все виды современных товаров от эконом класса до более дорогих представлены в нашем каталоге.</p>

<p>Вы можете купить любые товары в вашем городе: технику, электронику, одежду, обувь, игрушки, книги и многое другое.</p>

<p>Наши главные преимущества:</p>

<ul class="pl-15 mb-1" style="list-style: disc;">
	<li>Низкие цены от производителей</li>
	<li>Доставка по городу в день заказа</li>
	<li>Доставка заказов Почтой по всей Стране от 3 дней</li>
	<li>Только оригинальная и сертифицированная продукция</li>
	<li>Гарантия на все товары – 5 лет!</li>
	<li>Не понравился товар? Вернем или обменяем в течение 14-ти дней без оформления лишних бумаг!</li>
	<li>Бонусы и скидки для постоянных покупателей</li>
</ul>

<?php
$view -> get('block') -> launch('custom:facts');
$view -> get('block') -> launch('custom:partners');
?>

<div class="py-3">
	
<p>Если у Вас появились вопросы, достаточно оставить заявку. Наш менеджер выйдет на связь, а специалисты разработают индивидуальное коммерческое предложение для быстрого достижения поставленных целей с учетом Ваших приоритетов и возможностей.</p>

<div class="row">
	<div class="col-12 py-1">
		<ul class="nav nav-tabs" id="list-tab" role="tablist">
			<li class="nav-item">
				<a href="#list-submit" class="nav-link active" id="list-submit-list" data-bs-toggle="list" role="tab" aria-controls="list-submit">Оставить заявку</a>
			</li>
			<li class="nav-item">
				<a href="#list-call" class="nav-link" id="list-call-list" data-bs-toggle="list" role="tab" aria-controls="list-call">Заказать звонок</a>
			</li>
		</ul>
	</div>
	<div class="col-12 none">
		<div class="list-group flex-row" id="list-tab" role="tablist">
			<a href="#list-submit" class="inline-block b-0 bb-1 p-1 border-none color-black active" id="list-submit-list" data-bs-toggle="list" role="tab" aria-controls="list-submit">
				Оставить заявку
			</a>
			<a href="#list-call" class="inline-block b-0 bb-1 p-1 border-none color-black" id="list-call-list" data-bs-toggle="list" role="tab" aria-controls="list-call">
				Заказать звонок
			</a>
		</div>
	</div>
	<div class="col-12">
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="list-submit" role="tabpanel" aria-labelledby="list-submit-list">
				<?php $view -> get('module') -> launch('form', 'default:contacts'); ?>
			</div>
			<div class="tab-pane fade" id="list-call" role="tabpanel" aria-labelledby="list-call-list">
				<?php $view -> get('module') -> launch('form', 'default:call'); ?>
			</div>
		</div>
	</div>
</div>

</div>
