<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\Exchange;
use is\Masters\View;
use is\Components\User;
use is\Masters\Database;

$view = View::getInstance();

?>
Личный кабинет пользователя<hr>
<p>
    <a href="/profile/personal_data">
        Данные пользователя
    </a>
</p>
<p>
    <a href="/profile/personal_rights">
        Права доступа
    </a>
</p>
<p>
    <a href="/profile/creates">
        Созданные заказы
    </a>
</p>
