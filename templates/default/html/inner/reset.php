<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Components\User;
use is\Masters\View;

$user = User::getInstance();

if ($user->isset()) {
    return;
} else {
    $view = View::getInstance();
    $view->get('module')->launch('form', 'default:reset');
}
