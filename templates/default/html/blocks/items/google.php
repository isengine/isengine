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

/*
media="(orientation: portrait)"
media="(orientation: landscape)"
media="print" для печати и для режима "для слабовидящих"
*/

$counters = [
    $view->get('state|settings:webmaster:google:ga-analytics'),
    $view->get('state|settings:webmaster:google:aw-ads'),
    $view->get('state|settings:webmaster:google:dc-floodlight')
];
$counters = Objects::clear($counters);

if (!System::typeIterable($counters)) {
    return;
}

$counter = Objects::first($counters, 'value');

?>

<!-- Global site tag (gtag.js) - Google Analytics, Ads and Floodlight -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $counter; ?>"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
<?php
foreach ($counters as $item) {
    ?>
    gtag('config', '<?= $item; ?>');
    <?php
}
unset($item);
?>
</script>