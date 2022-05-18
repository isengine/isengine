<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$darkmode = $view->get('state|settings:classes:darkmode');

if (!$darkmode) {
    return;
}

?>
<script>
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.body.classList.add('<?= $darkmode; ?>');
    console.log('Darkmode is on');
}
</script>