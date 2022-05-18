<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

$val = Prepare::urlencode('catalog:');
$cart = [];
$catalog = [];
$success = Sessions::getCookie('order-complete');
$cookie = Sessions::getCookie();

Objects::each($cookie, function ($item, $key) use (&$cart, &$catalog, $val) {
    if (Strings::find($key, $val, 0) && $item) {
        $catalog[] = $key;
        $cart[ Prepare::urldecode($key) ] = $item;
    }
});

if ($success) {
    Sessions::unCookie($catalog);
    if (empty($_GET['success'])) {
        Sessions::unCookie('order-complete');
    }
}

$view->get('vars')->set('cart', $success ? [] : $cart);

unset($cookie, $val, $cart, $catalog, $success);
