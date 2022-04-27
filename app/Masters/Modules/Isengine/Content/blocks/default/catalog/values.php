<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Helpers\Paths;
use is\Helpers\Local;
use is\Helpers\Datetimes;

if (!$item) {
    return;
}

use is\Masters\View;
use is\Components\Globals;

$view = View::getInstance();
$globals = Globals::getInstance();

$data = Objects::merge(
    [
        'title' => null,
        'image' => null,
        'gallery' => null,
        'date' => null,
        'tags' => null,
        'price' => null,
        'price-opt' => null,
        'opt' => null,
        'sale' => null,
        'step' => null
    ],
    $item -> getData()
);

$name = $item -> getEntryKey('name');
$parents = $item -> getEntryKey('parents');
$parents = $parents ? (Strings::join($parents, '/') . '/') : null;
$id = Strings::replace(Strings::replace($parents, '/', '-') . $name, ' ', '_');
$name = Strings::replace($parents, '/', ':') . $name;

// считаем цену

// opt         Количество в упаковке
// step        Шаг покупки
// price       Цена единицы
// price-opt   Цена упаковки
// sale        Скидка

// читаем цену из общего прайса

//$combine = $view -> get('vars|catalog-combine');
$combine = $globals -> get('catalog-combine');

//System::debug($combine);

if ($combine) {
	
	$cname = Prepare::urldecode(Strings::replace($parents, '/', ':') . $data['title']);
	$cdata = $combine[$cname];
	$ckeys = [
		'price',
		'price-opt',
		'sale'
	];
	
	//System::debug($cname, '!q');
	//System::debug($cdata);
	
	Objects::each($ckeys, function($item) use (&$cdata, &$data){
		//if ($cdata[$item]) {
		//}
		$data[$item] = $cdata[$item];
	});
	
}

// работаем над ценой

if (System::typeOf($data['price'], 'iterable')) {
	Objects::each($data['price'], function($item){
		return System::typeTo($item, 'numeric');
	});
}

$data['price'] = $data['price'] ? Objects::sort(Objects::convert($data['price'])) : [];
$price = System::typeTo(Objects::last($data['price'], 'value'), 'numeric');
$price_old = System::typeTo(Objects::first($data['price'], 'value'), 'numeric');

if ($price_old === $price) {
	$price_old = null;
}

if (System::typeOf($data['price-opt'], 'iterable')) {
	Objects::each($data['price-opt'], function($item){
		return System::typeTo($item, 'numeric');
	});
}

// работаем над ценой за упаковку

$data['price-opt'] = $data['price-opt'] ? Objects::sort(Objects::convert($data['price-opt'])) : [];

$price_opt = System::typeTo(Objects::last($data['price-opt'], 'value'), 'numeric');
$price_opt_old = System::typeTo(Objects::first($data['price-opt'], 'value'), 'numeric');

if ($price_opt_old === $price_opt) {
	$price_opt_old = null;
}

// высчитываем размер, количество, объемы

$opt = System::typeTo($data['opt'], 'numeric');

if ($opt) {
	if ($price_opt && !$price) {
		$price = $price_opt / $opt;
	}
	if (!$price_opt && $price) {
		$price_opt = $price * $opt;
	}
}
// высчитываем скидку

$sale = System::typeTo($data['sale'], 'numeric');

if (!$sale) {
	if ($price && $price_old) {
		$sale = floor(100 - (100 * $price / $price_old));
	} elseif ($price_opt && $price_opt_old) {
		$sale = floor(100 - (100 * $price_opt / $price_opt_old));
	}
} else {
	if ($price) {
		$price_old = $price;
		$price = ceil($price - $price * $sale / 100);
	}
	if ($price_opt) {
		$price_opt_old = $price_opt;
		$price_opt = ceil($price_opt - $price_opt * $sale / 100);
	}
	
	// после расчета скидки снова обновляем объемы
	// это нужно потому, что скидка может установить новую цену
	// и от этой цены будут заново расчитаны объемы
	
	if ($opt) {
		if (!$price) {
			$price = $price_opt / $opt;
		}
		if (!$price_opt) {
			$price_opt = $price * $opt;
		}
	}
}

