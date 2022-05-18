<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Components\Display;
use is\Components\Log;
use is\Components\Uri;
use is\Masters\View;

$view = View::getInstance();
$uri = Uri::getInstance();

$data = $uri->getData();
$data_is = System::typeIterable($data);

$lang = $view->get('state|langs:others');
$lang_is = System::typeIterable($lang);

$domain = $view->get('state|domain');
$path = $uri->path['string'];

?>

<!-- Search manage links -->
<?php
if (Objects::len($view->get('state|langs:list'))) {
    ?>
<link rel="canonical" href="<?= $domain . $path; ?>">
    <?php
    if ($lang_is) {
        foreach ($lang as $key => $item) {
            ?>
<link rel="alternate" href="<?= $domain . $key . '/' . $path; ?>" hreflang="<?= $key; ?>">
            <?php
        }
        unset($key, $item);
    }
    ?>
<link rel="alternate" href="<?= $domain . $path; ?>" hreflang="x-default" />
    <?php
} elseif ($data_is) {
    ?>
<link rel="canonical" href="<?= $domain . $view->get('state|path'); ?>">
    <?php
}
if ($data_is) {
    ?>
<meta name="robots" content="noindex">
    <?php
}
?>
<meta name="referrer" content="origin">
