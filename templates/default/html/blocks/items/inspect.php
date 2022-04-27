<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

echo '<!--noindex--><!-- ' . number_format(memory_get_usage() / 1024, 3, '.', ' ') . ' KB total / ' . number_format(memory_get_peak_usage() / 1024, 3, '.', ' ') . ' KB in peak / ' . number_format(microtime(true) - ISENGINE, 3, null, null) . ' sec is speed / ' . number_format((defined('ISLOADED') ? ISLOADED : microtime(true)) - System::server('REQUEST_TIME_FLOAT', true), 3, null, null) . ' sec loading / ' . 
(defined('ISLOADEDMEM') ? number_format((memory_get_peak_usage() - ISLOADEDMEM) / 1024, 3, '.', ' ') : '--') . ' KB loading --><!--/noindex-->';

?>