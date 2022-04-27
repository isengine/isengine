<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Components\Config;
use is\Components\State;
use is\Masters\View;

// читаем

$view = View::getInstance();
$state = State::getInstance();
$config = Config::getInstance();

// код

if (!$state -> get('cookie')) {
?>
<noindex>
	<div id="id_cookie"></div>
</noindex>
<script>
document.cookie = "isENGINE=<?= (new \DateTime()) -> getTimestamp(); ?>; max-age=<?= $config -> get('time:year'); ?>";
if (!document.cookie.match(new RegExp("(?:^|; )" + ("isENGINE").replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"))) {
	document.getElementById('id_cookie').innerHTML = "<?= $view -> get('lang|common:nocookie'); ?>";
}
</script> 
<?php
}
?>
<noscript>
<?= $view -> get('lang|common:noscript'); ?>
</noscript>