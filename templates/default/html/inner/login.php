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
    ?>
<div class="row">
    <div class="col-12 mb-05">
        <div class="h4">
            Вход в личный кабинет
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 xs-col-9 sm-col-7 md-col-6 lg-col-5">
    <?php
    $view = View::getInstance();
    $view->get('module')->launch('form', 'default:login');
    ?>
    </div>
</div>
    <?php
}
?>