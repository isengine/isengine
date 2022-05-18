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

?>

<!-- OpenGraph -->
<meta property="og:title" content="<?= $view->get('seo|title'); ?>" />
<meta property="og:image" content="<?= $view->get('seo|image'); ?>" />
<meta property="og:url" content="<?= $view->get('state|url'); ?>" />
<meta property="og:site_name" content="<?= $view->get('lang|title'); ?>" />
<meta property="og:description" content="<?= $view->get('seo|description'); ?>" />
<meta property="og:locale" content="<?= $view->get('state|lang'); ?>" />
<?php
    $lang_default = $view->get('state|langs:default');
    $lang_this = $view->get('state|lang');
if ($lang_default && $lang_default !== $lang_this) {
    ?>
<meta property="og:locale:alternate" content="<?= $lang_default; ?>" />
    <?php
}
    $langs = $view->get('state|langs:others');
if (System::typeIterable($langs)) {
    foreach ($langs as $key => $item) {
        ?>
<meta property="og:locale:alternate" content="<?= $key; ?>" />
        <?php
    }
    unset($key, $item);
}
    unset($langs);
?>
<?php /* if (objectGet('content', 'name')) { ?>
    <meta property="og:type" content="article" />
    <meta property="article:author" content="<?= $view->get('seo|author'); ?>" />
    <meta property="article:published_time" content="<?= $seo->created['w3cdtf']; ?>" />
    <meta property="article:modified_time" content="<?= $seo->modified['w3cdtf']; ?>" />
    <meta property="article:section" content="<?= objectGet('content', 'parent'); ?>" />
    <?php
        $tags = $view->get('seo|tags');
        if (System::typeIterable($tags)) {
            foreach ($tags as $item) {
    ?>
    <meta property="article:tag" content="<?= $item; ?>">
    <?php
            }
            unset($item);
        }
    ?>
<?php } else { ?>
    <meta property="og:type" content="website" />
<?php } */ ?>