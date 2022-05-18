<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Prepare;
use is\Components\Path;
use is\Components\Session;
use is\Components\Uri;
use is\Components\State;
use is\Components\Config;
use is\Components\Content;
use is\Components\Display;
use is\Components\Log;
use is\Components\User;
use is\Components\Language;
use is\Masters\Database;

// читаем user

$config = Config::getInstance();
$state = State::getInstance();
$user = User::getInstance();
$uri = Uri::getInstance();
$session = Session::getInstance();

$lang = Language::getInstance();

?>
<h2>ЯЯ дас ист фантастиш</h2>
<p>ws!</p>
