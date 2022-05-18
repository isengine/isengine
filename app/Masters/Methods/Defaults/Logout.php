<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Datetimes;
use is\Helpers\Parser;
use is\Helpers\Prepare;
use is\Helpers\Sessions;
use is\Components\Config;
use is\Components\Globals;
use is\Components\Session;
use is\Masters\Module;
use is\Masters\Database;

class Logout extends Master
{
    public function launch()
    {

        $session = Session::getInstance();
        $session->close();

        Sessions::setCookie('logout', true);
        $this->returns(null);
    }
}
