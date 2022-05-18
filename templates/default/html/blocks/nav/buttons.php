<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;
use is\Components\User;
use is\Masters\View;

$view = View::getInstance();
$user = User::getInstance();

?>
<div class="row">
    <div class="col">
        <a href="/create/" class="btn color-white border-white b radius-1 px-05 xs-px-1 py-05 mr-05 fs-075 xs-fs-09" role="button">
            Создать заказ
        </a>
        <?php
            if (!$user->isset()) {
        ?>
        <a href="/register/" class="btn color-white p-05 fs-075 xs-fs-09" role="button">
            Регистрация
        </a>
        <a href="/login/" class="btn color-white p-05 fs-075 xs-fs-09" role="button">
            Вход
        </a>
        <?php
            } else {
        ?>
        <a href="/profile/" class="btn color-white p-05 fs-075 xs-fs-09" role="button">
            Личный кабинет
        </a>
        <a href="/api/defaults/logout/" class="btn color-white p-05 fs-075 xs-fs-09" role="button">
            Выход
        </a>
        <?php
            }
        ?>
    </div>
</div>
