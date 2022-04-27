<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Datetimes;
use is\Masters\View;

$view = View::getInstance();

$mtime = filemtime($view -> get('state|real') . 'html' . DS . 'inner' . DS . $view -> get('state|route-string') . '.php');
$date = Datetimes::convert($mtime, '{abs}', '{day}.{month}.{year} г.');

$site = $view -> get('state|site');

$domain = $view -> get('state|domain');
$domain = '<a href="' . $domain . '">' . $domain . '</a>';

$url = $view -> get('state|url');
$url = '<a href="' . $url . '">' . $url . '</a>';

$mail = $view -> get('lang|information:email:0');
$mail = $view -> get('tvars') -> launch('{mail|' . $mail . '}');

$company = $view -> get('lang|information:formname:0') . ' ' . $view -> get('lang|information:company');

$inn = $view -> get('lang|information:inn');
if ($inn) {
	$company .= ', ИНН ' . $inn;
}

$ogrn = $view -> get('lang|information:ogrn');
if ($ogrn) {
	$company .= ', ОГРН ' . $ogrn;
}

$person = Strings::join($view -> get('lang|information:director'), ' ');
if ($person) {
	$company .= ', от имени и в интересах которой действует ' . $person;
}

$address =
	$view -> get('lang|information:postcode') . ', ' . 
	$view -> get('lang|information:country') . ', ' . 
	$view -> get('lang|information:state') . ', ' . 
	$view -> get('lang|information:city') . ', ' . 
	$view -> get('lang|information:street');

?>
<h1 class="pt-2">
	Условия оплаты, доставки, обмена и возврата товара и/или выполнения услуги
</h1>

<p class="align-right">
	Дата публикации: <?= $date; ?>
</p>

<ol class="document px-0 py-1">
	<li>
		<h2>
			Общие положения
		</h2>
		<ol>
<li>Настоящие условия оплаты, доставки, обмена и возврата товара и/или выполнения услуги (далее - Условия) составлены в соответствии с положениями Закона РФ от 07.02.1992 N 2300-1 (ред. от 11.06.2021) «О защите прав потребителей» и регулирует отношения между <?= $company; ?> (далее – Оператор), включая сотрудников и Пользователем.</li>

<li>Пользуясь Сайтом Пользователь подтверждает, что он ознакомлен с настоящими Условиями в полном объеме, принимает их в полном объеме и обязуется их соблюдать или прекратить использование Сайта.</li>

<li>Если Пользователь не согласен с настоящими Условиями или не может по каким-либо причинам их принять, ему следует незамедлительно прекратить любое использование Сайта.</li>

<li>Условия могут быть изменены Оператором без какого-либо специального уведомления. Новая редакция Условий вступает в силу с момента ее размещения на Сайте либо доведения до сведения Пользователя в иной удобной форме, если иное не предусмотрено новой редакцией Условий.</li>
		</ol>
	</li>
	<li>
		<h2>
			Основные понятия
		</h2>
		<ol>
<li><strong>Веб-сайт</strong> – совокупность графических и информационных материалов, а также программ для ЭВМ и баз данных, обеспечивающих их доступность в сети интернет по сетевому адресу <?= $domain; ?>.</li>

<li><strong>Оператор</strong> – государственный орган, муниципальный орган, юридическое или физическое лицо, самостоятельно или совместно с другими лицами организующие и (или) осуществляющее свою деятельность посредством сайта, обеспечивающее контроль сайта, его обслуживание и поддержку.</li>

<li><strong>Пользователь</strong> – любое лицо посещающее веб-сайт <?= $domain; ?>, а также использующее интегрированные с ним сервисы, службы, программные продукты или услуги Оператора.</li>
		</ol>
	</li>
	<li>
		<h2>
			Условия оплаты
		</h2>
		<ol>
<li>Пользователь может приобрести товар и/или услугу на Сайте, оплатив его наличными, кредитной картой, электронными деньгами, с лицевого счёта мобильного телефона, банковским переводом по квитанции, подарочным сертификатом, баллами и другими разрешенными способами, для которых на Сайте реализовано техническое обеспечение.</li>

<li>Пользователь соглашается, что выбранный им способ оплаты не подлежит изменению с момента оформления заказа на Сайте.</li>

<li>Пользователь соглашается, что подтверждение заказа, оплаченного выбранным способом, происходит только после подтверждения списания денежных средств в счёт оплаты заказа.</li>

<li>Пользователь подтверждает, что оплата заказа выбранным способом должна быть произведена в течение 5 календарных дней с момента его оформления на Сайте. Пользователь соглашается, что в случае неоплаты заказа по истечении указанного срока, заказ может быть аннулирован.</li>
		</ol>
	</li>
	<li>
		<h2>
			Условия доставки товара и/или выполнения услуги
		</h2>
		<ol>
<li>Сайт осуществляет доставку товара курьерской доставкой, доставкой в пункт выдачи, почтовыми службами доставки и другими разрешенными способами, для которых на Сайте реализовано техническое обеспечение.</li>

<li>Пользователь вправе выбрать любой удобный для него способ доставки в соответствии с условиями доставки в свой регион/страну или исходя из своих предпочтений.</li>

