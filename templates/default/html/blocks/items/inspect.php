<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

// код

echo '<!--noindex--><!-- ' . number_format(memory_get_usage() / 1024, 3, '.', ' ') . ' KB total / ' . number_format(memory_get_peak_usage() / 1024, 3, '.', ' ') . ' KB in peak / ' . number_format(microtime(true) - isENGINE, 3, null, null) . ' sec is speed / ' . number_format((defined('isLOADED') ? isLOADED : microtime(true)) - System::server('REQUEST_TIME_FLOAT', true), 3, null, null) . ' sec loading / ' . 
(defined('isLOADEDMEM') ? number_format((memory_get_peak_usage() - isLOADEDMEM) / 1024, 3, '.', ' ') : '--') . ' KB loading --><!--/noindex-->';

?>