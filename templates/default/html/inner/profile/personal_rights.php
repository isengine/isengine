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
Права доступа к базе данных<hr>
<?php
$db = Database::getInstance();
System::debug($db->driver->rights);