<li>Срок доставки товара и/или выполнения услуги расчитывается индивидуально в зависимости от выбранного Пользователем способа доставки и объема заказанных товаров и/или услуг.</li>

<li>Пользователь соглашается, что информация на Сайте касательно стоимости и сроков доставки товара и/или выполнения услуги носит исключительно уведомительный характер. Окончательная стоимость и сроки расчитываются после оформления Пользователем заказа.</li>

<li>Пользователь соглашается, что доставка некоторых крупногабаритных товаров отдельно выбранными способами доставки может осуществляется только до подъезда, либо в пункт выдачи заказов с последующим самовывозом.</li>

<li>Пользователь соглашается, что если по адресу доставки действует пропускной режим, то необходимо будет обеспечить доступ курьера (открыть шлагбаум, заказать пропуск и т.п.). Иначе заказ не сможет быть доставлен на место.</li>
		</ol>
	</li>
	<li>
		<h2>
			Условия отмены и возврата
		</h2>
		<ol>
<li>Пользователь имеет право проверить качество товара и/или услуги на соответствие заказанному при его/ее получении.</li>

<li>Пользователь соглашается, что в случае невозможности передачи ему товара по вине Пользователя, в том числе нарушения им срока, в течение которого Пользователь обязан забрать товар и/или воспользоваться услугой, это будет расцениваться Сайтом как отказ Пользователя от товара и/или услуги. При этом товар и/или услуга возвращается Сайту, а заказ считается аннулированным.</li>

<li>В случае отказа Пользователя от товара и/или услуги, а также в случае отсутствия заказанного Пользователем товара и/или невозможности выполнить услугу, перечисленная Сайту предоплата за товар и/или услугу, за исключением расходов Сайта на доставку товара и/или подготовку к реализации услуги, будет возвращена Пользователю не позднее, чем через 10 календарных дней с даты предъявления Пользователем соответствующего требования.</li>

<li>Возврат товара надлежащего качества возможен в случае, если сохранены его товарный вид, потребительские свойства, а также документ, подтверждающий факт и условия покупки указанного товара. Отсутствие у Пользователя документа, подтверждающего факт и условия покупки товара, не лишает его возможности ссылаться на другие доказательства приобретения товара у данного продавца.</li>

<li>Пользователь не вправе отказаться от товара надлежащего качества, имеющего индивидуально-определенные свойства, если указанный товар может быть использован исключительно приобретающим его Пользователем.</li>
		</ol>
	</li>
	<li>
		<h2>
			Правовые условия
		</h2>
		<ol>
<li>Согласно ст. 21 Закона РФ «О защите прав потребителей» в случае обнаружения Пользователем недостатков товара и предъявления требования о его замене, товар ненадлежащего качества должен быть заменен на новый товар, не бывший в употреблении.</li>

<li>Согласно ст. 24 Закона РФ «О защите прав потребителей» при замене товара ненадлежащего качества на товар этой же марки, модели, артикула, перерасчет цены товара не производится.</li>

<li>Согласно ст. 25 Закона РФ «О защите прав потребителей» Пользователь вправе осуществить обмен или возврат товара надлежащего качества.</li>

<li>Согласно ст. 26.1 Закона РФ «О защите прав потребителей», Пользователь вправе вернуть любой товар, приобретённый в интернет-магазине, в течение 7 дней после получения товара без указания причин возврата.</li>

<li>Согласно ст. 29 Закона РФ «О защите прав потребителей» при обнаружении недостатков оказанной услуги Пользователь вправе потребовать устранить недостатки, а также воспользоваться иными указанными правами.</li>

<li>Согласно ст. 32 Закона РФ «О защите прав потребителей» Пользователь может отказаться от заказа на оказание услуг в любое время при условии оплаты заказа.</li>
		</ol>
	</li>
	<li>
		<h2>
			Заключительные положения
		</h2>
		<ol>
<li>Пользователь может получить любые разъяснения по интересующим вопросам, касающимся настоящих Условий, обратившись к Оператору с помощью электронной почты <?= $mail; ?>.</li>

<li>В данном документе будут отражены любые изменения настоящих Условий Оператором. Настоящие Условия действуют бессрочно до замены их новой версией.</li>

<li>Оператор имеет право вносить изменения в настоящие Условия. При внесении изменений в заголовке Условий указывается дата последнего обновления редакции. Новая редакция Условий вступает в силу с момента ее размещения на сайте, если иное не предусмотрено новой редакцией Условий.</li>

<li>Актуальная версия Условий в свободном доступе расположена в сети Интернет по адресу <?= $url; ?>.</li>
		</ol>
	</li>
	<li>
		<h2>
			Контакты и реквизиты
		</h2>
		<ol>
			<li>
				Все вопросы, связанные со сроками и условиями доставки товара и/или выполнения услуги, Пользователь может направить:
				<ol>
<li>по адресу электронной почты: <?= $mail; ?></li>

<li>по почтовому адресу: <?= $address; ?></li>

<li>реквизиты: <?= $company; ?></li>
				</ol>
			</li>
		</ol>
	</li>
</ol>