// после окончания всех расчетов можно расчитать объем
// если он не был установлен

if (!$opt && $price_opt && $price) {
	$opt = $price_opt / $price;
}

// задаем шаг покупки

$step = $data['step'] ? $data['step'] : 1;

// читаем заказанное количество данного товара

$value = Sessions::getCookie(Prepare::urlencode($name));

// высчитываем итоговую цену

$total = $price * $value;

//$value = 10.25;
//$step = 0.1;
//echo \is\Helpers\Math::divide($value, $step);
//echo \is\Helpers\Math::precision(5.8257846, 3) . '<br>';

// устанавливаем изображение и галерею
// вручную или на автомате

$image_link = '/content/items/' . $parents . $data['title'];
$image = $data['image'] ? $data['image'] : $image_link . '.jpg';
$image_real = DI . Strings::replace(Strings::unfirst($image), '/', DS);

$gallery_link = $data['gallery'] ? $data['gallery'] : $image_link . '/';
$gallery = null;
$gallery_real = DI . Strings::replace(Strings::unfirst($gallery_link), '/', DS);

if (Local::matchFolder($gallery_real)) {
	$list = Local::search($gallery_real, [
		'return' => 'files',
		'subfolders' => false,
		'merge' => true,
		'info' => 'name',
		'extension' => 'jpg:jpeg:gif:png:webp:jfif:avif',
	]);
	Objects::each($list, function($item) use (&$gallery, $gallery_link){
		$gallery[] = $gallery_link . $item;
	});
}

if (
	!Local::matchFile($image_real) &&
	$gallery
) {
	$image = Objects::first($gallery, 'value');
}

//$image = Prepare::urlencode($image, '/');

if ($view -> getData('tvars')) {
	$image_contain = $view -> get('tvars') -> launch( '{img|' . $image . ':/content/items/default.jpg:lazyload w-100 align-image-contain:' . $data['title'] . '}' );
	$image_cover = $view -> get('tvars') -> launch( '{img|' . $image . ':/content/items/default.jpg:lazyload w-100 align-image-cover height-100:' . $data['title'] . '}' );
} else {
	$image_contain = '<img src="' . $image . '" data-srcset="' . $image . '" srcset="/content/items/default.jpg" class="lazyload w-100 align-image-contain" alt="' . $data['title'] . '" />';
	$image_cover = '<img src="' . $image . '" data-srcset="' . $image . '" srcset="/content/items/default.jpg" class="lazyload w-100 align-image-cover" alt="' . $data['title'] . '" />';
}

// устанавливаем даты

$ctime = $item -> get('ctime');
//$date = $ctime ? $ctime : $view -> get('time') -> convert($data['date'], '{day}.{month}.{year}', '{abs}');
//$date_display = $data['date'] ? $data['date'] : $view -> get('time|' . $ctime, '{day}.{month}.{year}');
$date = $ctime ? $ctime : Datetimes::convert($data['date'], '{day}.{month}.{year}', '{abs}');
$date_display = $data['date'] ? $data['date'] : Datetimes::convert($ctime, '{abs}', '{day}.{month}.{year}');

// устанавливаем метки

$tags = $data['tags'] ? Objects::convert($data['tags']) : [];

// устанавливаем ссылку

$link = Prepare::urlencode('/' . $parents . $item -> getEntryKey('name') . '/', '/');

// записываем все расчитанные данные

$item -> setData(Objects::merge(
	$item -> getData(),
	[
		'id' => $id,
		'name' => $name,
		
		'step' => $step,
		'opt' => $opt,
		'price' => $price,
		'price-opt' => $price_opt,
		'price-old' => $price_old,
		'price-opt-old' => $price_opt_old,
		'sale' => $sale,
		'value' => $value,
		'total' => $total,
		
		'image' => $image_contain,
		'image-cover' => $image_cover,
		'gallery' => $gallery,
		'date' => $date,
		'date-display' => $date_display,
		'tags' => $tags,
		'link' => $link
	]
));

?>