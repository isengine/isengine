<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Components\User;
use is\Masters\View;

$user = User::getInstance();

if (!$user->isset()) {
    ?>
<div class="row">
    <div class="col-12 mb-05">
        <div class="h4">
            Создать заказ
        </div>
        <p class="pt-1">
            Создавать заказы могут только зарегистрированные пользователи.
        </p>
        <p>
        <a href="/login/" class="btn bg-theme">
            Вход
        </a>
        <a href="/register/" class="btn bg-theme">
            Регистрация
        </a>
        <a href="/" class="btn bg-theme">
            Вернуться на главную
        </a>
        </p>
    </div>
</div>
    <?php
} elseif (!empty($_GET['success'])) {
    ?>
<div class="row">
    <div class="col-12 mb-05">
        <div class="h4">
            Создать заказ
        </div>
        <p class="color-theme pt-1">
            Создание заказа прошло успешно.
        </p>
        <p>
            Теперь вы должны получить письмо со ссылкой на активацию. Без активации Ваш заказ не будет размещен на сайте! Это сделано для защиты от мошенников. Приносим извинения за неудобства.
        </p>
        <p>
        <a href="/" class="btn bg-theme">
            Вернуться на главную
        </a>
        </p>
    </div>
</div>
    <?php
} else {
    ?>
<div class="row">
    <div class="col-12 mb-02">
        <div class="h4">
            Создать заказ
        </div>
        <p class="color-theme">Поля, отмеченные звездочкой, обязательны к заполнению</p>
    </div>
</div>
<div class="row">
    <div class="col-12 xs-col-10 sm-col-8 md-col-6">
    <?php
    $view = View::getInstance();
    $view->get('module')->launch('form', 'default:create');
    ?>
    </div>
</div>
    <?php
}
