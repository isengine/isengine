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
Созданные заказы<hr>
<?php

$view->get('module')->launch('content', 'default:create', null, null);

//$user = User::getInstance();
//System::debug($user->getData());
//$db = Database::getInstance();
//System::debug($db->driver->rights);
